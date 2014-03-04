<?php

/**
 * This is the model class for table "equipment_checkin".
 *
 * The followings are the available columns in table 'equipment_checkin':
 * @property string $equipment_checkin_id
 * @property string $borrowers_email
 * @property string $equipment_id
 * @property string $checkin_date_time
 * @property string $notes
 * @property string $checkin_assistant_email
 */
class EquipmentCheckin extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EquipmentCheckin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/*
          Retrieves the accessory checklist for this return
        */
        public function getAccessoryChecklist()
        {
          $attributes =
            array("equipment_checkin_id"=>$this->equipment_checkin_id);

          return EquipmentCheckinAccessory::model()
                   ->findAllByAttributes($attributes);
        }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'equipment_checkin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('borrowers_email, equipment_id, checkin_date_time, checkin_assistant_email', 'required'),
			array('borrowers_email, checkin_assistant_email', 'length', 'max'=>30),
			array('equipment_id', 'length', 'max'=>20),
			array('notes', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('equipment_checkin_id, borrowers_email, equipment_id, checkin_date_time, notes, checkin_assistant_email', 'safe', 'on'=>'search'),
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
			'equipment_checkin_id' => 'Equipment Checkin',
			'borrowers_email' => 'Borrowers Email',
			'equipment_id' => 'Equipment',
			'checkin_date_time' => 'Checkin Date Time',
			'notes' => 'Notes',
			'checkin_assistant_email' => 'Checkin Assistant Email',
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

		$criteria->compare('equipment_checkin_id',$this->equipment_checkin_id,true);
		$criteria->compare('borrowers_email',$this->borrowers_email,true);
		$criteria->compare('equipment_id',$this->equipment_id,true);
		$criteria->compare('checkin_date_time',$this->checkin_date_time,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('checkin_assistant_email',$this->checkin_assistant_email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
