<?php
/* @var $this EquipmentTypeController */
/* @var $model EquipmentType */

$this->breadcrumbs=array(
	'Equipment Types'=>array('index'),
	$model->name=>array('view','id'=>$model->equipment_type_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EquipmentType', 'url'=>array('index')),
	array('label'=>'Create EquipmentType', 'url'=>array('create')),
	array('label'=>'View EquipmentType', 'url'=>array('view', 'id'=>$model->equipment_type_id)),
	array('label'=>'Manage EquipmentType', 'url'=>array('admin')),
);
?>

<h1>Update EquipmentType <?php echo $model->equipment_type_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>