<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		//$model=new LoginForm;
		$model=new User();

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		// collect user input data
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			// validate user input and redirect to the previous page if valid
			if($model->check($_POST['User']['password'], $_POST['User']['username'])){
				$model->login();
				if(Yii::app()->user->id==1)
					$this->redirect(array('admin/index'));
				if(Yii::app()->user->id==3)
					$this->redirect('appraiser');
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	
	public function actionRegister(){
		$model=new User('Add');

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='register-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		// collect user input data
		if(isset($_POST['User']))
		{
			$_POST['User']['username']=$_POST['User']['email'];
			$record=$model->find(array(
			  'select'=>'email',
			  'condition'=>'email=:email',
			  'params'=>array(':email'=>$_POST['User']['email']))
			); 

			if(!empty($record)) {
				$error = 'Email already exist!';
			}
			else {
				$model->attributes=$_POST['User'];			
				
				//$model->password = $model->hash($_POST['User']['password'],$_POST['User']['username']);
				// validate user input and redirect to the previous page if valid
				if($_POST['User']['email']!=""){
					$model->save();
					$this->redirect(Yii::app()->user->returnUrl);
				}
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model,'error'=>$error));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionAppraiser(){
		if(Yii::app()->user->id==1 || Yii::app()->user->id==3)
			$this->render('appraiser');
		else 
			$this->redirect(Yii::app()->homeUrl);
	}
}