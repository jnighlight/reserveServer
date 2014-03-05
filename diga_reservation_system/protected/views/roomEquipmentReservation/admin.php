<?php
/* @var $this RoomEquipmentReservationController */
/* @var $model RoomEquipmentReservation */

$this->breadcrumbs=array(
	'Room Equipment Reservations'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List RoomEquipmentReservation', 'url'=>array('index')),
	array('label'=>'Create RoomEquipmentReservation', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#room-equipment-reservation-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Room Equipment Reservations</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'room-equipment-reservation-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'room_equipment_reservation_id',
		'email',
		'room_id',
		'start_date_time',
		'end_date_time',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
