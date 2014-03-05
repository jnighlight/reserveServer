<?php
/* @var $this RoomEquipmentReservationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Room Equipment Reservations',
);

$this->menu=array(
	array('label'=>'Create RoomEquipmentReservation', 'url'=>array('create')),
	array('label'=>'Manage RoomEquipmentReservation', 'url'=>array('admin')),
);
?>

<h1>Room Equipment Reservations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
