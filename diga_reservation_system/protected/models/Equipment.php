<?php

/**
 * This is the model class for table "equipment".
 *
 * The followings are the available columns in table 'equipment':
 * @property string $equipment_id
 * @property string $serial_number
 * @property string $manufacturer
 * @property string $model_number
 * @property string $description
 * @property string $name
 */
class Equipment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Equipment the static model class
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
		return 'equipment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('equipment_id, name', 'length', 'max'=>20),
			array('serial_number, manufacturer, model_number', 'length', 'max'=>30),
			array('description', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('equipment_id, serial_number, manufacturer, model_number, description, name', 'safe', 'on'=>'search'),
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
			'equipment_id' => 'Equipment',
			'serial_number' => 'Serial Number',
			'manufacturer' => 'Manufacturer',
			'model_number' => 'Model Number',
			'description' => 'Description',
			'name' => 'Name',
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

		$criteria->compare('equipment_id',$this->equipment_id,true);
		$criteria->compare('serial_number',$this->serial_number,true);
		$criteria->compare('manufacturer',$this->manufacturer,true);
		$criteria->compare('model_number',$this->model_number,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
