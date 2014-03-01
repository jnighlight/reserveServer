<?php

/**
 * This is the model class for table "lab_hour".
 *
 * The followings are the available columns in table 'lab_hour':
 * @property integer $lab_hour
 * @property integer $room_id
 * @property string $start_date
 * @property string $end_date
 * @property string $start_time
 * @property string $end_time
 * @property integer $monday
 * @property integer $tuesday
 * @property integer $wednesday
 * @property integer $thursday
 * @property integer $friday
 * @property integer $saturday
 * @property integer $sunday
 */
class LabHour extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LabHour the static model class
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
		return 'lab_hour';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('room_id, start_date, end_date, start_time, end_time', 'required'),
			array('room_id, monday, tuesday, wednesday, thursday, friday, saturday, sunday', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('lab_hour, room_id, start_date, end_date, start_time, end_time, monday, tuesday, wednesday, thursday, friday, saturday, sunday', 'safe', 'on'=>'search'),
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
			'lab_hour' => 'Lab Hour',
			'room_id' => 'Room',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'start_time' => 'Start Time',
			'end_time' => 'End Time',
			'monday' => 'Monday',
			'tuesday' => 'Tuesday',
			'wednesday' => 'Wednesday',
			'thursday' => 'Thursday',
			'friday' => 'Friday',
			'saturday' => 'Saturday',
			'sunday' => 'Sunday',
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

		$criteria->compare('lab_hour',$this->lab_hour);
		$criteria->compare('room_id',$this->room_id);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('start_time',$this->start_time,true);
		$criteria->compare('end_time',$this->end_time,true);
		$criteria->compare('monday',$this->monday);
		$criteria->compare('tuesday',$this->tuesday);
		$criteria->compare('wednesday',$this->wednesday);
		$criteria->compare('thursday',$this->thursday);
		$criteria->compare('friday',$this->friday);
		$criteria->compare('saturday',$this->saturday);
		$criteria->compare('sunday',$this->sunday);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}