<?php

class CheckoutController extends Controller
{
	public function actionIndex()
	{

		if(!isset($_GET['equipment_id'])) // equipment_id not set
		{
		  print("Invalid Request!");
		}
		else // equipment_id is set
		{
		  if(empty($_GET['equipment_id']) || !is_numeric($_GET['equipment_id']))
		  {
		    print("Invalid Request!");
		  }
		  else if(Equipment::model()->findByPk($_GET['equipment_id']) == null)
		  {
		    print("We're sorry, the piece of equipment you are looking for was not found.");
		  }
		  else // good to go
		  {
		//}
		
		    // Model to be used to validate the checkout assistant
		    $checkoutAssistant = new CheckoutAssistantForm;
		    // Model to be used to validate the borrower
		    $borrower = new BorrowerCheckoutForm;

		    // Perform validation all all models
/*
		    $this->performAjaxValidation(
		    $checkoutAssistant,
		    $borrower);
*/
		    if(isset($_POST['CheckoutAssistantForm'],
		             $_POST['BorrowerCheckoutForm']))
		    {

		      $checkoutAssistant->attributes = $_POST['CheckoutAssistantForm'];
		      $borrower->attributes = $_POST['BorrowerCheckoutForm'];
	
		      $valid = $checkoutAssistant->validate();
		      $valid = $borrower->validate() && $valid;

		      if($valid)
		      {

		        $reservation = new EquipmentReservation;

		        $reservation->checkout_assistant_email = $checkoutAssistant->email;
		        $reservation->borrowers_email = $borrower->email;
		    
		        $reservation->notes = $checkoutAssistant->notes;
			$now = date("Y-m-d H:i:s");
			$later = date("Y-m-d H:i:s", strtotime($now . "+ 2 day"));
			$reservation->start_date_time = $now;
			$reservation->end_date_time = $later;
			$reservation->equipment_id = $_GET['equipment_id'];
			$reservation->save(false);

			//var_dump($_POST);

			/*
			  For some reason, the checkboxes related to acessory pieces are being identified with their IDs, which seem to be thier names with the spaces removed
			*/

			$accessories = Equipment::model()->getAccessories(
				$_GET['equipment_id']);

			for($x = 0; $x < sizeof($accessories); $x++)
			{
			  $accessory = str_replace(" ", "_",$accessories[$x]->name);
			  $equipment_reservation_accessory = 
				new EquipmentReservationAccessory;

			  $equipment_reservation_accessory
			    ->equipment_reservation_id =
				$reservation->equipment_reservation_id;

			  $equipment_reservation_accessory
                            ->accessory_id = $accessories[$x]->accessory_id;


			  if(isset($_POST[$accessory])) //checked
			  {
			    $equipment_reservation_accessory
                            ->present = true;
			  }
			  else // unchecked
			  {
			    $equipment_reservation_accessory
                            ->present = false;
			  }
			  $equipment_reservation_accessory->save(false);
			}
			
		      }
		    }

		    $this->render('index',
		      array("checkoutAssistant" => $checkoutAssistant,
		     	    "borrower" => $borrower,));
			    //"reservation" => $reservation));
		}
	    }
	}

	protected function performAjaxValidation($models)
	{
	  if(isset($_POST['ajax']) && $_POST['ajax']==='checkout-form')
	  {
	    echo CActiveForm::validate($model);
	    Yii::app()->end();
	  }
	}

	/*
	  Returns an Equipment model object
	*/

	public function getEquipment($equipment_id)
	{
	  return Equipment::model()->FindByPk($equipment_id);
	}

	/*
          Retrieves the accessories associated with a piece of
	  equipment.
        */

        public function getAccessories($equipment_id)
        {
          return Equipment::model()->getAccessories($equipment_id);
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
