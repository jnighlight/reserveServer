<?php
/* @var $this EquipmentController */
/* @var $data Equipment */

$listRow = array(
  'class'=>'transaction_list_row',
);

$listImage = array(
  'class' => 'transaction_list_image',
);

$listDescription = array(
  'class' => 'transaction_list_description',
);

$listDescriptionTitle = array(
  'class' => 'transaction_list_description_title',
);

$listDescriptionDropDown = array(
  'class' => 'transaction_list_dropdown',
);

$listDescriptionDropDownSection = array(
  'class' => 'transaction_list_dropdown_section',
);

$transactionInfoBlock = array(
  'class'=> 'transaction_info_block',
);

?>



<div class="view">
<?php
    echo CHtml::openTag("div",$transactionInfoBlock);
    //Equipment image
    if($data->image_url != "")
      echo CHtml::image($data->image_url,"",$listImage);
    else
      echo CHtml::image(Yii::app()->baseUrl."/images/equipment/no_image.png","",$listImage);

      echo CHtml::openTag("p",$listDescriptionTitle);
        echo $data->name;
      echo CHtml::closeTag("p");
      echo CHtml::openTag("p");
        echo "<b>Type</b>: ".$this->getEquipmentType($data->equipment_type_id);
      echo CHtml::closeTag("p");
      echo CHtml::openTag("p");
        echo "<b>Availability</b>: ";
	/*
        if($data->availability) // if available
        {
          echo "<font color ='green'>Available</font>";
          echo CHtml::closeTag("p");
          echo CHtml::htmlButton("Checkout",
          array(
            'type' => 'submit',
            'name' => 'equipment_id',
            'value' => $data->equipment_id,
          ));
        }
        else
        {
*/
          echo "<font color = 'red'>Unavailable</font>";
          echo CHtml::closeTag("p");

          echo CHtml::htmlButton("Checkin",
          array(
            'type' => 'submit',
            'name' => 'equipment_id',
            'value' => $data->equipment_id,
          ));
  //      }
    echo CHtml::closeTag("div"); // close list description

  echo CHtml::openTag("div",$listDescription);
  echo CHtml::openTag("div",$listDescriptionDropDown);

 // echo CHtml::openTag("div",$listDescription);

  // Accessory Section --------------------------------
  $accessories = $data->getAccessories();

  echo CHtml::openTag("div",$listDescriptionDropDownSection);

      echo CHtml::openTag("p",$listDescriptionTitle);
        echo "Accessories";
      echo CHtml::closeTag("p");

  echo CHtml::openTag("ul");

  for($y = 0; $y < sizeof($accessories); $y++)
  {
    echo CHtml::openTag("li");
    echo $accessories[$y]->name;
    echo CHtml::closeTag("li");
  }
  echo CHtml::closeTag("ul");

  echo CHtml::closeTag("div"); // close accessory section

  // End Accessory Section -----------------------------

  // Specification Section
  echo CHtml::openTag("div",$listDescriptionDropDownSection);
    echo CHtml::openTag("p",$listDescriptionTitle);
        echo "Specifications";
      echo CHtml::closeTag("p");

      $specs = $data->getSpecs();

      echo CHtml::openTag("ul");
      for($y = 0; $y < sizeof($specs); $y++)
      {
        echo CHtml::openTag("li");
          echo $specs[$y]->name.": ".$specs[$y]->value;
        echo CHtml::closeTag("li");
      }
      echo CHtml::closeTag("ul");

  echo CHtml::closeTag("div"); // close specifications section
  // End Specification Section ------------------------------
  echo CHtml::closeTag("div");
  echo CHtml::openTag("div",$listDescriptionDropDown);
  // Description Section
  echo CHtml::openTag("div",$listDescriptionDropDownSection);
    echo CHtml::openTag("p",$listDescriptionTitle);
      echo "<b>Description</b> ";
    echo CHtml::closeTag("p");
    echo CHtml::openTag("p");
      echo $data->description;
    echo CHtml::closeTag("p");
  echo CHtml::closeTag("div");
  // End Description Section

  //echo CHtml::closeTag("div"); // close list description


  echo CHtml::closeTag("div"); // close drop-down div
  echo CHtml::closeTag("div"); // close List Description
?>
</div> 
