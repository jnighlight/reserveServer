<?php
/* @var $this RoomReservationPolicyController */
/* @var $model RoomReservationPolicy */

$this->breadcrumbs=array(
	'Room Reservation Policies'=>array('index'),
	$model->room_reservation_policy_id=>array('view','id'=>$model->room_reservation_policy_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RoomReservationPolicy', 'url'=>array('index')),
	array('label'=>'Create RoomReservationPolicy', 'url'=>array('create')),
	array('label'=>'View RoomReservationPolicy', 'url'=>array('view', 'id'=>$model->room_reservation_policy_id)),
	array('label'=>'Manage RoomReservationPolicy', 'url'=>array('admin')),
);
?>

<h1>Update RoomReservationPolicy <?php echo $model->room_reservation_policy_id; ?></h1>

<?php echo $this->renderPartial('_updateform', array('model'=>$model)); ?>
