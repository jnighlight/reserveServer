<?php
/* @var $this AccessoryController */
/* @var $model Accessory */

$this->breadcrumbs=array(
	'Accessories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Accessory', 'url'=>array('index')),
	array('label'=>'Manage Accessory', 'url'=>array('admin')),
);
?>

<h1>Create Accessory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>