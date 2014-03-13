<?php
/* @var $this RoomEquipmentController */
/* @var $dataProvider CActiveDataProvider */
/* @var $equipment EquipmentArray*/
/* @var $buildName String*/
/* @var $roomNum int*/

Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl."/css/crud_controls.css");
?>

<h1>Reserve Equipment in <?php echo($buildName . ', Room ' . $roomNum); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
