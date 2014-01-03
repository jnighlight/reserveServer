<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $email
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $phone_number
 * @property integer $user_level_id
 * @property string $salt
 * @property string $id_number
 */
class User extends CActiveRecord
{

	public $password_repeat;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('password, password_repeat, first_name, last_name, phone_number, id_number', 'required'),
			array('user_level_id', 'numerical', 'integerOnly'=>true),
			array('email', 'length', 'max'=>30),
			array('password', 'length', 'max'=>100),
			array('first_name, last_name', 'length', 'max'=>20),
			array('phone_number', 'length', 'max'=>15),
			array('id_number', 'length', 'max'=>10),
			array('email,id_number', 'unique'),
			array('email','email'),
			array('password_repeat','safe'),
			array('password','compare'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('email, password, first_name, last_name, id_number', 'safe', 'on'=>'search'),
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
			'password' => 'Password',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'phone_number' => 'Phone Number',
			'user_level_id' => 'User Level',
			'salt' => 'Salt',
			'id_number' => 'Id Number',
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
		$criteria->compare('password',$this->password,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('user_level_id',$this->user_level_id);
		$criteria->compare('salt',$this->salt,true);
		$criteria->compare('id_number',$this->id_number,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	* create salt and apply hash
	*/
	protected function afterValidate()
	{
	  parent::afterValidate();
	  if(!$this->hasErrors())
	  {
	    //$this->salt = mcrypt_create_iv(128, MCRYPT_DEV_URANDOM);
	    //$this->password = $this->hashPassword($this->password, $this->salt); 
	  }
	}

	/**
	* Generate password hash
	*/

	public function hashPassword($password,$salt)
	{
	  return md5($password.$salt);
	}
}
