<?php
/* @var $this Equipment_historyController */

$this->breadcrumbs=array(
	'Equipment History',
);

Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl."/css/equipment_history_page.css");

Yii::app()->clientScript->registerScriptFile("//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js");

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/extensions/js/history/equipment_history.js");

$equipmentBlock = array(
  'class'=>'equipment_block',
);

$equipmentImage = array(
  'class'=>'equipment_image',
);

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
	'id'=>'checkout_history_date_'.$checkout->equipment_reservation_id,
  	'class'=>'checkout_history_date',));
    echo CHtml::openTag("p");
      echo "<b>Start Date</b>: ".$checkout->start_date." &nbsp &nbsp &nbsp <b>End Date</b>: ".$checkout->end_date;
    echo CHtml::closeTag("p");
  echo CHtml::closeTag("div"); // close date div

  echo CHtml::openTag("div",array(
	'id'=>'checkout_history_info_'.$checkout->equipment_reservation_id,
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
    $borrower= User::model()->findByAttributes(array("email"=>$checkout->borrowers_email));
    $borrowers_name = $borrower->first_name." ".$borrower->last_name;
    $borrowers_email = $borrower->email;
    echo "&nbsp &nbsp".$borrowers_name." (".$borrowers_email.")";
  echo CHtml::closeTag("p");

  echo CHtml::openTag("p");
    echo "<b>Checkout Assistant</b>";
  echo CHtml::closeTag("p");


  echo CHtml::openTag("p");
    $checkout_assistant= User::model()->findByAttributes(array("email"=>$checkout->checkout_assistant_email));
    $checkout_assistants_name = $checkout_assistant->first_name." ".$checkout_assistant->last_name;
    $checkout_assistants_email = $checkout_assistant->email;
    echo "&nbsp &nbsp".$checkout_assistants_name." (".$checkout_assistants_email.")";
  echo CHtml::closeTag("p");



  echo CHtml::openTag("p");
    echo "<b>Notes</b>";
  echo CHtml::closeTag("p");


  echo CHtml::openTag("p");
    echo "&nbsp &nbsp".$checkout->notes;
  echo CHtml::closeTag("p");

  echo CHtml::closeTag("div"); // close info div
}
echo CHtml::closeTag("div");

// Imageblock
echo CHtml::openTag("div",$equipmentBlock);
  echo CHtml::openTag("div",$equipmentImage);
    echo CHtml::image($equipment->image_url);
  echo CHtml::closeTag("div");

  echo CHtml::openTag("p");
    echo "<b>Name</b>: ".$equipment->name;
  echo CHtml::closeTag("p");

  echo CHtml::openTag("p");
    echo "<b>SU Number</b>: ".$equipment->su_number;
  echo CHtml::closeTag("p");
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
	'id'=>'checkin_history_date_'.$checkin->equipment_checkin_id,
        'class'=>'checkin_history_date',));
    echo CHtml::openTag("p");
      echo "<b>Checkin Date Time</b>: ".$checkin->checkin_date_time;
    echo CHtml::closeTag("p");
  echo CHtml::closeTag("div"); // close date div

  echo CHtml::openTag("div",array(
	'id'=>'checkin_history_info_'.$checkin->equipment_checkin_id,
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
    $borrower = User::model()->findByAttributes(array("email"=>$checkin->borrowers_email));
    $borrowers_name = $borrower->first_name." ".$borrower->last_name;
    $borrowers_email = $borrower->email;
    echo "&nbsp &nbsp".$borrowers_name." (".$borrowers_email.")";
  echo CHtml::closeTag("p");

  echo CHtml::openTag("p");
    echo "<b>Checkin Assistant</b>";
  echo CHtml::closeTag("p");


  echo CHtml::openTag("p");
    $checkin_assistant= User::model()->findByAttributes(array("email"=>$checkin->checkin_assistant_email));
    $checkin_assistants_name = $checkin_assistant->first_name." ".$checkin_assistant->last_name;
    $checkin_assistants_email = $checkin_assistant->email;
    echo "&nbsp &nbsp".$checkin_assistants_name." (".$checkin_assistants_email.")";
  echo CHtml::closeTag("p");



  echo CHtml::openTag("p");
    echo "<b>Notes</b>";
  echo CHtml::closeTag("p");


  echo CHtml::openTag("p");
    echo "&nbsp &nbsp".$checkin->notes;
  echo CHtml::closeTag("p");

  echo CHtml::closeTag("div"); // close info div
}
echo CHtml::closeTag("div");


echo CHtml::closeTag("div"); // history block closed
?>
