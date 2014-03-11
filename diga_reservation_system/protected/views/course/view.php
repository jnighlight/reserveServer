<?php
/* @var $this CourseController */
/* @var $model Course */

$room = Room::model()->findByAttributes(array('room_id'=>$model->room_id));
$roomName = $room['room_number'];
$building = Building::model()->findByAttributes(array('building_id'=>$room['building_id']));
$buildingName = $building['name'];

$this->breadcrumbs=array(
	'Courses'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Course', 'url'=>array('index')),
	array('label'=>'Create Course', 'url'=>array('create')),
	array('label'=>'Update Course', 'url'=>array('update', 'id'=>$model->class_id)),
	array('label'=>'Delete Course', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->class_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Course', 'url'=>array('admin')),
);
?>

<h1>View Course #<?php echo $model->class_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'class_id',
		array('label'=>'Building', 'value'=>$buildingName),
		array('label'=>'Room Number', 'value'=>$roomName),
		'name',
		'email',
		'startDate',
		'endDate',
		'start_time',
		'end_time',
		array('label'=>'Monday', 'value'=>($model->monday ? 'Yes':'No')),
		array('label'=>'Tuesday', 'value'=>($model->tuesday ? 'Yes':'No')),
		array('label'=>'Wednesday', 'value'=>($model->wednesday ? 'Yes':'No')),
		array('label'=>'Thursday', 'value'=>($model->thursday ? 'Yes':'No')),
		array('label'=>'Friday', 'value'=>($model->friday ? 'Yes':'No')),
	),
)); ?>
