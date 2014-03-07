<?php

class User_historyController extends Controller
{
	public function actionIndex()
	{
	  if(!isset($_GET['user_id'])) // user_id not set
                {
                  print("Invalid Request!");
                }
                else // user_id is set
                {
                  if(empty($_GET['user_id']) || !is_numeric($_GET['user_id']))
                  {
                    print("Invalid Request!");
                  }
                  else if(User::model()->findByPk($_GET['user_id']) == null)
                  {
                    //$this->render('index');
                    print("We're sorry, the user you are looking for was not found.");
                  }
                  else // good to go
                  {
                    $user = User::model()->findByPk($_GET['user_id']);

                    $checkout_history = $user->getCheckouts();//= EquipmentReservation::model()->findByAttributes(array("borrowers_email"=>$user->email));
		    $checkin_history = $user->getCheckins();//EquipmentCheckin::model()->findByAttributes
(array("borrowers_email"=>$user->email));

		    $this->render('index',
                      array("user" => $user,
                            "checkout_history" => $checkout_history,
                            "checkin_history" => $checkin_history,
                        ));
			print(sizeof($checkout_history));
                  }
                }
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
