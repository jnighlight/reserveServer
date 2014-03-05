<?php

class Room_reservationController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	//A function to return a list of buildings. Technically, I could just call this line each time,
	//But I like the cleanliness
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
			array(/*'building_id'=>$buildId,*/ 'room_id'=>$roomId)
			);
	}

	private function extractTimes($rooms)
	{
		$times = array();
		$times[] = $rooms['sunday_open'];
		$times[] = $rooms['sunday_close'];
		$times[] = $rooms['monday_open'];
		$times[] = $rooms['monday_close'];
		$times[] = $rooms['tuesday_open'];
		$times[] = $rooms['tuesday_close'];
		$times[] = $rooms['wednesday_open'];
		$times[] = $rooms['wednesday_close'];
		$times[] = $rooms['thursday_open'];
		$times[] = $rooms['thursday_close'];
		$times[] = $rooms['friday_open'];
		$times[] = $rooms['friday_close'];
		$times[] = $rooms['saturday_open'];
		$times[] = $rooms['saturday_close'];
		return $times;
	}

	//Takes an array with SQL information of reservations for a specific room in a specific
	//building and turns them into a JSON array for the fullcalendar plugin
	public function reservationsToJSON($reservations)
	{
		$JSONRes = array();
		//i is just for the event ID's. Wouldn't want ppl knowing the real database id's. Security, and stuff
		$i = 0;
		$color = "#66A41A";
		foreach($reservations as $reservation)
		{
			$id = $i++;
			$name = User::model()->findByAttributes(array('email'=>$reservation['email']));
			$title = $name['last_name'] . ", " . $name['first_name'] . "\nReservation";
			
			//Make a dateTime with SQL data, and outputting it in the javascript format
			$start = $reservation['start_date_time'];
			$v = new DateTime($start);
			$start = $v -> format('D M d Y H:i:s TO');

			$end = $reservation['end_date_time'];
			$v = new DateTime($end);
			$end = $v -> format('D M d Y H:i:s TO');

			$JSONRes[] = array('id'=>$id, 'title'=>$title, 'start'=>$start, 'end'=>$end, 'color'=>$color);
		}
		//I return it json_encoded just so I get the product the way it should be inserted. This does limit the use of the method though. May change this later.
		return $JSONRes;
	}

	//Takes an array with SQL information of course for a specific room in a specific
	//building and turns them into a JSON array for the fullcalendar plugin
	public function coursesToJSON($courses)
	{
		$JSONCour = array();
		//i is just for the event ID's. Wouldn't want ppl knowing the real database id's. Security, and stuff
		$i = 0;
		//We want a little colour to distinguish it as a class
		$color = '#8F1803';
		//Go through each course
		foreach($courses as $course)
		{
			//Making an array for if the class happens on each day of the week
			$courseDays = array();
			$courseDays[1] = $course['monday'];
			$courseDays[2] = $course['tuesday'];
			$courseDays[3] = $course['wednesday'];
			$courseDays[4] = $course['thursday'];
			$courseDays[5] = $course['friday'];

			$id = $i++;
			$title = $course['name'];
			$endDate = new DateTime($course['endDate']);

			//Gonna start with the start date, and iterate through dates until we get to the day after the end date
			for($iterateDate = new DateTime($course['startDate']); $iterateDate <= $endDate; $iterateDate->modify('+1 day'))
			{
				$dayNum = $iterateDate -> format('N');//date('N', $iterateDate);
				
				//if it's not the weekend
				if($dayNum <= 5 && $courseDays[$dayNum])
				{
					//Make a dateTime with SQL data, and outputting it in the javascript format
					$start = new DateTime($course['start_time']);
					//$start = new DateTime($start);
					$v = new DateTime(($iterateDate -> format('D M d Y')) . ' ' . ($start -> format('H:i:s TO')));
					$start = $v -> format('D M d Y H:i:s TO');

					$end = new DateTime($course['end_time']);
					//$end = new DateTime($end);
					//Putting together the date and time
					$v = new DateTime($iterateDate -> format('D M d Y') . ' ' . $end -> format('H:i:s TO'));
					$end = $v -> format('D M d Y H:i:s TO');

					$JSONCour[] = array('id'=>$id, 'title'=>$title, 'start'=>$start, 
						'end'=>$end, 'color'=>$color);
				}
			}
		}
		return $JSONCour;
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
					$start = $v -> format('D M d Y H:i:s TO');

					$end = new DateTime($lab['end_time']);
					//Putting together the date and time
					$v = new DateTime($iterateDate -> format('D M d Y') . ' ' . $end -> format('H:i:s TO'));
					$end = $v -> format('D M d Y H:i:s TO');

					$JSONLab[] = array('id'=>$id, 'title'=>$title, 'start'=>$start,
					'end'=>$end, 'color'=>$color);
				}
			}
		}
		return $JSONLab;
	}


	//To validate the time for a possible new reservation.
	//It can't conflict with another reservation, and the end time must be after the start time
	public function timeValidate($startHour, $startMinute, $startAMPM, $endHour, $endMinute, $endAMPM, $date, $roomID)
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
		$weekDay = ($dayOfWeek != 'sunday' && $dayOfWeek != 'saturday');
		
		//Getting the open/closed hours of the room for that day
		$roomForTimes = Room::model() -> findByAttributes(array('room_id'=>$roomID));
		$roomOpenTime = strtotime($roomForTimes[$dayOfWeek . '_open']);
		$roomCloseTime = strtotime($roomForTimes[$dayOfWeek . '_close']);

		//Getting all of the reservations on that given day
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->condition = '(DATE(start_date_time) = "' . $mysqlDate .
			'" OR DATE(end_date_time) = "' . $mysqlDate . '") AND room_id = "' . $roomID . '"';
		$resvs = RoomReservation::model() -> findAll($criteria);

		//Make sure it's not too long of a reservation
		$maxLen = RoomReservationPolicy::model() -> findByAttributes(array('room_id'=>$roomID));
		$maxLen = $maxLen['max_reservation_hours'];
		if(isset($maxLen))
		{
			$timeForRes = $startDateTime -> diff($endDateTime);
			$ResHours = $timeForRes->format('%h');
			$ResHours += ($timeForRes->format('%i') > 0) ? 1 : 0;
			echo($ResHours. '\n');
			echo($maxLen. '\n');
			if($ResHours > $maxLen)
				{$inOrder = false;}
		}

		if($weekDay)
		{
			//Find courses on that day
			$criteria = new CDbCriteria();
			$criteria->select = '*';
			$criteria->condition = '("' .$mysqlDate . '" between startDate and endDate) AND ' .
				 $dayOfWeek . '=1 AND room_id=' . $roomID;
			$courses = Course::model() -> findAll($criteria);
		}

		//Find labs on that day
			$criteria = new CDbCriteria();
			$criteria->select = '*';
			$criteria->condition = '("' .$mysqlDate . '" between start_date and end_date) AND ' .
				 $dayOfWeek . '=1 AND room_id=' . $roomID;
			$labs = LabHour::model() -> findAll($criteria);


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
		$startTime = strtotime($startTime);
		$endTime = strtotime($endTime);

		//make sure that it's while the room is open
		if($startTime < $roomOpenTime || $endTime > $roomCloseTime)
			{$conflicts = true;}

		foreach($labs as $lab)
		{
			$labStart = strtotime($lab['start_time']);
			$labEnd = strtotime($lab['end_time']);

			//Checks to see if our new reservation's start or
			//end time is during an already made reservation
			if(($startTime > $labStart && $startTime < $labEnd) ||
				($endTime > $labStart && $endTime < $labEnd))
				{$conflicts = true;}

			if(($labStart > $startTime && $labStart < $endTime) ||
				($labEnd > $startTime && $labEnd < $endTime))
				{$conflicts = true;}

			//If they start and end at the same time, nogo
			if($labStart == $startTime && $labEnd == $endTime)
				{$conflicts = true;}
		}
		if($weekDay)
		{
			foreach($courses as $course)
			{
				$courseStart = strtotime($course['start_time']);
				$courseEnd = strtotime($course['end_time']);

				//Checks to see if our new reservation's start or end time is during an already made reservation
				if(($startTime > $courseStart && $startTime < $courseEnd) ||
					($endTime > $courseStart && $endTime < $courseEnd))
					{$conflicts = true;}

				if(($courseStart > $startTime && $courseStart < $endTime) ||
					($courseEnd > $startTime && $courseEnd < $endTime))
					{$conflicts = true;}

				//If they start and end at the same time, nogo
				if($courseStart == $startTime && $courseEnd == $endTime)
					{$conflicts = true;}
			}
		}
		//first value is true if they're in order, second value true if there are no conflicts
		return array($inOrder, !$conflicts);
	}

	//Makes a new reservation with email, buildID and the rest of the stuff
	public function insertRoomReservation($email, $roomID, $startDateTime, $endDateTime)
	{
		$res = new RoomReservation;
		$res->email = $email;
		$res->room_id = $roomID;
		$res->start_date_time = $startDateTime;
		$res->end_date_time = $endDateTime;
		$res->save();
		return $res->getPrimaryKey();
	}

	private function addRoomPermission($user_id, $room_id)
	{
		$perm = new RoomReservationPermission;
		$perm->user_id = $user_id;
		$perm->room_id = $room_id;
		$perm->save();
	}

	private function deleteRoomPermissions($room_id)
	{
		$query = "delete from room_reservation_permission where room_id= :room_id";
		$command = Yii::app()->db->createCommand($query);
		$command->execute(array('room_id' => $room_id));
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
				'actions'=>array('index','view','reserve','calendarRes', 'updateCal'),
				//'users'=>array('@'),
				'roles'=>array('user','workStudy','admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'permissions'),
				//'users'=>array('@'),
				'roles'=>array('workStudy','admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'class'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	//To edit who can reserve which room
	public function actionPermissions()
	{
		$model=new RoomReservationPermission;

		//Getting all of the users, organized by last name
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->order = 'last_name';
		$users = User::model() -> findAll($criteria);

		//Gets the info about the room so we don't have to search for it again
		$room_id = Yii::app()->request->getQuery('room_id',-1);
		$room_number = Yii::app()->request->getQuery('room_number',-1);
		$building_name = Yii::app()->request->getQuery('building_name',-1);

		//If some of it's missing, something's up, go back to the main reservation page
		if($room_id == -1 || $room_number == -1 || $building_name == -1)
			{$this->redirect(array('room_reservation/'));}

		//If we've already pushed the button, act on that before getting the new permission data
		if(isset($_POST['yt0']))
		{
			$i = 1;
			$iString = 'usr' . $i . 'hid';
			//Get rid of the permissions as they are
			$this -> deleteRoomPermissions($room_id);
			//loop through the hidden fields (i.e., the users in the list)
			while(isset($_POST[$iString]))
			{
				//If their box is checked...
				if(isset($_POST['usr' . $i]))
				{
					//Add a permission for them
					$this-> addRoomPermission($_POST[$iString], $room_id);
				}
				//...then look at the next hidden field
				$i++;
				$iString= 'usr'.$i.'hid';
			}
		}

		//Get the up to date permission information for this room
		$permissionObjects = RoomReservationPermission::model() -> findAllByAttributes(
			array('room_id'=>$room_id)
			);
		$permissionIds= array();
		//we know the room number, so we only need the user_id's
		//This can be made better, I think. I'll work on that.
		foreach($permissionObjects as $permissionObject)
		{
			$permissionIds[] = $permissionObject['user_id'];
		}
		//Finally, make the page
		$this->render('permissions',array('model'=>$model, 'users'=>$users, 'permissionIds'=>$permissionIds, 'room_number'=>$room_number, 'building_name'=>$building_name));
	}

	public function actionReserve()
	{
		$model = new Room;
		
		//If they've clicked the submit button...
	    	if(isset($_POST['yt0']))
	    	{
			//Take the attributes from the page and validate it
			$model->attributes=$_POST['Room'];
			if($model->validate())
			{
				//If validates, then goes to the calendarRes page with the buildID and roomNum
				$this->redirect(array('calendarRes','build_id'=>$model->building_id, 'room_number'=>$model->room_number));
			}
	    	}
		//Otherwise, renders the reserve page
	    	$this->render('reserve',array('model'=>$model));
		
		//If the building ID isn't set, we just make it blank.
		if(!isset($_POST['Room']['building_id']))
			{$_POST['Room']['building_id'] = '';}

		//We find the buildings with a certain building ID (replacing the :building_id with a number)
		$data = Room::model()->findAll('building_id=:building_id',
			array(':building_id'=>(int) $_POST['Room']['building_id']));
		
		//Echos out extra options for the roomnumber dropdown (this will only happen if there's a proper buildingID)
		$data = CHtml::listData($data,'room_id','room_number');
		echo CHtml::tag('option', array('value'=>''), 'Choose a room', true);
		foreach($data as $value=>$name)
		{
			echo CHtml::tag('option',
				array('value'=>$value),CHtml::encode($name),true);
		}
	}

	public function actionCalendarRes()
	{
    	    $model=new RoomReservation;

	    //get the room and building ID from GET
	    $building_id = Yii::app()->request->getQuery('build_id',-1);
	    $room_id = Yii::app()->request->getQuery('room_number',-1);
	    $roomNumber = Yii::app()->request->getQuery('roomNumber',-1);
	    $buildingName = Yii::app()->request->getQuery('buildingName',-1);
		
	    //If we're missing one of them, we should go back to room_reservation, where they're generated
            if($building_id == -1 || $room_id == -1)
		{$this->redirect(array('room_reservation/'));}

	    //Ok, let's make sure they have permission to do this
	    $userID = Yii::app()->user->getId();
	    $user = User::model()->findByAttributes(array('email'=>$userID));
	    $perms = RoomReservationPermission::model()->findByAttributes(array('user_id'=>$user['user_id'], 'room_id'=>$room_id));
	    $permission = isset($perms['room_id'])? true : false;
	    if(!$permission)
	    	{$this -> redirect(array('room_reservation/index'));}

	    //We then get the reservations and turn them into JSON format.
	    $reservations = $this -> getReservations($building_id, $room_id);
	    $courses = Course::model() -> findAllByAttributes(array('room_id'=>$room_id));
	    $labs = LabHour::model() -> findAllByAttributes(array('room_id'=>$room_id));

            $JSONreservations = $this -> reservationsToJSON($reservations);
	    $JSONcourses = $this -> coursesToJSON($courses);
	    $JSONLabs = $this -> labsToJSON($labs);
            $JSONreservations = array_merge($JSONcourses, $JSONreservations, $JSONLabs);
	    $JSONreservations = json_encode($JSONreservations);

	    //If the submit button has been pushed...
	    if(isset($_POST['yt0']))
	    {
		//we have to get all of the data out of the post.
		//There's probably a better way to do this. I'm not quite sure what it is ATM
		$date = Yii::app()->request->getPost('dateHolder', -1);
		$startHour = Yii::app()->request->getPost('StartHour', -1);
		$startMinute = Yii::app()->request->getPost('StartMinute', -1);
		$startAMPM = Yii::app()->request->getPost('StartAMPM', -1);
		$endHour = Yii::app()->request->getPost('EndHour', -1);
		$endMinute = Yii::app()->request->getPost('EndMinute', -1);
		$endAMPM = Yii::app()->request->getPost('EndAMPM', -1);

		//See if they're valid by calling our own validate method
		$valid = $this -> timeValidate($startHour, $startMinute, $startAMPM, $endHour, $endMinute, $endAMPM, $date, $room_id);
		

		//Valid returns an array so we know WHY it's not valid
		if($valid[0] && $valid[1] && $permission)
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

			//getting it all into the correct format, and redirecting to the page
			//Maybe this should go to the calendar view for the current building/room...hmmm
			$resID = $this -> insertRoomReservation(Yii::app()->user->getId(), $room_id, $startDateTime->format('Y/m/d H:i:s'), $endDateTime->format('Y/m/d H:i:s'));
			$this->redirect(array($resID));
		}
		//If the reservation times are in a bad format (like it ends before it begins)
		else if(!$valid[0])
		{
			echo("<script> alert('Check the times for your reservation again.'); </script>");
		}
		//If there's a reservation conflict
		else if(!$valid[1])
		{
			echo("<script> alert('Your reservation seems to conflict with another reservation. Please try again'); </script>");
		}
	    }
		$room = Room::model() -> findByAttributes(array('room_id'=>$room_id));
		$roomTimes = $this -> extractTimes($room);
	    $this->render('calendarRes',array('model'=>$model,'building_id'=>$building_id,'room_id'=>$room_id,
		'JSONRes'=>$JSONreservations, 'roomNumber'=>$roomNumber, 'buildingName'=> $buildingName,
		'roomTimes'=>$roomTimes));
}

	public function actionClass()
	{
	    $model=new RoomReservation;

	    // uncomment the following code to enable ajax-based validation
	    /*
	    if(isset($_POST['ajax']) && $_POST['ajax']==='room-reservation-class-form')
	    {
		echo CActiveForm::validate($model);
		Yii::app()->end();
	    }
	    */

	    if(isset($_POST['RoomReservation']))
	    {
		$model->attributes=$_POST['RoomReservation'];
		if($model->validate())
		{
		    // form inputs are valid, do something here
		    return;
		}
	    }
	    $this->render('class',array('model'=>$model));
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
	 * Has been modified to show them as a calendar, which is selected by building and room number
	 */
	public function actionIndex()
	{
		//If we're looking for a specific building and room, get that here. Otherwise...
		$buildingID = Yii::app()->request->getParam('building_list', -1);
		$roomID = Yii::app()->request->getParam('room_num',-1);
		$buildings = $this -> getBuildings();
		if($buildingID == '' || $roomID == '')
		{
			$buildingID = Yii::app()->request->getParam('cur_build', -1);
			$roomID = Yii::app()->request->getParam('cur_room',-1);
		}
		if($buildingID != -1 && $roomID != -1)
		{
			$roomNumber = Room::model() -> findAllByAttributes(array('room_id'=>$roomID));
			$roomNumber = $roomNumber[0]['room_number'];
			$buildingName = Building::model() -> findAllByAttributes(array('building_id'=>$buildingID));
			$buildingName = $buildingName[0]['name'];
			$resvs = $this -> getReservations($buildingID, $roomID);
		}
		else
		{
			//Just get the first one in the database
			$buildingID = $buildings[0]['building_id'];
			$buildingName = $buildings[0]['name'];
			$rooms = $this -> getRooms($buildingID);
			$roomID = $rooms[0]['room_id'];
			$roomNumber = $rooms[0]['room_number'];
			$resvs = $this -> getReservations($buildingID, $roomID);
		}
		//see if user has permission to reserve this room
		$permission = User::model()->findByAttributes(array('email'=>Yii::app()->user->getId()));
		$permission = RoomReservationPermission::model()->findByAttributes(array('user_id'=>$permission['user_id'], 'room_id'=>$roomID));
		$alert = false;	
		if(isset($_POST['yt1']))
		{
			if($permission)
			{
				$this->redirect(array('calendarRes','build_id'=>$buildingID,
					'room_number'=>$roomID, 'buildingName' => $buildingName,
					'roomNumber' => $roomNumber,));
			}
			else
			{
				$alert = true;
			}
		}
		else if(isset($_POST['yt2']))
		{
			$this->redirect(array('permissions', 'room_id'=>$roomID, 'room_number'=>$roomNumber,
				'building_name'=>$buildingName));
		}
		else if(isset($_POST['yt3']))
		{
			$roomPermission = RoomReservationPolicy::model() -> findByAttributes(array('room_id'=>$roomID));
			if(isset($roomPermission['room_reservation_policy_id']))
			{
				$this->redirect(array('roomReservationPolicy/update/' . 
					$roomPermission['room_reservation_policy_id'],));
			}
			else
			{
				$this->redirect(array('roomReservationPolicy/create'));
			}
		}
		//Getting courses
		$courses = Course::model() -> findAllByAttributes(array('room_id'=>$roomID));
		$JSONcourses = $this -> coursesToJSON($courses);
		$labs = LabHour::model() -> findAllByAttributes(array('room_id'=>$roomID));
		$JSONLabs = $this -> labsToJSON($labs);

		//Get the JSON version and pass it on
		$JSONRes = $this -> reservationsToJSON($resvs);
		$JSONRes = array_merge($JSONRes, $JSONcourses, $JSONLabs);
		$JSONRes = json_encode($JSONRes);

		$room = Room::model() -> findByAttributes(array('room_id'=>$roomID));
		$roomTimes = $this -> extractTimes($room);

		$this->render('index',array(
			'buildings'=>$buildings, 'buildingID'=>$buildingID, 'roomID'=>$roomID,'JSONRes'=>$JSONRes,
			'buildingName' => $buildingName, 'roomNumber' => $roomNumber,'alert'=>$alert,
			'roomTimes'=>$roomTimes,
		));
		/*       Modifying the second dropdown bar     */
		if(!isset($_POST['building_list']))
			{$_POST['building_list'] = '';}
		$data = Room::model()->findAll('building_id=:building_list',
			array(':building_list'=>(int) $_POST['building_list']));
		
		$data = CHtml::listData($data,'room_id','room_number');
		echo CHtml::tag('option', array('value'=>''), 'Choose a room', true);
		foreach($data as $value=>$name)
		{
			echo CHtml::tag('option',
				array('value'=>$value),CHtml::encode($name),true);
		}

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
