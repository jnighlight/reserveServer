<?php
/* @var $this LabHourController */
/* @var $model LabHour */

$this->breadcrumbs=array(
	'Lab Hours'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LabHour', 'url'=>array('index')),
	array('label'=>'Manage LabHour', 'url'=>array('admin')),
);
?>

<h1>Create LabHour</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>