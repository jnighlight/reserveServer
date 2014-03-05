<?php
/* @var $this Equipment_checkout_summaryController */

$this->breadcrumbs=array(
	'Equipment Checkout Summary',
);

Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl."/css/equipment_transaction_summary.css");

// CSS STYLINGS
$summary_container = array('class'=>'summary_container',);
$section_title = array('class'=>'section_title',);
$section_title_block = array('class'=>'section_title_block',);
$section_content = array('class'=>'section_content',);
$section_content_block = array('class'=>'section_content_block',);

echo CHtml::openTag("p");
  print("Reservation Successful!");
echo CHtml::closeTag("p");


echo CHtml::openTag("div", $summary_container);

  echo CHtml::openTag("div",$section_title_block);
    echo CHtml::openTag("div",$section_title);
      echo CHtml::openTag("p");
        print($equipment->name);
      echo CHtml::closeTag("p");
    echo CHtml::closeTag("div");
  echo CHtml::closeTag("div");

  echo CHtml::openTag("div",$section_content_block);
    echo CHtml::openTag("div",$section_content);
      echo CHtml::openTag("p");
        echo CHtml::image($equipment->image_url);
      echo CHtml::closeTag("p");
    echo CHtml::closeTag("div");
  echo CHtml::closeTag("div");

  echo CHtml::openTag("div",$section_title_block);
    echo CHtml::openTag("div",$section_title);
      echo CHtml::openTag("p");
        print("Accessories");
      echo CHtml::closeTag("p");
    echo CHtml::closeTag("div");
  echo CHtml::closeTag("div");

  echo CHtml::openTag("div",$section_content_block);
    echo CHtml::openTag("div",$section_content);
      echo CHtml::openTag("p");
        foreach($reservation_accessories as $reservation_accessory)
	{
           $accessory = Accessory::model()->findByPk($reservation_accessory->accessory_id);

	  echo CHtml::openTag("p");
	    if($reservation_accessory->present)
	      print($accessory->name.":<font color = 'green'> &#x2713;</font>");
	   else
	    print($accessory->name.":<font color = 'red'> &#x2717 </font>");
	  echo CHtml::closeTag("p");
	   
	}
      echo CHtml::closeTag("p");
    echo CHtml::closeTag("div");
  echo CHtml::closeTag("div");


  echo CHtml::openTag("div",$section_title_block);
    echo CHtml::openTag("div",$section_title); 
      echo CHtml::openTag("p");
        print("Equipment Checkout Assistant");
      echo CHtml::closeTag("p");
    echo CHtml::closeTag("div");
  echo CHtml::closeTag("div");

  echo CHtml::openTag("div",$section_content_block);
    echo CHtml::openTag("div",$section_content); 
      echo CHtml::openTag("p");
	print($equipment_reservation->checkout_assistant_email);
      echo CHtml::closeTag("p");
    echo CHtml::closeTag("div");
  echo CHtml::closeTag("div");


  echo CHtml::openTag("div",$section_title_block);
    echo CHtml::openTag("div",$section_title);
      echo CHtml::openTag("p");
        print("Borrower");
      echo CHtml::closeTag("p");
    echo CHtml::closeTag("div");
  echo CHtml::closeTag("div");

  echo CHtml::openTag("div",$section_content_block);
    echo CHtml::openTag("div",$section_content);
      echo CHtml::openTag("p");
        print($equipment_reservation->borrowers_email);
      echo CHtml::closeTag("p");
    echo CHtml::closeTag("div");
  echo CHtml::closeTag("div");


  echo CHtml::openTag("div",$section_title_block);
    echo CHtml::openTag("div",$section_title);
      echo CHtml::openTag("p");
        print("Start");
      echo CHtml::closeTag("p");
    echo CHtml::closeTag("div");
  echo CHtml::closeTag("div");

  echo CHtml::openTag("div",$section_content_block);
    echo CHtml::openTag("div",$section_content);
      echo CHtml::openTag("p");
        print($equipment_reservation->start_date);
      echo CHtml::closeTag("p");
    echo CHtml::closeTag("div");
  echo CHtml::closeTag("div");


  echo CHtml::openTag("div",$section_title_block);
    echo CHtml::openTag("div",$section_title);
      echo CHtml::openTag("p");
        print("End");
      echo CHtml::closeTag("p");
    echo CHtml::closeTag("div");
  echo CHtml::closeTag("div");

  echo CHtml::openTag("div",$section_content_block);
    echo CHtml::openTag("div",$section_content);
      echo CHtml::openTag("p");
        print($equipment_reservation->end_date);
      echo CHtml::closeTag("p");
    echo CHtml::closeTag("div");
  echo CHtml::closeTag("div");

    echo CHtml::openTag("div",$section_title_block);
    echo CHtml::openTag("div",$section_title);
      echo CHtml::openTag("p");
        print("Notes");
      echo CHtml::closeTag("p");
    echo CHtml::closeTag("div");
  echo CHtml::closeTag("div");

  echo CHtml::openTag("div",$section_content_block);
    echo CHtml::openTag("div",$section_content);
      echo CHtml::openTag("p");
        print($equipment_reservation->notes);
      echo CHtml::closeTag("p");
    echo CHtml::closeTag("div");
  echo CHtml::closeTag("div");



echo CHtml::closeTag("div");
?>
