<?php

class Equipment_checkin_summaryController extends Controller
{
	public function actionIndex()
	{
		if(!isset($_GET['equipment_checkin_id'])) // equipment_id not set
                {
                  print("Invalid Request!");
                }
                else // equipment_reservation_id is set
                {
                  if(empty($_GET['equipment_checkin_id']) || !is_numeric($_GET['equipment_checkin_id']))
                  {
                    print("Invalid Request!");
                  }
                  else if(EquipmentCheckin::model()->findByPk($_GET['equipment_checkin_id']) == null)
                  {
		    //$this->render('index');
                    print("We're sorry, the reservation you are looking for was not found.");
                  }
                  else // good to go
                  {
		    $equipment_checkin = EquipmentCheckin::model()->findByPk($_GET['equipment_checkin_id']);
		    $equipment = Equipment::model()->findByPk($equipment_checkin->equipment_id);
		    //$checkin_accessories = $this->getCheckinAccessories($equipment_checkin->equipment_id);
		    $checkin_accessories = $equipment_checkin->getAccessoryChecklist();
 
		    //$this->render('index');

		    $this->render('index',
                      array("equipment_checkin" => $equipment_checkin,
			   "equipment" => $equipment,
			   "checkin_accessories" => $checkin_accessories)
			);
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

	/*
	  Retrieves a piece an accessory based on its id
	*/

	public function getAccessory($accessory_id)
	{
	  return Accessory::model()->findByPk($accessory_id);
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
