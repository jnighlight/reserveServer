<?php

class Equipment_checkout_summaryController extends Controller
{
	public function actionIndex()
	{
		if(!isset($_GET['equipment_reservation_id'])) // equipment_id not set
                {
                  print("Invalid Request!");
                }
                else // equipment_reservation_id is set
                {
                  if(empty($_GET['equipment_reservation_id']) || !is_numeric($_GET['equipment_reservation_id']))
                  {
                    print("Invalid Request!");
                  }
                  else if(EquipmentReservation::model()->findByPk($_GET['equipment_reservation_id']) == null)
                  {
		    //$this->render('index');
                    print("We're sorry, the reservation you are looking for was not found.");
                  }
                  else // good to go
                  {

		    $this->render('index');
		  }
	        }
	}

	/*
	  Retrieves a particular reservation
	*/
	public function getReservation($equipment_reservation_id)
	{
          return EquipmentReservation::model()->findByPk($equipment_reservation_id);
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
