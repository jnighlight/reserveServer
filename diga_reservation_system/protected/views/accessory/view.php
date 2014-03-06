<?php
/* @var $this AccessoryController */
/* @var $model Accessory */

$this->breadcrumbs=array(
	'Accessories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Accessory', 'url'=>array('index')),
	array('label'=>'Create Accessory', 'url'=>array('create')),
	array('label'=>'Update Accessory', 'url'=>array('update', 'id'=>$model->accessory_id)),
	array('label'=>'Delete Accessory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->accessory_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Accessory', 'url'=>array('admin')),
);
?>

<h1>View Accessory #<?php echo $model->accessory_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'accessory_id',
		'name',
		'description',
	),
)); ?>
