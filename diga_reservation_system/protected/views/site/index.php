<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<
<p>Mark sux so I fixed this part for him LOLZ.</p>

<?php
echo CHtml::beginForm();
echo CHtml::imageButton(Yii::app()->baseUrl."/images/room_reservation.png",array('name'=>'reserve_room'));
echo CHtml::imageButton(Yii::app()->baseUrl."/images/equipment_reservation.png",array('name'=>'reserve_equipment'));
echo CHtml::endForm();


?>
