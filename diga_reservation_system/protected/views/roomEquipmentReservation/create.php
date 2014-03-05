<?php
/* @var $this RoomEquipmentReservationController */
/* @var $model RoomEquipmentReservation */

$this->breadcrumbs=array(
	'Room Equipment Reservations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RoomEquipmentReservation', 'url'=>array('index')),
	array('label'=>'Manage RoomEquipmentReservation', 'url'=>array('admin')),
);
?>

<h1>Create RoomEquipmentReservation</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>