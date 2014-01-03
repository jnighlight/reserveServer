<?php
/* @var $this EquipmentController */

$this->breadcrumbs=array(
	'Equipment',
);

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
        echo "<b>Description</b>: ".$equipment[$x]->description;
      echo CHtml::closeTag("p");
      echo CHtml::openTag("p");
        echo "<b>Availability</b>: "; //TODO: See if equipment item is available.
      echo CHtml::closeTag("p");
    echo CHtml::closeTag("div");
  echo CHtml::closeTag("div"); // close listRow
}

echo CHtml::closeTag("div");
?>
