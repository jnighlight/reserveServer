<?php
/* @var $this RoomEquipmentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Room Equipments',
);

$this->menu=array(
	array('label'=>'Create RoomEquipment', 'url'=>array('create')),
	array('label'=>'Manage RoomEquipment', 'url'=>array('admin')),
);
?>

<h1>Room Equipments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
