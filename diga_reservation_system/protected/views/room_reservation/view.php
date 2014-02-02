<?php
/* @var $this Room_reservationController */
/* @var $model RoomReservation */

$this->breadcrumbs=array(
	'Room Reservations'=>array('index'),
	$model->room_reservation_id,
);

$this->menu=array(
	array('label'=>'List RoomReservation', 'url'=>array('index')),
	array('label'=>'Create RoomReservation', 'url'=>array('create')),
	array('label'=>'Update RoomReservation', 'url'=>array('update', 'id'=>$model->room_reservation_id)),
	array('label'=>'Delete RoomReservation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->room_reservation_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RoomReservation', 'url'=>array('admin')),
);
?>

<h1>View RoomReservation #<?php echo $model->room_reservation_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'room_reservation_id',
		'email',
		'building_id',
		'room_id',
		'start_date_time',
		'end_date_time',
	),
)); ?>
