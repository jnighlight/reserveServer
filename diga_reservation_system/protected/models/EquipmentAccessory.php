<?php

/**
 * This is the model class for table "equipment_accessory".
 *
 * The followings are the available columns in table 'equipment_accessory':
 * @property string $equipment_id
 * @property integer $accessory_id
 */
class EquipmentAccessory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EquipmentAccessory the static model class
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
		return 'equipment_accessory';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('accessory_id', 'numerical', 'integerOnly'=>true),
			array('equipment_id', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('equipment_id, accessory_id', 'safe', 'on'=>'search'),
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
			'accessory_id' => 'Accessory',
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
		$criteria->compare('accessory_id',$this->accessory_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}