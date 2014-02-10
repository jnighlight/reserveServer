<?php

/**
 * This is the model class for table "room_reservation".
 *
 * The followings are the available columns in table 'room_reservation':
 * @property integer $room_reservation_id
 * @property string $email
 * @property integer $building_id
 * @property integer $room_id
 * @property string $start_date_time
 * @property string $end_date_time
 */
class RoomReservation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RoomReservation the static model class
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
		return 'room_reservation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, start_date_time, end_date_time', 'required'),
			array('building_id, room_id', 'numerical', 'integerOnly'=>true),
			array('email', 'length', 'max'=>30),
			array('start_date_time, end_date_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('room_reservation_id, email, building_id, room_id, start_date_time, end_date_time', 'safe', 'on'=>'search'),
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
			'room_reservation_id' => 'Room Reservation',
			'email' => 'Email',
			'building_id' => 'Building',
			'room_id' => 'Room',
			'start_date_time' => 'Start Date Time',
			'end_date_time' => 'End Date Time',
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

		$criteria->compare('room_reservation_id',$this->room_reservation_id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('building_id',$this->building_id);
		$criteria->compare('room_id',$this->room_id);
		$criteria->compare('start_date_time',$this->start_date_time,true);
		$criteria->compare('end_date_time',$this->end_date_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
