<?php
/* @var $this RoomController */
/* @var $model Room */

$this->breadcrumbs=array(
	'Rooms'=>array('index'),
	$model->room_id,
);

$this->menu=array(
	array('label'=>'List Room', 'url'=>array('index')),
	array('label'=>'Create Room', 'url'=>array('create')),
	array('label'=>'Update Room', 'url'=>array('update', 'id'=>$model->room_id)),
	array('label'=>'Delete Room', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->room_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Room', 'url'=>array('admin')),
);
?>

<h1>View Room #<?php echo $model->room_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'room_id',
		'room_number',
		'building_id',
		'description',
		'image_url',
		'monday_open',
		'monday_close',
		'tuesday_open',
		'tuesday_close',
		'wednesday_open',
		'wednesday_close',
		'thursday_open',
		'thursday_close',
		'friday_open',
		'friday_close',
		'saturday_open',
		'saturday_close',
		'sunday_open',
		'sunday_close',
	),
)); ?>
