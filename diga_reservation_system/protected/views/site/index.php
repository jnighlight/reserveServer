<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<?php

Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl."/css/main_page.css");

//print(Yii::app()->user->name);
$user = User::model()->findByAttributes(array("email"=>Yii::app()->user->name));
//print($user->first_name);

$mainButtons = array("class"=>"main_options");
/*
if($user->user_level_id == 1) // workstudy or admin
{
   $this->menu=array(
      array('label'=>'Edit Main Admin Email', 'url'=>array('adminEmail/addressEdit')),
      array('label'=>'Edit Warning Message', 'url'=>array('warningEmail/emailEdit')),
   );
}
*/
echo CHTml::openTag("div", $mainButtons);

echo CHtml::beginForm();
// Equipment Reservation
echo CHtml::imageButton(Yii::app()->baseUrl."/images/equipment_reservation.png",array('name'=>'reserve_equipment'));
// Equipment Admin Controls
if($user->user_level_id <= 2) // workstudy or admin
{
  echo CHtml::imageButton(Yii::app()->baseUrl."/images/equipment_admin.png",array('name'=>'equipment_admin_controls'));
}
// Room Reservation
echo CHtml::imageButton(Yii::app()->baseUrl."/images/room_reservation.png",array('name'=>'reserve_room'));
  //Room Admin Controls
if($user->user_level_id <= 2) // workstudy or admin
{
  echo CHtml::imageButton(Yii::app()->baseUrl."/images/room_admin.png",array('name'=>'room_admin_controls'));
}
  // User Admin Mode
if($user->user_level_id == 1) // admin
{
  echo CHtml::imageButton(Yii::app()->baseUrl."/images/users_admin_mode.png",array('name'=>'user_admin_controls'));
}
if($user->user_level_id == 1) // admin
{
  echo CHtml::imageButton(Yii::app()->baseUrl."/images/users_admin_mode.png",array('name'=>'admin_email_controls'));
  echo CHtml::imageButton(Yii::app()->baseUrl."/images/users_admin_mode.png",array('name'=>'warning_email_controls'));
}
echo CHtml::endForm();
echo CHtml::closeTag("div");

?>
