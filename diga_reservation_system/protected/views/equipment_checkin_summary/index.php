<?php
/* @var $this Equipment_checkin_summaryController */

$this->breadcrumbs=array(
	'Equipment Checkin Summary',
);

Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl."/css/equipment_transaction_summary.css");

// CSS STYLINGS
$summary_container = array('class'=>'summary_container',);
$section_title = array('class'=>'section_title',);
$section_title_block = array('class'=>'section_title_block',);
$section_content = array('class'=>'section_content',);
$section_content_block = array('class'=>'section_content_block',);

echo CHtml::openTag("p");
  print("Return Successful!");
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
        foreach($checkin_accessories as $checkin_accessory)
	{
           $accessory = Accessory::model()->findByPk($checkin_accessory->accessory_id);

	  echo CHtml::openTag("p");
	    if($checkin_accessory->present)
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
        print("Equipment Checkin Assistant");
      echo CHtml::closeTag("p");
    echo CHtml::closeTag("div");
  echo CHtml::closeTag("div");

  echo CHtml::openTag("div",$section_content_block);
    echo CHtml::openTag("div",$section_content); 
      echo CHtml::openTag("p");
	print($equipment_checkin->checkin_assistant_email);
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
        print($equipment_checkin->borrowers_email);
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
        print($equipment_checkin->checkin_date_time);
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
        print($equipment_checkin->notes);
      echo CHtml::closeTag("p");
    echo CHtml::closeTag("div");
  echo CHtml::closeTag("div");

echo CHtml::closeTag("div");
?>
