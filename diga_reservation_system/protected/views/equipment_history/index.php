<?php
/* @var $this Equipment_historyController */

$this->breadcrumbs=array(
	'Equipment History',
);

Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl."/css/equipment_history_page.css");

$historyBlock = array(
  'class'=>'history_block',
);

$historyBlockTitle = array(
  'class'=>'history_block_title',
);

$checkoutHistoryBlock = array(
  'class'=>'checkout_history_block',
);

$checkinHistoryBlock = array(
  'class'=>'checkin_history_block',
);

//echo $equipment->name;

echo CHtml::openTag("div", $historyBlock);

// Checkout History Block

echo CHtml::openTag("div", $checkoutHistoryBlock);

echo CHtml::openTag("div", $historyBlockTitle);
  echo CHtml::openTag("p");
    echo "Checkout History";
  echo CHtml::closeTag("p");
echo CHtml::closeTag("div");

foreach($checkout_history as $checkout)
{
  echo CHtml::openTag("p");
    echo "<b>Start Date</b>: ".$checkout->start_date." &nbsp &nbsp &nbsp <b>End Date</b>:".$checkout->end_date;
  echo CHtml::closeTag("p");
}
echo CHtml::closeTag("div");



// Checkin History Block

echo CHtml::openTag("div", $checkinHistoryBlock);

echo CHtml::openTag("div", $historyBlockTitle);
  echo CHtml::openTag("p");
    echo "Checkin History";
  echo CHtml::closeTag("p");
echo CHtml::closeTag("div");

foreach($checkin_history as $checkin)
{
  echo CHtml::openTag("p");
    echo "<b>Checkin Date Time</b>: ".$checkin->checkin_date_time;
  echo CHtml::closeTag("p");
}
echo CHtml::closeTag("div");


echo CHtml::closeTag("div"); // history block closed
?>
