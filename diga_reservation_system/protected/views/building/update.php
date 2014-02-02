<?php
/* @var $this BuildingController */
/* @var $model Building */

$this->breadcrumbs=array(
	'Buildings'=>array('index'),
	$model->name=>array('view','id'=>$model->building_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Building', 'url'=>array('index')),
	array('label'=>'Create Building', 'url'=>array('create')),
	array('label'=>'View Building', 'url'=>array('view', 'id'=>$model->building_id)),
	array('label'=>'Manage Building', 'url'=>array('admin')),
);
?>

<h1>Update Building <?php echo $model->building_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>