<?php
/* @var $this RoomReservationPolicyController */
/* @var $model RoomReservationPolicy */

$this->breadcrumbs=array(
	'Room Reservation Policies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RoomReservationPolicy', 'url'=>array('index')),
	array('label'=>'Manage RoomReservationPolicy', 'url'=>array('admin')),
);
?>

<h1>Create RoomReservationPolicy</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>