<?php
/* @var $this AccessoryController */
/* @var $model Accessory */

$this->breadcrumbs=array(
	'Accessories'=>array('index'),
	$model->name=>array('view','id'=>$model->accessory_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Accessory', 'url'=>array('index')),
	array('label'=>'Create Accessory', 'url'=>array('create')),
	array('label'=>'View Accessory', 'url'=>array('view', 'id'=>$model->accessory_id)),
	array('label'=>'Manage Accessory', 'url'=>array('admin')),
);
?>

<h1>Update Accessory <?php echo $model->accessory_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>