<?php
/* @var $this EquipmentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Equipments',
);

$this->menu=array(
	array('label'=>'Create Equipment', 'url'=>array('create')),
	array('label'=>'Manage Equipment', 'url'=>array('admin')),
	array('label'=>'Checkin Equipment', 'url'=>array('equipment_checkin/index')),
);

Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl."/css/crud_controls.css");

?>

<h1>Equipment</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
