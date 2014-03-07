<?php
/* @var $this RoomEquipmentReservationController */
/* @var $model RoomEquipmentReservation */

$this->breadcrumbs=array(
	'Room Equipment Reservations'=>array('index'),
	$model->room_equipment_reservation_id,
);

$this->menu=array(
	array('label'=>'List RoomEquipmentReservation', 'url'=>array('index')),
	array('label'=>'Create RoomEquipmentReservation', 'url'=>array('create')),
	array('label'=>'Update RoomEquipmentReservation', 'url'=>array('update', 'id'=>$model->room_equipment_reservation_id)),
	array('label'=>'Delete RoomEquipmentReservation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->room_equipment_reservation_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RoomEquipmentReservation', 'url'=>array('admin')),
);
?>

<h1>View RoomEquipmentReservation #<?php echo $model->room_equipment_reservation_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'room_equipment_reservation_id',
		'room_equipment_id',
		'email',
		'room_id',
		'start_date_time',
		'end_date_time',
	),
)); ?>
