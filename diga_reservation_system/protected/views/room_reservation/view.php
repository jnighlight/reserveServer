<?php
/* @var $this Room_reservationController */
/* @var $model RoomReservation */

$this->breadcrumbs=array(
	'Room Reservations'=>array('index'),
	$model->room_reservation_id,
);

$this->menu=array(
	array('label'=>'List Room Reservation', 'url'=>array('index')),
	array('label'=>'Create Room Reservation', 'url'=>array('create')),
	array('label'=>'Update Room Reservation', 'url'=>array('update', 'id'=>$model->room_reservation_id)),
	array('label'=>'Delete Room Reservation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->room_reservation_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Room Reservation', 'url'=>array('admin')),
);
?>

<h1>View Room Reservation #<?php echo $model->room_reservation_id; ?></h1>

<?php   //Getting the room number instead of the ID
	$roomID = $model['room_id'];
	$roomNumber = Room::model()->findAllByAttributes(array('room_id'=>$roomID));
	$roomNumber = $roomNumber[0]['room_number'];

	//Getting the building name instead of id number
	$buildingID = $model['building_id'];
	$buildingName = Building::model()->findAllByAttributes(array('building_id'=>$buildingID));
	$buildingName = $buildingName[0]['name'];

	//Making the times look prettier
	$startTime = date('l, F j, Y  g:i a' , strtotime($model['start_date_time']));
	$endTime = date('l, F j, Y  g:i a' , strtotime($model['end_date_time']));

	$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'email',
		array(
		'label'=>'Building',
		'value'=>$buildingName,
		),
		array(
		'label'=>'Room',
		'value'=>$roomNumber,
		),
		array(
		'label'=>'From',
		'value'=>$startTime,
		),
		array(
		'label'=>'To',
		'value'=>$endTime,
		),
	),
)); ?>
