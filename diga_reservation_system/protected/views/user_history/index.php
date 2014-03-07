<?php
/* @var $this User_historyController */

$this->breadcrumbs=array(
	'Users'=>array("/user/"),
	'User History',
);

Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl."/css/history_page.css");

Yii::app()->clientScript->registerScriptFile("//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js");

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/extensions/js/history/history.js");

$componentBlock = array(
  'class'=>'component_block',
);

$componentImage = array(
  'class'=>'component_image',
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

//var_dump($checkout_history);

echo CHtml::openTag("div", $historyBlock);

// Checkout History Block

echo CHtml::openTag("div", $checkoutHistoryBlock);

echo CHtml::openTag("div", $historyBlockTitle);
  echo CHtml::openTag("p");
    echo "Checkout History";
  echo CHtml::closeTag("p");
echo CHtml::closeTag("div");

//print(sizeof($checkout_history));
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
echo CHtml::openTag("div",$componentBlock);
  
  echo CHtml::openTag("div",$componentImage);
    echo CHtml::image(Yii::app()->baseUrl."/images/user.png");
  echo CHtml::closeTag("div");
  
  echo CHtml::openTag("p");
    echo "<b>Name</b>: ".$user->first_name." ".$user->last_name;
  echo CHtml::closeTag("p");

  echo CHtml::openTag("p");
    echo "<b>Email</b>: ".$user->email;
  echo CHtml::closeTag("p");

  echo CHtml::openTag("p");
    echo "<b>SU Number</b>: ".$user->id_number;
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
