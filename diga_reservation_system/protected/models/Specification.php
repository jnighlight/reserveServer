<?php

/**
 * This is the model class for table "specification".
 *
 * The followings are the available columns in table 'specification':
 * @property string $specification_id
 * @property string $name
 * @property string $value
 * @property string $equipment_id
 */
class Specification extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Specification the static model class
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
		return 'specification';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, value, equipment_id', 'required'),
			array('name, value, equipment_id', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('specification_id, name, value, equipment_id', 'safe', 'on'=>'search'),
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
			'specification_id' => 'Specification',
			'name' => 'Name',
			'value' => 'Value',
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

		$criteria->compare('specification_id',$this->specification_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('equipment_id',$this->equipment_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}