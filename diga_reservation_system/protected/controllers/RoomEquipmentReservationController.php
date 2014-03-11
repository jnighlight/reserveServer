<?php

class RoomEquipmentReservationController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	//Makes a new reservation with email, buildID and the rest of the stuff
	public function insertEquipmentReservation($equipmentID, $email, $roomID, $startDateTime, $endDateTime)
	{
		$res = new RoomEquipmentReservation;
		$res->room_equipment_id = $equipmentID;
		$res->email=$email;
		$res->room_id = $roomID;
		$res->start_date_time = $startDateTime;
		$res->end_date_time = $endDateTime;
		$res->save();
		return $res->getPrimaryKey();
	}

	//Takes an array with SQL information of labs for a specific room in a specific
	//building and turns them into a JSON array for the fullcalendar plugin
	public function labsToJSON($labs)
	{
		$JSONLab = array();
		//i is just for the event ID's. Wouldn't want ppl knowing the real database id's. Security, and stuff
		$i = 0;
		$color = "#145BA5";
		$title = "Lab Hours";
		//Go through each course
		foreach($labs as $lab)
		{
			//Making an array for if the class happens on each day of the week
			$labDays = array();
			$labDays[1] = $lab['monday'];
			$labDays[2] = $lab['tuesday'];
			$labDays[3] = $lab['wednesday'];
			$labDays[4] = $lab['thursday'];
			$labDays[5] = $lab['friday'];
			$labDays[6] = $lab['saturday'];
			$labDays[7] = $lab['sunday'];

			$id = $i++;
			$endDate = new DateTime($lab['end_date']);

			//Gonna start with the start date, and iterate through dates until we get to the day after the end date
			for($iterateDate = new DateTime($lab['start_date']); $iterateDate <= $endDate; $iterateDate->modify('+1 day'))
			{
				$dayNum = $iterateDate -> format('N');
				
				//And if the course is on that day
				if($labDays[$dayNum])
				{
					//Make a dateTime with SQL data, and outputting it in the javascript format
					$start = new DateTime($lab['start_time']);
					$v = new DateTime(($iterateDate -> format('D M d Y')) . ' ' . ($start -> format('H:i:s TO')));
					//$start = $v -> format('D M d Y H:i:s TO');
					$start = $v -> format('Y-m-d\TH:i:s');

					$end = new DateTime($lab['end_time']);
					//Putting together the date and time
					$v = new DateTime($iterateDate -> format('D M d Y') . ' ' . $end -> format('H:i:s TO'));
					//$end = $v -> format('D M d Y H:i:s TO');
					$end = $v -> format('Y-m-d\TH:i:s');

					$JSONLab[] = array('id'=>$id, 'title'=>$title, 'start'=>$start,
					'end'=>$end, 'color'=>$color);
				}
			}
		}
		return $JSONLab;
	}


	//Takes an array with SQL information of reservations for a specific equipment in a specific
	//room and turns them into a JSON array for the fullcalendar plugin
	public function equipmentToJSON($equipments)
	{
		$JSONRes = array();
		//i is just for the event ID's. Wouldn't want ppl knowing the real database id's. Security, and stuff
		$i = 0;
		$color = "#66A41A";
		foreach($equipments as $equipment)
		{
			$id = $i++;
			$title = $equipment['email'];
			
			//Make a dateTime with SQL data, and outputting it in the javascript format
			$start = $equipment['start_date_time'];
			$v = new DateTime($start);
			//$start = $v -> format('D M d Y H:i:s TO');
			$start = $v -> format('Y-m-d\TH:i:s');

			$end = $equipment['end_date_time'];
			$v = new DateTime($end);
			//$end = $v -> format('D M d Y H:i:s TO');
			$end = $v -> format('Y-m-d\TH:i:s');

			$JSONRes[] = array('id'=>$id, 'title'=>$title, 'start'=>$start, 'end'=>$end, 'color'=>$color);
		}
		//I return it json_encoded just so I get the product the way it should be inserted. This does limit the use of the method though. May change this later.
		return $JSONRes;
	}

	//To validate the time for a possible new reservation.
	//It can't conflict with another reservation, and the end time must be after the start time
	public function timeValidate($startHour, $startMinute, $startAMPM, $endHour, $endMinute, $endAMPM, $date, $roomID, $equipmentID)
	{
		$conflicts = false;
		$inOrder = true;
		//If it starts in PM and ends in AM, it's not in order
		if($endAMPM < $startAMPM)
			{$inOrder = false;}
		//If they're in the same half-day...
		if($endAMPM == $startAMPM)
		{
			//And during the same hour..
			if($startHour == $endHour)
			{
				//Unless it's only a half hour reservation, it's bad
				if($endMinute <= $startMinute)
					{$inOrder = false;}
			}
			//And if it ends before it begins, we're nogo
			if($startHour > $endHour)
				{$inOrder = false;}
			
		}
		
		//Now to check for conflicts

		//Taking the inputs and turning them into real time data
		$adjustedStartHour = $startAMPM == 1? $startHour + 12 : $startHour;
		$startTime = ' ' . $adjustedStartHour . ':' . ($startMinute * 30) . ':00';
		$adjustedEndHour = $endAMPM == 1? $endHour + 12 : $endHour;
		$endTime = ' ' . $adjustedEndHour . ':' . ($endMinute * 30) . ':00';

		//Getting the start and end time of the reservation to be made
		$mysqlDate = date('Y-m-d', strtotime($date));
		$startDateTime = new DateTime($mysqlDate . $startTime);
		$endDateTime = new DateTime($mysqlDate . $endTime);
		$dayOfWeek = strtolower(date('l', strtotime($date)));
		
		//Find labs on that day
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->condition = '("' .$mysqlDate . '" between start_date and end_date) AND ' .
			 $dayOfWeek . '=1 AND room_id=' . $roomID;
		$labs = LabHour::model() -> findAll($criteria);

		$startTime = strtotime($startTime);
		$endTime = strtotime($endTime);

		$goodLab = false;
		foreach($labs as $lab)
		{
			$labStart = strtotime($lab['start_time']);
			$labEnd = strtotime($lab['end_time']);

			//We need the reservation to be in only one lab hour
			if(($startTime >= $labStart && $startTime < $labEnd) &&
				($endTime > $labStart && $endTime <= $labEnd))
				{$goodLab = true;}
		}
		if($goodLab)
		{
			//Getting all of the reservations on that given day
			$criteria = new CDbCriteria();
			$criteria->select = '*';
			$criteria->condition = '(DATE(start_date_time) = "' . $mysqlDate .
				'" OR DATE(end_date_time) = "' . $mysqlDate . '") AND room_equipment_id = "' . $equipmentID . '"';
			$resvs = RoomEquipmentReservation::model() -> findAll($criteria);
			foreach($resvs as $res)
			{
				$resStart = new DateTime($res['start_date_time']);
				$resEnd = new DateTime($res['end_date_time']);

				//Checks to see if our new reservation's start or end time is during an already made reservation
				if(($startDateTime > $resStart && $startDateTime < $resEnd) ||
					($endDateTime > $resStart && $endDateTime < $resEnd))
					{$conflicts = true;}

				if(($resStart > $startDateTime && $resStart < $endDateTime) ||
					($resEnd > $startDateTime && $resEnd < $endDateTime))
					{$conflicts = true;}

				//If they start and end at the same time, nogo
				if($resStart == $startDateTime && $resEnd == $endDateTime)
					{$conflicts = true;}
			}
		}
		return array($inOrder, !$conflicts, $goodLab);
	}



	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('equipmentRes'),
				'roles'=>array('user','workStudy','admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view', 'create','update'),
				'roles'=>array('workStudy','admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Where the user reserves the equipment
	 */
	public function actionEquipmentRes()
	{
		print_r($_POST);
		$model = new RoomEquipmentReservation;
		$room_id = Yii::app()->request->getParam('room_id', -1);
		$equipment_id = Yii::app()->request->getParam('equipment_id', -1);
		if($room_id == -1 || $equipment_id == -1)
			{$this->redirect(array('/room_reservation/index'));}
		if(isset($_POST['yt0']))
		{
			$check = $this -> timeValidate($_POST['StartHour'], $_POST['StartMinute'], $_POST['StartAMPM'], $_POST['EndHour'], $_POST['EndMinute'], $_POST['EndAMPM'], $_POST['dateHolder'], $room_id, $equipment_id);
			if($check[0] && $check[1] && $check[2])
			{
				//Taking the inputs and turning them into real time data
				$adjustedStartHour = $_POST['StartAMPM'] == 1? $_POST['StartHour'] + 12 : $$_POST['startHour'];
				$startTime = ' ' . $adjustedStartHour . ':' . ($_POST['StartMinute'] * 30) . ':00';
				$adjustedEndHour = $_POST['EndAMPM'] == 1? $_POST['EndHour'] + 12 : $_POST['endHour'];
				$endTime = ' ' . $adjustedEndHour . ':' . ($_POST['EndMinute'] * 30) . ':00';

				//Getting the start and end time of the reservation to be made
				$mysqlDate = date('Y-m-d', strtotime($_POST['dateHolder']));
				$startDateTime = new DateTime($mysqlDate . $startTime);
				$endDateTime = new DateTime($mysqlDate . $endTime);

				//getting it all into the correct format, and redirecting to the page
				//Maybe this should go to the calendar view for the current building/room...hmmm
				$resID = $this->insertEquipmentReservation($equipment_id, Yii::app()->user->getId(), $room_id, $startDateTime->format('Y/m/d H:i:s'), $endDateTime->format('Y/m/d H:i:s'));
				//$this->redirect(array($resID));
			}
			else if(!$check[0])
				{echo("<script> alert('Check the times for your reservation again.'); </script>");}
			else if(!$check[1])
				{echo("<script> alert('There appears to be a conflict with your reservation. Try again'); </script>");}
			else if(!$check[2])
				{echo("<script> alert('You can only reserve equipment during lab hours'); </script>");}

		}
		$names = array();

		$room = Room::model()->findByAttributes(array('room_id'=>$room_id));
		$building = Building::model()->findByAttributes(array('building_id'=>$room['building_id']));
		$equipment = RoomEquipment::model()->findByAttributes(array('room_equipment_id'=>$equipment_id));

		$names[] = $building['name'];
		$names[] = $room['room_number'];
		$names[] = $equipment['name'];

		$labHours = LabHour::model()->findAllByAttributes(array('room_id'=>$room_id));
		$JsonLabs = $this-> labsToJSON($labHours);

		$reservations = RoomEquipmentReservation::model()->findAllByAttributes(array('room_equipment_id'=>$equipment_id));
		$JsonRes = $this -> equipmentToJSON($reservations);

		$JsonRes = array_merge($JsonRes, $JsonLabs);
		$reservations = json_encode($JsonRes);
		$this->render('equipmentRes',array(
			'model'=>$model,'reservations'=>$reservations, 'names'=>$names
		));
	}


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new RoomEquipmentReservation;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RoomEquipmentReservation']))
		{
			$model->attributes=$_POST['RoomEquipmentReservation'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->room_equipment_reservation_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RoomEquipmentReservation']))
		{
			$model->attributes=$_POST['RoomEquipmentReservation'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->room_equipment_reservation_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('RoomEquipmentReservation');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new RoomEquipmentReservation('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RoomEquipmentReservation']))
			$model->attributes=$_GET['RoomEquipmentReservation'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return RoomEquipmentReservation the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=RoomEquipmentReservation::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param RoomEquipmentReservation $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='room-equipment-reservation-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
