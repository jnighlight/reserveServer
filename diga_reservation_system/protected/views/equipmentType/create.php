<?php
/* @var $this EquipmentTypeController */
/* @var $model EquipmentType */

$this->breadcrumbs=array(
	'Equipment Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EquipmentType', 'url'=>array('index')),
	array('label'=>'Manage EquipmentType', 'url'=>array('admin')),
);
?>

<h1>Create EquipmentType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>