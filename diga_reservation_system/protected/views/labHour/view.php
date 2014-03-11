<?php
/* @var $this LabHourController */
/* @var $model LabHour */
$room = Room::model()->findByAttributes(array('room_id'=>$model->room_id));
$roomName = $room['room_number'];
$building = Building::model()->findByAttributes(array('building_id'=>$room['building_id']));
$buildingName = $building['name'];

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

<?php 
	$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array('label'=>'Building','value'=>$buildingName),
		array('label'=>'Room Number','value'=>$roomName),
		'start_date',
		'end_date',
		'start_time',
		'end_time',
		array('label'=>'Monday', 'value'=>($model->monday ? 'Yes':'No')),
		array('label'=>'Tuesday', 'value'=>($model->tuesday ? 'Yes':'No')),
		array('label'=>'Wednesday', 'value'=>($model->wednesday ? 'Yes':'No')),
		array('label'=>'Thursday', 'value'=>($model->thursday ? 'Yes':'No')),
		array('label'=>'Friday', 'value'=>($model->friday ? 'Yes':'No')),
		array('label'=>'Saturday', 'value'=>($model->saturday ? 'Yes':'No')),
		array('label'=>'Sunday', 'value'=>($model->sunday ? 'Yes':'No')),
	),
)); ?>
