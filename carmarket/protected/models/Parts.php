<?php

/**
 * This is the model class for table "tbl_parts".
 *
 * The followings are the available columns in table 'tbl_parts':
 * @property integer $id
 * @property integer $supplier_id
 * @property integer $type
 * @property integer $manufacter
 * @property string $model
 * @property string $sub_model
 * @property integer $year
 * @property string $engine_vol
 * @property string $gear_type
 * @property string $producer_type
 * @property string $part_name
 * @property string $country_area
 * @property string $free_text
 * @property integer $part_manufacter
 */
class Parts extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Parts the static model class
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
		return 'tbl_parts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('supplier_id, type, manufacter, model, sub_model, year, engine_vol, gear_type, producer_type, part_name, country_area, part_manufacter', 'required'),
			array('supplier_id, type, manufacter, year', 'numerical', 'integerOnly'=>true),
			array('model, sub_model, gear_type, producer_type, part_name, part_manufacter', 'length', 'max'=>255),
			array('engine_vol', 'length', 'max'=>150),
			array('country_area', 'length', 'max'=>511),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('type, manufacter, model, sub_model, year, engine_vol, gear_type, producer_type, part_name, country_area, free_text, part_manufacter', 'safe', 'on'=>'search'),
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
			'type'=>array(self::BELONGS_TO, 'CarType', 'id'),
			'manufacter'=>array(self::BELONGS_TO, 'Manufacturer', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'supplier_id' => 'Supplier',
			'type' => 'Car Type',
			'manufacter' => 'Car Manufacter',
			'model' => 'Car Model',
			'sub_model' => 'Car Sub Model',
			'year' => 'Car Year',
			'engine_vol' => 'Engine Vol',
			'gear_type' => 'Gear Type',
			'producer_type' => 'Producer Type',
			'part_name' => 'Part Name',
			'country_area' => 'Country Area',
			'free_text' => 'Free Text',
			'part_manufacter' => 'Part Manufacter',
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
		$criteria->compare('supplier_id',$this->supplier_id);
		$criteria->compare('type',$this->type);
		$criteria->compare('manufacter',$this->manufacter);
		$criteria->compare('model',$this->model,true);
		$criteria->compare('sub_model',$this->sub_model,true);
		$criteria->compare('year',$this->year);
		$criteria->compare('engine_vol',$this->engine_vol,true);
		$criteria->compare('gear_type',$this->gear_type,true);
		$criteria->compare('producer_type',$this->producer_type,true);
		$criteria->compare('part_name',$this->part_name,true);
		$criteria->compare('country_area',$this->country_area,true);
		$criteria->compare('free_text',$this->free_text,true);
		$criteria->compare('part_manufacter',$this->part_manufacter);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}