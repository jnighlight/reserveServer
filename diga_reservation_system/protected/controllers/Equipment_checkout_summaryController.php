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
		    $equipment_reservation = EquipmentReservation::model()->findByPk($_GET['equipment_reservation_id']);
		    $equipment = Equipment::model()->findByPk($equipment_reservation->equipment_id);
		    //$reservarion_accessories = $this->getReservationAccessories($equipment_reservation->equipment_id);
		    $reservation_accessories = $equipment_reservation->getAccessoryChecklist();
 
		    //$this->render('index');

		    $this->render('index',
                      array("equipment_reservation" => $equipment_reservation,
			   "equipment" => $equipment,
			   "reservarion_accessories" => $reservation_accessories)
			);
		  }
	        }
	}
/*
	public function getReservationAccessories($reservation_id)
        {
          $reservation_accessories = EquipmentReservationAccessory::model();
          $criteria = new CDbCriteria;
	  $criteria->condition = "equipment_reservation_id = ".$reservation_id;
          return $reservation_accessories->findAll($criteria);
        }
*/

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
