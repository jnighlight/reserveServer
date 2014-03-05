<?php
/* @var $this RoomReservationPolicyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Room Reservation Policies',
);

$this->menu=array(
	array('label'=>'Create RoomReservationPolicy', 'url'=>array('create')),
	array('label'=>'Manage RoomReservationPolicy', 'url'=>array('admin')),
);
?>

<h1>Room Reservation Policies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
