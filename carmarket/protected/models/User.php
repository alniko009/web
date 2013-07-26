<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 */
class User extends CActiveRecord
{

	public $username;
	public $pass;

	private $_identity;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user';
	}
	
	public function hash($value, $salt)
	{
		return crypt($value, $salt);
	}
	
	protected function beforeSave()
	{
		if (parent::beforeSave()){
			$this->password = $this->hash($this->password,$this->username);
			return true;
		}
		return false;
	}
	
	public function check($value, $salt)
	{
		$new_hash = crypt($value, $salt);
		if ($new_hash == $this->findByAttributes(array('username'=>$salt))->password) {
			return true;
		}
		return false;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email, created, company, name, lname, type', 'required'),
			array('username, password, email, name, lname, company, phone, cellphone', 'length', 'max'=>128),			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('username, email', 'safe', 'on'=>'search'),
			// password needs to be authenticated
			//array('password', 'authenticate'),
		);
	}
	
	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate()
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			if(!$this->_identity->authenticate()){
				$this->addError('password','Incorrect username or password.');
				return false;
			}		
			
			return true;
		}
		else 
			return false;
		
	}
	
	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
		}
		
		if(	$this->authenticate() ){
			$duration=0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}		
		else
			return false;
	}
	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'type_name'=>array(self::BELONGS_TO, 'Type', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'company' => 'Company',
			'phone' => 'Phone number',
			'cellphone' => 'Cell phone number',
			'name' => 'First name',
			'lname' => 'Last name',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}