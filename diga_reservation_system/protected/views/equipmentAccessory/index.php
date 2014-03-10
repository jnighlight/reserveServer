<?php
/* @var $this RoomController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Equipment Accessories',
);
?>
<?php

$this->menu=array(
	array('label'=>'Create Room', 'url'=>array('create')),
);
?>

<h1>Quipment</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
