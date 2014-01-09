<?php

/**
 * This is the model class for table "equipment_reservation_accessory".
 *
 * The followings are the available columns in table 'equipment_reservation_accessory':
 * @property string $equipment_reservation_id
 * @property integer $accessory_id
 * @property integer $present
 */
class EquipmentReservationAccessory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EquipmentReservationAccessory the static model class
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
		return 'equipment_reservation_accessory';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('equipment_reservation_id, accessory_id, present', 'required'),
			array('accessory_id, present', 'numerical', 'integerOnly'=>true),
			array('equipment_reservation_id', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('equipment_reservation_id, accessory_id, present', 'safe', 'on'=>'search'),
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
			'equipment_reservation_id' => 'Equipment Reservation',
			'accessory_id' => 'Accessory',
			'present' => 'Present',
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

		$criteria->compare('equipment_reservation_id',$this->equipment_reservation_id,true);
		$criteria->compare('accessory_id',$this->accessory_id);
		$criteria->compare('present',$this->present);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}