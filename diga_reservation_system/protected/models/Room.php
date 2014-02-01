<?php

/**
 * This is the model class for table "room".
 *
 * The followings are the available columns in table 'room':
 * @property integer $room_id
 * @property integer $room_number
 * @property integer $building_id
 * @property string $description
 * @property string $image_url
 */
class Room extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Room the static model class
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
		return 'room';
	}

	public function validateDropdown($buildId, $roomNum)
	{
		return ($buildId != '' && $roomNum != '');
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('room_number, building_id', 'required'),
			//array('room_number, building_id', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>200),
			array('image_url', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('room_id, room_number, building_id, description, image_url', 'safe', 'on'=>'search'),
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
			'room_id' => 'Room',
			'room_number' => 'Room Number',
			'building_id' => 'Building',
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

		//Should not search by room ID number, or by image
		//$criteria->compare('room_id',$this->room_id);
		$criteria->compare('room_number',$this->room_number);
		$criteria->compare('building_id',$this->building_id);
		$criteria->compare('description',$this->description,true);
		//$criteria->compare('image_url',$this->image_url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
