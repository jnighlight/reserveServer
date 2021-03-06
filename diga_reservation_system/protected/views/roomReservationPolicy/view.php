<?php
/* @var $this RoomReservationPolicyController */
/* @var $model RoomReservationPolicy */
$room = Room::model() -> findByAttributes(array('room_id'=>$model->room_id));
$building = Building::model() -> findByAttributes(array('building_id'=>$room['building_id']));

$roomNum = $room['room_number'];
$buildName = $building['name'];

$this->breadcrumbs=array(
	'Room Reservation Policies'=>array('index'),
	$model->room_reservation_policy_id,
);

$this->menu=array(
	array('label'=>'List RoomReservationPolicy', 'url'=>array('index')),
	array('label'=>'Create RoomReservationPolicy', 'url'=>array('create')),
	array('label'=>'Update RoomReservationPolicy', 'url'=>array('update', 'id'=>$model->room_reservation_policy_id)),
	array('label'=>'Delete RoomReservationPolicy', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->room_reservation_policy_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RoomReservationPolicy', 'url'=>array('admin')),
);
?>

<h1>View Room Reservation Policy <?php echo $model->room_reservation_policy_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array('label'=>'Building',
			'value'=>$buildName),
		array('label'=>'Room',
			'value'=>$roomNum),
		'max_reservation_hours',
	),
)); ?>
