<?php
/* @var $this LabHourController */
/* @var $model LabHour */

$this->breadcrumbs=array(
	'Lab Hours'=>array('index'),
	$model->lab_hour,
);

$this->menu=array(
	array('label'=>'List LabHour', 'url'=>array('index')),
	array('label'=>'Create LabHour', 'url'=>array('create')),
	array('label'=>'Update LabHour', 'url'=>array('update', 'id'=>$model->lab_hour)),
	array('label'=>'Delete LabHour', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->lab_hour),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LabHour', 'url'=>array('admin')),
);
?>

<h1>View LabHour #<?php echo $model->lab_hour; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'lab_hour',
		'room_id',
		'start_date',
		'end_date',
		'start_time',
		'end_time',
		'monday',
		'tuesday',
		'wednesday',
		'thursday',
		'friday',
		'saturday',
		'sunday',
	),
)); ?>
