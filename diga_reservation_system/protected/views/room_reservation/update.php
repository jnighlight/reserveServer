<?php
/* @var $this Room_reservationController */
/* @var $model RoomReservation */

$this->breadcrumbs=array(
	'Room Reservations'=>array('index'),
	$model->room_reservation_id=>array('view','id'=>$model->room_reservation_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RoomReservation', 'url'=>array('index')),
	array('label'=>'Create RoomReservation', 'url'=>array('create')),
	array('label'=>'View RoomReservation', 'url'=>array('view', 'id'=>$model->room_reservation_id)),
	array('label'=>'Manage RoomReservation', 'url'=>array('admin')),
);
?>

<h1>Update RoomReservation <?php echo $model->room_reservation_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>