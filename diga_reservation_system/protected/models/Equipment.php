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
 * @property string $image_url
 * @property integer $equipment_type_id
 * @property integer $availability
 * @property string $su_number;
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

	/*
          Retrieves whether or not the particular piece of equipment
          is available for checkout
            true if the piece of equipment is not currently checked out
            false if the piece of equipment is currently checked out
        */

        public function isAvailable()
        {
	  $this->availability;
        }

	/*
          Retrieves the Accessories associated with this model
          based on its id

          parameters: equipment_id, the primary key of equipment
        */

        public function getAccessories()
        {
          $equipment_accessories = EquipmentAccessory::model();
          $criteria = new CDbCriteria;
            $condition = "equipment_id = ".$this->equipment_id;
          $criteria->condition = $condition;
          $resulting_equipment_accessories = $equipment_accessories->findAll($criteria);
          //return $resulting_equipment_accessories;
          $resultAccessories = array();
          for($x = 0; $x < sizeof($resulting_equipment_accessories); $x++)
          {
            $resultAccessories[] = Accessory::model()->find("accessory_id = ".$resulting_equipment_accessories[$x]->accessory_id);
          }
          return $resultAccessories;
        }

	/*
          Retrieves the Specifications associated with this model
          based on its id

          parameters: equipment_id, the primary key of equipment
        */

        public function getSpecs()
        {
          $criteria = new CDbCriteria;
            $condition = "equipment_id = ".$this->equipment_id;
          $criteria->condition = $condition;
          $specs = Specification::model()->findAll($criteria);
          return $specs;
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
			array('name, equipment_type_id, availability', 'required'),
			array('equipment_type_id, availability', 'numerical', 'integerOnly'=>true),
			array('serial_number, manufacturer, model_number, su_number', 'length', 'max'=>30),
			array('description', 'length', 'max'=>200),
			array('name', 'length', 'max'=>40),
			array('image_url', 'length', 'max'=>300),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('equipment_id, serial_number, manufacturer, model_number, description, name, image_url, equipment_type_id, availability, su_number', 'safe', 'on'=>'search'),
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
			'image_url' => 'Image Url',
			'equipment_type_id' => 'Equipment Type',
			'availability' => 'Availability',
			'su_number' => 'SU Number'
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
		$criteria->compare('image_url',$this->image_url,true);
		$criteria->compare('equipment_type_id',$this->equipment_type_id);
		$criteria->compare('availability',$this->availability);
		$criteria->compar('su_number',$this->su_number);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
