<?php

/**
 * This is the model class for table "tbl_appraisers".
 *
 * The followings are the available columns in table 'tbl_appraisers':
 * @property integer $id
 * @property string $phones
 * @property string $name
 * @property string $address
 * @property string $company
 * @property string $website
 * @property string $photo
 * @property string $free_text
 * @property string $email
 */
class Appraisers extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Appraisers the static model class
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
		return 'tbl_appraisers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, phones, name, address, company, website, photo, free_text, email', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('phones, name, address, website', 'length', 'max'=>255),
			array('company, photo, email', 'length', 'max'=>55),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, phones, name, address, company, website, photo, free_text, email', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'phones' => 'Phones',
			'name' => 'Name',
			'address' => 'Address',
			'company' => 'Company',
			'website' => 'Website',
			'photo' => 'Photo',
			'free_text' => 'Free Text',
			'email' => 'Email',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('phones',$this->phones,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('free_text',$this->free_text,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}