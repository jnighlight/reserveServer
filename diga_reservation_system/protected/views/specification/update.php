<?php
/* @var $this SpecificationController */
/* @var $model Specification */

$this->breadcrumbs=array(
	'Specifications'=>array('index'),
	$model->name=>array('view','id'=>$model->specification_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Specification', 'url'=>array('index')),
	array('label'=>'Create Specification', 'url'=>array('create')),
	array('label'=>'View Specification', 'url'=>array('view', 'id'=>$model->specification_id)),
	array('label'=>'Manage Specification', 'url'=>array('admin')),
);
?>

<h1>Update Specification <?php echo $model->specification_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>