<?php
/* @var $this EquipmentTypeController */
/* @var $model EquipmentType */

$this->breadcrumbs=array(
	'Equipment Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List EquipmentType', 'url'=>array('index')),
	array('label'=>'Create EquipmentType', 'url'=>array('create')),
	array('label'=>'Update EquipmentType', 'url'=>array('update', 'id'=>$model->equipment_type_id)),
	array('label'=>'Delete EquipmentType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->equipment_type_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EquipmentType', 'url'=>array('admin')),
);
?>

<h1>View EquipmentType #<?php echo $model->equipment_type_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'equipment_type_id',
		'name',
	),
)); ?>
