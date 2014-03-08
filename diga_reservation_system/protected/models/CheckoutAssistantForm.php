<?php

class CheckoutAssistantForm extends CFormModel
{
  public $email;
  public $password;
  public $notes;
  public $start_date;
  public $end_date;
  
  //private $_identity;

  public function rules()
  {
    return array(
      array("email,password,start_date,end_date","required"), 	// required
      array("email","email"),			// email
      array("password","authenticate"),		// password authentication
      array("start_date,end_date","type","type"=>"date", "dateFormat"=>"MM/dd/yyyy"),
      array("notes","length","max"=>200),
    );
  }

  public function authenticate($attributes,$params)
  {
    //$user = User::model()->findByPk($this->email);
    $user = User::model()->findByAttributes(array("email"=>$this->email));

    if($user == null) // user does not exist
    {
      $this->addError('password','Incorrect email or password');
    }
    else // user does exist
    {
      if($user->password != $this->password) // wrong password
      {
        $this->addError('password','Incorrect email or password');
      }
      else // correct username and password, but too low of a user level
      {
        if($user->user_level_id < 2)
          $this->addError('password',"This user does not have the proper permissions to checkout equipment to other users.");
      }
    }
  }
}
