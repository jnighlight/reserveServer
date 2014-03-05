<?php
/* @var $this RoomEquipmentController */
/* @var $model RoomEquipment */

$this->breadcrumbs=array(
	'Room Equipments'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List RoomEquipment', 'url'=>array('index')),
	array('label'=>'Create RoomEquipment', 'url'=>array('create')),
	array('label'=>'Update RoomEquipment', 'url'=>array('update', 'id'=>$model->room_equipment_id)),
	array('label'=>'Delete RoomEquipment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->room_equipment_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RoomEquipment', 'url'=>array('admin')),
);
?>

<h1>View RoomEquipment #<?php echo $model->room_equipment_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'room_equipment_id',
		'room_id',
		'name',
		'serial_number',
		'description',
		'image_url',
	),
)); ?>
