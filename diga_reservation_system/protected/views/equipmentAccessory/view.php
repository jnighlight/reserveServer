<?php
/* @var $this RoomController */
/* @var $model Room */

$this->breadcrumbs=array(
	'EquipmentAccessory'=>array('index'),
	$model->equipment_id,
);

$this->menu=array(
	array('label'=>'List Equipment Accessory Links', 'url'=>array('index')),
	array('label'=>'Create Equipment Accessory Link', 'url'=>array('create')),
	array('label'=>'Update Equipment Accessory Link', 'url'=>array('update','equip_id'=>$model->equipment_id,'accessory_id'=>$model->accessory_id)),
	array('label'=>'Delete Equipment Accessory Link', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','equip_id'=>$model->equipment_id, 'accessory_id'=>$model->accessory_id),'confirm'=>'Are you sure you want to delete this item?')),
);

?>

<h1>View Equipment <?php echo "TEST"; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'equipment_id',
		'accessory_id',),
)); ?>
