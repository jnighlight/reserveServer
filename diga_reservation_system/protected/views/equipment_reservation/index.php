<?php
/* @var $this EquipmentController */

$this->breadcrumbs=array(
	'Equipment',
);
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl."/css/reservation_page.css");


/* Search form and filters */


echo CHtml::openTag("div");
  echo CHtml::beginForm();
    echo "Search ".CHtml::activeTextField(Equipment::model(), "name");
    echo CHtml::submitButton("Search");
    $list = CHtml::listData($this->getAllEquipmentTypes(),
			    "equipment_type_id","name");

    echo CHtml::dropDownList("Types",EquipmentType::model(),
	  $list, array("empty"=> "Select Type"));
  echo CHtml::endForm();
echo CHtml::closeTag("div");

echo CHTML::closeTag("br");



/*Equipment listing */

$equipment = $this->getEquipment();

$listContainer = array(
  'id'=>'reservation_list',
);

$listRow = array(
  'class'=>'reservation_list_row',
);

$listImage = array(
  'class' => 'reservation_list_image',
);

$listDescription = array(
  'class' => 'reservation_list_description',
);

$listDescriptionTitle = array(
  'class' => 'reservation_list_description_title',
);

$listDescriptionDropDown = array(
  'class' => 'reservation_list_dropdown',
);

$listDescriptionDropDownSection = array(
  'class' => 'reservation_list_dropdown_section',
);


echo CHtml::beginForm();
echo CHtml::openTag("div", $listContainer);

for($x = 0; $x < sizeof($equipment); $x++)
{

  //New row
  echo CHtml::openTag("div",$listRow);

    //Equipment image
    //echo CHtml::openTag("div",$listImage);
      echo CHtml::image($equipment[$x]->image_url,"",$listImage);
    //echo CHtml::closeTag("div"); // close image div
    echo CHtml::openTag("div",$listDescription);
      echo CHtml::openTag("p",$listDescriptionTitle);
        echo $equipment[$x]->name;
      echo CHtml::closeTag("p");
      echo CHtml::openTag("p");
        echo "<b>Type</b>: ".$this->getEquipmentType($equipment[$x]->equipment_type_id);
      echo CHtml::closeTag("p");
      echo CHtml::openTag("p");
        echo "<b>Availability</b>: "; //TODO: See if equipment item is available.
      echo CHtml::closeTag("p");

      echo CHtml::htmlButton("Checkout",
	array(
	  'type' => 'submit',
  	  'name' => 'equipment_id',
	  'value' => $equipment[$x]->equipment_id,
	));

    echo CHtml::closeTag("div"); // close list description

  echo CHtml::closeTag("div"); // close listRow

  echo CHtml::openTag("div",$listDescriptionDropDown);
  echo CHtml::openTag("div",$listDescription);

  // Accessory Section --------------------------------
  $accessories = $this->getAccessories($equipment[$x]->equipment_id);

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

      $specs = $this->getSpecs($equipment[$x]->equipment_id);

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

  // Description Section
  echo CHtml::openTag("div",$listDescriptionDropDownSection);
    echo CHtml::openTag("p",$listDescriptionTitle);
      echo "<b>Description</b>: ";
    echo CHtml::closeTag("p");
    echo CHtml::openTag("p");
      echo $equipment[$x]->description;
    echo CHtml::closeTag("p");
  echo CHtml::closeTag("div");
  // End Description Section

  echo CHtml::closeTag("div"); // close list description

  echo CHtml::closeTag("div"); // close drop-down div

}

echo CHtml::closeTag("div");
echo CHtml::endForm();

?>
