<?php

/**
 * This is the model class for table "course".
 *
 * The followings are the available columns in table 'course':
 * @property integer $class_id
 * @property integer $room_id
 * @property string $name
 * @property string $email
 * @property string $startDate
 * @property string $endDate
 * @property string $start_time
 * @property string $end_time
 * @property integer $monday
 * @property integer $tuesday
 * @property integer $wednesday
 * @property integer $thursday
 * @property integer $friday
 */
class Course extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Course the static model class
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
		return 'course';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('room_id, name, email, startDate, endDate, start_time, end_time', 'required'),
			array('room_id, monday, tuesday, wednesday, thursday, friday', 'numerical', 'integerOnly'=>true),
			array('name, email', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('class_id, room_id, name, email, startDate, endDate, start_time, end_time, monday, tuesday, wednesday, thursday, friday', 'safe', 'on'=>'search'),
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
			'class_id' => 'Class',
			'room_id' => 'Room',
			'name' => 'Name',
			'email' => 'Email',
			'startDate' => 'Start Date',
			'endDate' => 'End Date',
			'start_time' => 'Start Time',
			'end_time' => 'End Time',
			'monday' => 'Monday',
			'tuesday' => 'Tuesday',
			'wednesday' => 'Wednesday',
			'thursday' => 'Thursday',
			'friday' => 'Friday',
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

		$criteria->compare('class_id',$this->class_id);
		$criteria->compare('room_id',$this->room_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('startDate',$this->startDate,true);
		$criteria->compare('endDate',$this->endDate,true);
		$criteria->compare('start_time',$this->start_time,true);
		$criteria->compare('end_time',$this->end_time,true);
		$criteria->compare('monday',$this->monday);
		$criteria->compare('tuesday',$this->tuesday);
		$criteria->compare('wednesday',$this->wednesday);
		$criteria->compare('thursday',$this->thursday);
		$criteria->compare('friday',$this->friday);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}