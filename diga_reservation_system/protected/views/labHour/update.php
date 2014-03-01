<?php
/* @var $this LabHourController */
/* @var $model LabHour */

$this->breadcrumbs=array(
	'Lab Hours'=>array('index'),
	$model->lab_hour=>array('view','id'=>$model->lab_hour),
	'Update',
);

$this->menu=array(
	array('label'=>'List LabHour', 'url'=>array('index')),
	array('label'=>'Create LabHour', 'url'=>array('create')),
	array('label'=>'View LabHour', 'url'=>array('view', 'id'=>$model->lab_hour)),
	array('label'=>'Manage LabHour', 'url'=>array('admin')),
);
?>

<h1>Update LabHour <?php echo $model->lab_hour; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>