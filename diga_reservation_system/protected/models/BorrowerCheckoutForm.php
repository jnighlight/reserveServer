<?php

class BorrowerCheckoutForm extends CFormModel
{
  public $email;
  public $password;
  
  //private $_identity;

  public function rules()
  {
    return array(
      array("email,password","required"), 	// required
      array("email","email"),			// email
      array("password","authenticate"),		// password authentication
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
    }



  }
}
