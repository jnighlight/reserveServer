<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<?php

$mainButtons = array("class"=>"main_options");

echo CHTml::openTag("div", $mainButtons);

echo CHtml::beginForm();
// Equipment Reservation
echo CHtml::imageButton(Yii::app()->baseUrl."/images/equipment_reservation.png",array('name'=>'reserve_equipment'));
// Room Reservation
/* if the user is an admin */
echo CHtml::imageButton(Yii::app()->baseUrl."/images/room_reservation.png",array('name'=>'reserve_room'));
if($this->isUserWorkStudy())
{
  // Equipment Admin Controls
  echo CHtml::imageButton(Yii::app()->baseUrl."/images/equipment_admin.png",array('name'=>'equipment_admin_controls'));
  // Daily Reports
  echo CHtml::imageButton(Yii::app()->baseUrl."/images/daily_report.png",array('name'=>'daily_reports'));
}
if($this->isUserAdmin())
{
  //Room Admin Controls
  echo CHtml::imageButton(Yii::app()->baseUrl."/images/room_admin.png",array('name'=>'room_admin_controls'));
  // User Admin Mode
  echo CHtml::imageButton(Yii::app()->baseUrl."/images/users_admin_mode.png",array('name'=>'user_admin_controls'));
}
echo CHtml::endForm();
echo CHtml::closeTag("div");

?>
