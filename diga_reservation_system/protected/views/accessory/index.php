<?php
/* @var $this AccessoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Accessories',
);

$this->menu=array(
	array('label'=>'Create Accessory', 'url'=>array('create')),
	array('label'=>'Manage Accessory', 'url'=>array('admin')),
);
?>

<h1>Accessories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
