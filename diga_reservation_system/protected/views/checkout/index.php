<?php
/* @var $this CheckoutController */

$this->breadcrumbs=array(
        'Equipment','Checkout'
);


/*
$this->breadcrumbs=array(
	'Checkout',
);
*/

if(isset($_GET['equipment_id']))
{
  $equipment_id = $_GET['equipment_id'];
  if(empty($equipment_id) || !is_numeric($equipment_id))
  {
    print("Invalid piece of equipment");
  }
  else
  {
    $checkoutContainer = array('class'=>'checkout_container',);

    $userSection = array('class'=>'user_section',);

    $equipmentSection = array('class'=>'equipment_section',);

    $accessoryChecklistSection = array('class'=>'accessory_checklist_section',);

    $checkoutSettings = array('class'=>'checkout_settings_section',);

    $notes_section = array('class'=> 'notes_section',);

    $userSectionTitle = array('class'=>'user_section_title',);

    $userSectionForms = array('class'=>'user_section_forms',);

    //$accessoryCheckbox = array('name'=>'accessory_check_list[]',);

    // TODO: Add other form names after testing the current ones.

    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl."/css/checkout_page.css");

    //echo CHtml::beginForm("","post");

$form = $this->beginWidget('CActiveForm', array(
        'id'=>'checkout-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
                'validateOnSubmit'=>true,
        ),
));


    echo $form->errorSummary(array($checkoutAssistant,$borrower));

    // Checkout container
    echo CHtml::openTag("div",$checkoutContainer);

      // Start Checkout manager section
      echo CHtml::openTag("div",$userSection);

        echo CHtml::openTag("p",$userSectionTitle);
	  echo "Checkout Manager";
        echo CHtml::closeTag("p");

	echo CHtml::openTag("div",$userSectionForms);
	  // Checkout Manager email
	  echo $form->labelEx($checkoutAssistant,"email");
	  echo $form->textField($checkoutAssistant,"email");
	  echo $form->error($checkoutAssistant,'email');
	  // Checkout Manager password
	  echo $form->labelEx($checkoutAssistant,"password");
          echo $form->passwordField($checkoutAssistant,"password");
          echo $form->error($checkoutAssistant,'password');
	  echo CHtml::closeTag("div"); // close user input section
      echo CHtml::closeTag("div"); // close checkout manager section
      // End Checkout manager section

      // Start Equipment section
      echo CHtml::openTag("div",$equipmentSection);
        $equipment = $this->getEquipment($equipment_id);

	echo CHtml::image($equipment->image_url);

        // Name of Product
        echo CHtml::openTag("p");
          echo $equipment->name;
        echo CHtml::closeTag("p");

        // Manufacturer of Product
        echo CHtml::openTag("p");
          echo "<b>Manufacturer:</b>  ".$equipment->manufacturer;
        echo CHtml::closeTag("p");

        // Serial Number of Product
        echo CHtml::openTag("p");
          echo "<b>Serial Number:</b>  ".$equipment->serial_number;
        echo CHtml::closeTag("p");

	// Model Number of Product
        echo CHtml::openTag("p");
          echo "<b>Model Number:</b> ".$equipment->model_number;
        echo CHtml::closeTag("p");

	/* Space between equipment information and
	   specs checklist.
	*/
	echo CHtml::closeTag("br");

	// Accessories checklist
        $accessories = $this->getAccessories($equipment_id);

        echo CHtml::openTag("p");
          echo "Accessory Checklist";
        echo CHtml::closeTag("p");

	echo CHtml::openTag("div",$accessoryChecklistSection);
        for($x = 0; $x < sizeof($accessories); $x++)
	{
	  echo CHtml::label($accessories[$x]->name,$accessories[$x]->name);
	  echo CHtml::checkBox($accessories[$x]->name);
	  echo CHtml::closeTag("br");
	}

	echo CHtml::closeTag("br"); // Space after accessory checklist

	echo CHtml::closeTag("div"); // close accessory checklist

	echo CHtml::openTag("p");
	  echo "Any notes to add about this reservation:";
	echo CHtml::closeTag("p");
	
	echo CHtml::openTag("div",$notes_section); // description
	  
	  // Checkout Notes
          echo $form->labelEx($checkoutAssistant,"notes");
          echo $form->textArea($checkoutAssistant,"notes");
          echo $form->error($checkoutAssistant,'notes');
	  
	  
	  //echo CHtml::textArea("description");
	  
	echo CHtml::closeTag("div"); // close description

	echo CHtml::openTag("p");
	echo "* This is due back: 00/00/2014";
	echo CHtml::closeTag("p");
          echo CHtml::closeTag("br");

	echo CHtml::openTag("div",$checkoutSettings);
          echo CHtml::submitButton("Checkout"); // Checkout button
	echo CHtml::closeTag("div");

      echo CHtml::closeTag("div"); // close equipment section

      // Start Checkoutee section
      echo CHtml::openTag("div",$userSection);

	echo CHtml::openTag("p",$userSectionTitle);
          echo "Borrower";
        echo CHtml::closeTag("p");
	echo CHtml::openTag("div",$userSectionForms);
	
	  // Checkout Borrower email
          echo $form->labelEx($borrower,"email");
          echo $form->textField($borrower,"email");
          echo $form->error($borrower,'email');
          // Checkout Borrower password
          echo $form->labelEx($borrower,"password");
          echo $form->passwordField($borrower,"password");
          echo $form->error($borrower,'password');
	echo CHtml::closeTag("div"); // close user input section
      echo CHtml::closeTag("div"); // close checkout manager section
      // End Checkoutee manager section

    echo CHtml::closeTag("div"); // close checkout container.
    //echo CHtml::endForm();

    $this->endWidget();
  }
}
?>
