<?php
/* @var $this CheckoutController */

$this->breadcrumbs=array(
	'Checkout',
);

if(isset($_GET['equipment_id']))
{
  $equipment_id = $_GET['equipment_id'];
  if(empty($equipment_id) || !is_numeric($equipment_id))
  {
    print("Invalid piece of equipment");
  }
  else
  {
    $checkoutContainer = array(
      'class'=>'checkout_container',
    );

    $userSection = array(
      'class'=>'user_section',
    );

    $equipmentSection = array(
      'class'=>'equipment_section',
    );

    $accessoryChecklistSection = array(
      'class'=>'accessory_checklist_section',
    );

    $checkoutSettings = array(
      'class'=>'checkout_settings_section',
    );

    $userSectionTitle = array(
      'class'=>'user_section_title',
    );

    // The names of the checkout manager and checkoutee
    // email and password forms

    $emailCheckoutManager = array(
      'name'=>'checkout_manager_email',
    );

    $emailCheckoutee = array(
      'name'=>'checkoutee_email',
    );

    $passwordCheckoutManager = array(
      'name'=>'checkoutee_manager_password',
    );

    $passwordCheckoutee = array(
      'name'=>'checkoutee_password',
    );
	
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl."/css/checkout_page.css");

    // Checkout container
    echo CHtml::openTag("div",$checkoutContainer);

    //echo CHtml::label("Email","Email");
    //echo CHtml::label("Password","Password");

      // Start Checkout manager section
      echo CHtml::openTag("div",$userSection);

        echo CHtml::openTag("p",$userSectionTitle);
	  echo "Checkout Manager";
        echo CHtml::closeTag("p");

        echo CHtml::label("Email","checkout_manager_email");
        echo CHtml::activeEmailField(User::model(),"email",$emailCheckoutManager);
	echo CHtml::label("Password","checkout_manager_password");
        echo CHtml::activePasswordField(User::model(),"password",$passwordCheckoutManager);
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

        echo CHtml::label("Email","checkoutee_email");
        echo CHtml::activeEmailField(User::model(),"email",$emailCheckoutee);
        echo CHtml::label("Password","checkoutee_password");
        echo CHtml::activePasswordField(User::model(),"password",$passwordCheckoutee);
      echo CHtml::closeTag("div"); // close checkout manager section
      // End Checkoutee manager section

    echo CHtml::closeTag("div"); // close checkout container.
  }
}
?>
