<?php

/**
 * This is the model class for table "warning_email".
 *
 * The followings are the available columns in table 'warning_email':
 * @property string $email
 * @property integer $warning_email_id
 */
class WarningEmail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return WarningEmail the static model class
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
		return 'warning_email';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('warning_email_id', 'required'),
			array('warning_email_id', 'numerical', 'integerOnly'=>true),
			array('email', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('email, warning_email_id', 'safe', 'on'=>'search'),
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
			'email' => 'Email',
			'warning_email_id' => 'Warning Email',
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

		$criteria->compare('email',$this->email,true);
		$criteria->compare('warning_email_id',$this->warning_email_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}