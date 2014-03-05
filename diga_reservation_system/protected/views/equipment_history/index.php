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
  echo CHtml::openTag("div",array(
  	'class'=>'checkout_history_date',));
    echo CHtml::openTag("p");
      echo "<b>Start Date</b>: ".$checkout->start_date." &nbsp &nbsp &nbsp <b>End Date</b>:".$checkout->end_date;
    echo CHtml::closeTag("p");
  echo CHtml::closeTag("div"); // close date div

  echo CHtml::openTag("div",array(
        'class'=>'checkout_history_info',));

  echo CHtml::openTag("p");
    echo "<b>Accessories</b>";
  echo CHtml::closeTag("p");

  $reservation_accessories = $checkout->getAccessoryChecklist();

  foreach($reservation_accessories as $reservation_accessory)
        {
           $accessory = Accessory::model()->findByPk($reservation_accessory->accessory_id);

          echo CHtml::openTag("p");
            if($reservation_accessory->present)
              print("&nbsp &nbsp".$accessory->name.":<font color = 'green'> &#x2713;</font>");
           else
            print("&nbsp &nbsp".$accessory->name.":<font color = 'red'> &#x2717 </font>");
          echo CHtml::closeTag("p");

        }

  echo CHtml::openTag("p");
    echo "<b>Borrower</b>";
  echo CHtml::closeTag("p");


  echo CHtml::openTag("p");
    echo "&nbsp &nbsp".$checkout->borrowers_email;
  echo CHtml::closeTag("p");

  echo CHtml::openTag("p");
    echo "<b>Checkout Assistant</b>";
  echo CHtml::closeTag("p");


  echo CHtml::openTag("p");
    echo "&nbsp &nbsp".$checkout->checkout_assistant_email;
  echo CHtml::closeTag("p");



  echo CHtml::openTag("p");
    echo "<b>Notes</b>";
  echo CHtml::closeTag("p");


  echo CHtml::openTag("p");
    echo $checkout->notes;
  echo CHtml::closeTag("p");

  echo CHtml::closeTag("div"); // close info div
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
  echo CHtml::openTag("div",array(
        'class'=>'checkin_history_date',));
    echo CHtml::openTag("p");
      echo "<b>Checkin Date Time</b>: ".$checkin->checkin_date_time;
    echo CHtml::closeTag("p");
  echo CHtml::closeTag("div"); // close date div

  echo CHtml::openTag("div",array(
        'class'=>'checkin_history_info',));

  echo CHtml::openTag("p");
    echo "<b>Accessories</b>";
  echo CHtml::closeTag("p");

  $checkin_accessories = $checkin->getAccessoryChecklist();

  foreach($checkin_accessories as $checkin_accessory)
        {
           $accessory = Accessory::model()->findByPk($checkin_accessory->accessory_id);

          echo CHtml::openTag("p");
            if($checkin_accessory->present)
              print("&nbsp &nbsp".$accessory->name.":<font color = 'green'> &#x2713;</font>");
           else
            print("&nbsp &nbsp".$accessory->name.":<font color = 'red'> &#x2717 </font>");
          echo CHtml::closeTag("p");

        }

  echo CHtml::openTag("p");
    echo "<b>Borrower</b>";
  echo CHtml::closeTag("p");


  echo CHtml::openTag("p");
    echo "&nbsp &nbsp".$checkin->borrowers_email;
  echo CHtml::closeTag("p");

  echo CHtml::openTag("p");
    echo "<b>Checkin Assistant</b>";
  echo CHtml::closeTag("p");


  echo CHtml::openTag("p");
    echo "&nbsp &nbsp".$checkin->checkin_assistant_email;
  echo CHtml::closeTag("p");



  echo CHtml::openTag("p");
    echo "<b>Notes</b>";
  echo CHtml::closeTag("p");


  echo CHtml::openTag("p");
    echo $checkin->notes;
  echo CHtml::closeTag("p");

  echo CHtml::closeTag("div"); // close info div
}
echo CHtml::closeTag("div");



echo CHtml::closeTag("div"); // history block closed
?>
