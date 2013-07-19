<?php

class AdminController extends Controller
{
	public function actionAppraisers()
	{
		$this->render('appraisers');
	}

	public function actionIndex()
	{
		if(Yii::app()->user->id == 1){
			$this->render('index');
		}
		else $this->redirect(Yii::app()->request->baseUrl);
	}

	public function actionPages()
	{
		if(Yii::app()->user->id == 1){
			$pages = new Pages();
			$user = new User();
			$user_id = $user->findByAttributes(array('username'=>Yii::app()->user->id));
			
			if(isset($_GET['add'])){
				$pages=new Pages('add');
				if(isset($_POST['Pages']))
				{
					$pages->attributes=$_POST['Pages'];
					if($pages->validate())
					{
						$pages->save();
						$this->redirect('admin/pages');
						return;
					}
				}
				$this->render('pages_add',array('model'=>$pages, 'user_id'=>$user_id));
			}
			else if(isset($_GET['edit']) && $_GET['edit']>0){
				//$pages = $pages->findByPK($_GET['edit']);
				if(isset($_POST['Pages']))
				{
					$pages->attributes=$_POST['Pages'];
					if($pages->validate())
					{ 
						$id = $_POST['Pages']['id'];
						$pages->updateByPK($id,array('title'=>$pages->title, 'descr'=>$pages->descr));
						$this->redirect('admin/pages');
						return;
					}
				}
				$this->render('pages_edit',array('model'=>$pages->findByPK($_GET['edit'])));
			}
			else if(isset($_GET['remove']) && $_GET['remove']>0){
				$pages->deleteByPK($_GET['remove']);
				$this->redirect('admin/pages');
				return;
			}
			else{
				$this->render('pages',array('data'=>$pages->findAll()));		
			}
		}
		else $this->redirect(Yii::app()->request->baseUrl);
	}

	public function actionSpares()
	{
		if(Yii::app()->user->id == 1){
			$model = new Parts();
			
			if (isset($_GET['add'])){
				$model=new Parts('add');
				$car_type=new CarType();
				$types = $car_type->findAll();
				$manufater = new Manufacturer();
				$m = $manufater->findAll();

				if(isset($_POST['Parts']))
				{
					$model->attributes=$_POST['Parts'];
					if($model->validate())
					{
						$model->save();
						$this->redirect('admin/spares');
						return;
					}
				}
				$this->render('parts_add',array('model'=>$model, 'types'=>$types,'manufacter'=>$m));
			}
			else {
				$this->render('parts',array('model'=>$model));
			}
		}
		else $this->redirect(Yii::app()->request->baseUrl);
	}

	public function actionSuppliers()
	{
		if(Yii::app()->user->id == 1){
			$this->render('suppliers');
		}
		else $this->redirect(Yii::app()->request->baseUrl);
	}

	public function actionUsers()
	{
		if(Yii::app()->user->id == 1){
			$users=new User();
			if(isset($_GET['add'])){
				$users=new User('add');
				$type=new Type();
				if(isset($_POST['User']))
				{
					$users->attributes=$_POST['User'];
					if($users->validate())
					{
						$users->save();
						$this->redirect('admin/users');
						return;
					}
				}
				$this->render('users_add',array('model'=>$users, 'type'=>$type));
			}
			else if(isset($_GET['remove']) && $_GET['remove']>0){
				$users->deleteByPK($_GET['remove']);
				$this->redirect('admin/users');
				return;
			}
			else{
				$this->render('users',array('data'=>$users->findAll()));		
			}
		}
		else $this->redirect(Yii::app()->request->baseUrl);
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}