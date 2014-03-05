<?php

class Equipment_historyController extends Controller
{
	public function actionIndex()
	{
		if(!isset($_GET['equipment_id'])) // equipment_id not set
                {
                  print("Invalid Request!");
                }
                else // equipment__id is set
                {
                  if(empty($_GET['equipment_id']) || !is_numeric($_GET['equipment_id']))
                  {
                    print("Invalid Request!");
                  }
                  else if(Equipment::model()->findByPk($_GET['equipment_id']) == null)
                  {
                    //$this->render('index');
                    print("We're sorry, the reservation you are looking for was not found.");
                  }
                  else // good to go
                  {
		    $equipment = Equipment::model()->findByPk($_GET['equipment_id']);
		    $checkout_history = $equipment->getCheckouts();
		    $checkin_history = $equipment->getCheckins();

		    $this->render('index',
                      array("equipment" => $equipment,
			    "checkout_history" => $checkout_history,
			    "checkin_history" => $checkin_history,
                        ));
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
