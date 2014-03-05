<?php
/* @var $this RoomEquipmentController */
/* @var $model RoomEquipment */

$this->breadcrumbs=array(
	'Room Equipments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RoomEquipment', 'url'=>array('index')),
	array('label'=>'Manage RoomEquipment', 'url'=>array('admin')),
);
?>

<h1>Create RoomEquipment</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>