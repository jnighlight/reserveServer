<?php

class Room_reservationController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	public function getBuildings()
	{
		return Building::model() -> findAll(true);	
	}

	//Getting all of the rooms with a specific buildingId
	public function getRooms($buildId)
	{
		return Room::model() -> findAllByAttributes(
			array('building_id'=>$buildId)
			);
	}

	//Getting all of the reservations for a room in a building
	public function getReservations($buildId, $roomId)
	{
		return RoomReservation::model() -> findAllByAttributes(
			array('building_id'=>$buildId, 'room_id'=>$roomId)
			);
	}

	//Takes an array with SQL information of reservations for a specific room in a specific
	//building and turns them into a JSON array for the fullcalendar plugin
	public function reservationsToJSON($reservations)
	{
		$JSONRes = array();
		//i is just for the event ID's. Wouldn't want ppl knowing the real database id's. Security, and stuff
		$i = 0;
		foreach($reservations as $reservation)
		{
			$id = $i++;
			$title = $reservation['email'];

			//Make a dateTime with SQL data, and outputting it in the javascript format
			$start = $reservation['start_date_time'];
			$v = new DateTime($start);
			$start = $v -> format('D M d Y H:i:s TO');

			$end = $reservation['end_date_time'];
			$v = new DateTime($end);
			$end = $v -> format('D M d Y H:i:s TO');

			$JSONRes[] = array('id'=>$id, 'title'=>$title, 'start'=>$start, 'end'=>$end);
		}
		//I return it json_encoded just so I get the product the way it should be inserted. This does limit the use of the method though. May change this later.
		return json_encode($JSONRes);
	}

	//To validate the time for a possible new reservation.
	//It can't conflict with another reservation, and the end time must be after the start time
	public function timeValidate($startHour, $startMinute, $startAMPM, $endHour, $endMinute, $endAMPM, $date)
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

		//Getting all of the reservations on that given day
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->condition = 'DATE(start_date_time) = "' . $mysqlDate .
			'" OR DATE(end_date_time) = "' . $mysqlDate . '"';
		$resvs = RoomReservation::model() -> findAll($criteria);


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
		//first value is true if they're in order, second value true if there are no conflicts
		return array($inOrder, !$conflicts);
	}


	public function insertRoomReservation($email, $buildID, $roomID, $startDateTime, $endDateTime)
	{
		$res = new RoomReservation;
		$res->email = $email;
		$res->building_id = $buildID;
		$res->room_id = $roomID;
		$res->start_date_time = $startDateTime;
		$res->end_date_time = $endDateTime;
		$res->save();
		return $res->getPrimaryKey();
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
				'actions'=>array('index','view','reserve','calendarRes'),
				//'users'=>array('@'),
				'roles'=>array('user','workStudy','admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				//'users'=>array('@'),
				'roles'=>array('workStudy','admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionReserve()
	{
		$model = new Room;
		
	    	if(isset($_POST['yt0']))
	    	{
			$model->attributes=$_POST['Room'];
				//print_r($model->attributes);
			if($model->validate())
			{
				//print_r($model->attributes);
		    		echo('THIS IS SUBMITed');
				//return;
				$this->redirect(array('calendarRes','build_id'=>$model->building_id, 'room_number'=>$model->room_number));
			}
	    	}
	    	$this->render('reserve',array('model'=>$model));

		if(!isset($_POST['Room']['building_id']))
			{/*print_r($_POST);*/ $_POST['Room']['building_id'] = '';}
		$data = Room::model()->findAll('building_id=:building_id',
			array(':building_id'=>(int) $_POST['Room']['building_id']));
		//if(isset($data[0])){print_r($data[0]['room_number']);}
		
		$data = CHtml::listData($data,'room_id','room_number');
		echo CHtml::tag('option', array('value'=>''), 'Choose a room', true);
		foreach($data as $value=>$name)
		{
			echo CHtml::tag('option',
				array('value'=>$value),CHtml::encode($name),true);
		}
		//}
	    //$this->render('resTest',array('model'=>$model));
	}

	public function actionCalendarRes()
	{
    	    $model=new RoomReservation;
	    //print(Yii::app()->request->getQuery('dateHolder', -1));
	    //print(Yii::app()->request->getParam('dateHolder', -1));
	    //print(Yii::app()->request->getPost('dateHolder', -1));

//	    print(Yii::app()->request->getQuery('build_id', -1));
	    $building_id = Yii::app()->request->getQuery('build_id',-1);
	    $room_id = Yii::app()->request->getQuery('room_number',-1);
            if($building_id == -1 || $room_id == -1)
		{$this->redirect(array('reserve'));}
	    $reservations = $this -> getReservations($building_id, $room_id);
		//print_r($reservations[0]['start_date_time']);
            $JSONreservations = $this -> reservationsToJSON($reservations);
		//print_r($JSONreservations);

	    if(isset($_POST['yt0']))
	    {
		//$model->attributes=$_POST['Room'];
		//print_r($_POST);
		$date = Yii::app()->request->getPost('dateHolder', -1);
		$startHour = Yii::app()->request->getPost('StartHour', -1);
		$startMinute = Yii::app()->request->getPost('StartMinute', -1);
		$startAMPM = Yii::app()->request->getPost('StartAMPM', -1);
		$endHour = Yii::app()->request->getPost('EndHour', -1);
		$endMinute = Yii::app()->request->getPost('EndMinute', -1);
		$endAMPM = Yii::app()->request->getPost('EndAMPM', -1);

		$valid = $this -> timeValidate($startHour, $startMinute, $startAMPM, $endHour, $endMinute, $endAMPM, $date);
		if($valid[0] && $valid[1])
		{
			//Taking the inputs and turning them into real time data
			$adjustedStartHour = $startAMPM == 1? $startHour + 12 : $startHour;
			$startTime = ' ' . $adjustedStartHour . ':' . ($startMinute * 30) . ':00';
			$adjustedEndHour = $endAMPM == 1? $endHour + 12 : $endHour;
			$endTime = ' ' . $adjustedEndHour . ':' . ($endMinute * 30) . ':00';

			//Getting the start and end time of the reservation to be made
			$mysqlDate = date('Y-m-d', strtotime($date));
			$startDateTime = new DateTime($mysqlDate . $startTime);
			$endDateTime = new DateTime($mysqlDate . $endTime);

			$resID = $this -> insertRoomReservation(Yii::app()->user->getId(), $building_id, $room_id, $startDateTime->format('Y/m/d H:i:s'), $endDateTime->format('Y/m/d H:i:s'));
			$this->redirect(array($resID));
		}
		else if(!$valid[0])
		{
			echo("<script> alert('Check the times for your reservation again.'); </script>");
		}
		else if(!$valid[1])
		{
			echo("<script> alert('Your reservation seems to conflict with another reservation. Please try again'); </script>");
		}
		//$this->refresh();
	    }
	    $this->render('calendarRes',array('model'=>$model,'building_id'=>$building_id,'room_id'=>$room_id,
		'JSONRes'=>$JSONreservations));
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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new RoomReservation;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RoomReservation']))
		{
			$model->attributes=$_POST['RoomReservation'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->room_reservation_id));
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

		if(isset($_POST['RoomReservation']))
		{
			$model->attributes=$_POST['RoomReservation'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->room_reservation_id));
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
		$dataProvider=new CActiveDataProvider('RoomReservation');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new RoomReservation('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RoomReservation']))
			$model->attributes=$_GET['RoomReservation'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return RoomReservation the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=RoomReservation::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param RoomReservation $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='room-reservation-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
