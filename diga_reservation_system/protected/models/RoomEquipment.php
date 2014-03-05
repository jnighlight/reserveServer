<?php

/**
 * This is the model class for table "room_equipment".
 *
 * The followings are the available columns in table 'room_equipment':
 * @property integer $room_equipment_id
 * @property integer $room_id
 * @property string $name
 * @property string $serial_number
 * @property string $description
 * @property string $image_url
 */
class RoomEquipment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RoomEquipment the static model class
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
		return 'room_equipment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('room_id, name, serial_number', 'required'),
			array('room_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>20),
			array('serial_number', 'length', 'max'=>30),
			array('description', 'length', 'max'=>200),
			array('image_url', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('room_equipment_id, room_id, name, serial_number, description, image_url', 'safe', 'on'=>'search'),
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
			'room_equipment_id' => 'Room Equipment',
			'room_id' => 'Room',
			'name' => 'Name',
			'serial_number' => 'Serial Number',
			'description' => 'Description',
			'image_url' => 'Image Url',
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

		$criteria->compare('room_equipment_id',$this->room_equipment_id);
		$criteria->compare('room_id',$this->room_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('serial_number',$this->serial_number,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image_url',$this->image_url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}