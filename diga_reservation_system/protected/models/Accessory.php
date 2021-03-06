<?php

/**
 * This is the model class for table "accessory".
 *
 * The followings are the available columns in table 'accessory':
 * @property integer $accessory_id
 * @property string $name
 * @property integer $equipment_id
 */
class Accessory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Accessory the static model class
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
		return 'accessory';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, equipment_id', 'required'),
			array('equipment_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('accessory_id, name, equipment_id', 'safe', 'on'=>'search'),
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
			'accessory_id' => 'Accessory',
			'name' => 'Name',
			'equipment_id' => 'Equipment',
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

		$criteria->compare('accessory_id',$this->accessory_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('equipment_id',$this->equipment_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}