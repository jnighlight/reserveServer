<?php
/* @var $this RoomEquipmentReservationController */
/* @var $model RoomEquipmentReservation */

$this->breadcrumbs=array(
	'Room Equipment Reservations'=>array('index'),
	$model->room_equipment_reservation_id=>array('view','id'=>$model->room_equipment_reservation_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RoomEquipmentReservation', 'url'=>array('index')),
	array('label'=>'Create RoomEquipmentReservation', 'url'=>array('create')),
	array('label'=>'View RoomEquipmentReservation', 'url'=>array('view', 'id'=>$model->room_equipment_reservation_id)),
	array('label'=>'Manage RoomEquipmentReservation', 'url'=>array('admin')),
);
?>

<h1>Update RoomEquipmentReservation <?php echo $model->room_equipment_reservation_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>