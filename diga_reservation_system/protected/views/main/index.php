<?php
/* @var $this MainController */

$this->breadcrumbs=array(
	'Main',
);
?>

<!-- Will use the div to style the images-->
<div class="main_options">
  
<?php

echo CHtml::beginForm();
echo CHtml::imageButton(Yii::app()->baseUrl."/images/room_reservation.png",array('name'=>'reserve_room'));
echo CHtml::imageButton(Yii::app()->baseUrl."/images/equipment_reservation.png",array('name'=>'reserve_equipment'));
echo CHtml::endForm();


?>

</div>
