<?php
/* @var $this LabHourController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lab Hours',
);

$this->menu=array(
	array('label'=>'Create LabHour', 'url'=>array('create')),
	array('label'=>'Manage LabHour', 'url'=>array('admin')),
);
?>

<h1>Lab Hours</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
