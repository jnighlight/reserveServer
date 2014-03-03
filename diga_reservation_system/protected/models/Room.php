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
 * @property string $monday_open
 * @property string $monday_close
 * @property string $tuesday_open
 * @property string $tuesday_close
 * @property string $wednesday_open
 * @property string $wednesday_close
 * @property string $thursday_open
 * @property string $thursday_close
 * @property string $friday_open
 * @property string $friday_close
 * @property string $saturday_open
 * @property string $saturday_close
 * @property string $sunday_open
 * @property string $sunday_close
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

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('room_number, building_id, monday_open, monday_close, tuesday_open, tuesday_close, wednesday_open, wednesday_close, thursday_open, thursday_close, friday_open, friday_close, saturday_open, saturday_close, sunday_open, sunday_close', 'required'),
			array('room_number, building_id', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>200),
			array('image_url', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('room_id, room_number, building_id, description, image_url, monday_open, monday_close, tuesday_open, tuesday_close, wednesday_open, wednesday_close, thursday_open, thursday_close, friday_open, friday_close, saturday_open, saturday_close, sunday_open, sunday_close', 'safe', 'on'=>'search'),
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
			'monday_open' => 'Monday Open',
			'monday_close' => 'Monday Close',
			'tuesday_open' => 'Tuesday Open',
			'tuesday_close' => 'Tuesday Close',
			'wednesday_open' => 'Wednesday Open',
			'wednesday_close' => 'Wednesday Close',
			'thursday_open' => 'Thursday Open',
			'thursday_close' => 'Thursday Close',
			'friday_open' => 'Friday Open',
			'friday_close' => 'Friday Close',
			'saturday_open' => 'Saturday Open',
			'saturday_close' => 'Saturday Close',
			'sunday_open' => 'Sunday Open',
			'sunday_close' => 'Sunday Close',
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

		$criteria->compare('room_id',$this->room_id);
		$criteria->compare('room_number',$this->room_number);
		$criteria->compare('building_id',$this->building_id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image_url',$this->image_url,true);
		$criteria->compare('monday_open',$this->monday_open,true);
		$criteria->compare('monday_close',$this->monday_close,true);
		$criteria->compare('tuesday_open',$this->tuesday_open,true);
		$criteria->compare('tuesday_close',$this->tuesday_close,true);
		$criteria->compare('wednesday_open',$this->wednesday_open,true);
		$criteria->compare('wednesday_close',$this->wednesday_close,true);
		$criteria->compare('thursday_open',$this->thursday_open,true);
		$criteria->compare('thursday_close',$this->thursday_close,true);
		$criteria->compare('friday_open',$this->friday_open,true);
		$criteria->compare('friday_close',$this->friday_close,true);
		$criteria->compare('saturday_open',$this->saturday_open,true);
		$criteria->compare('saturday_close',$this->saturday_close,true);
		$criteria->compare('sunday_open',$this->sunday_open,true);
		$criteria->compare('sunday_close',$this->sunday_close,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}