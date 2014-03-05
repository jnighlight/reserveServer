<?php
/* @var $this RoomEquipmentController */
/* @var $model RoomEquipment */

$this->breadcrumbs=array(
	'Room Equipments'=>array('index'),
	$model->name=>array('view','id'=>$model->room_equipment_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RoomEquipment', 'url'=>array('index')),
	array('label'=>'Create RoomEquipment', 'url'=>array('create')),
	array('label'=>'View RoomEquipment', 'url'=>array('view', 'id'=>$model->room_equipment_id)),
	array('label'=>'Manage RoomEquipment', 'url'=>array('admin')),
);
?>

<h1>Update RoomEquipment <?php echo $model->room_equipment_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>