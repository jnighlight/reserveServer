<?php
/* @var $this EquipmentController */
/* @var $model Equipment */

$this->breadcrumbs=array(
	'Equipments'=>array('index'),
	$model->name,
);


$this->menu=array(
	array('label'=>'List Equipment', 'url'=>array('index')),
	array('label'=>'Create Equipment', 'url'=>array('create')),
	array('label'=>'Update Equipment', 'url'=>array('update', 'id'=>$model->equipment_id)),
	array('label'=>'Delete Equipment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->equipment_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Equipment', 'url'=>array('admin')),
);
?>

<h1>View Equipment #<?php echo $model->equipment_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'equipment_id',
		'serial_number',
		'manufacturer',
		'model_number',
		'description',
		'name',
		'image_url',
		'equipment_type_id',
	),
)); ?>
