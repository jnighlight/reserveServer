<?php
/* @var $this EquipmentController */
/* @var $data Equipment */

$image_style = array('class'=>'equipment_image',);

?>



<div class="view">
	<?php echo CHtml::openTag("div",$image_style); ?>
	<?php echo CHtml::link(CHtml::image($data->image_url), array('view', 'id'=>$data->equipment_id)); ?>
	<?php echo CHtml::closeTag("div"); ?>

        <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->equipment_id)); ?>
        <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serial_number')); ?>:</b>
	<?php echo CHtml::encode($data->serial_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('manufacturer')); ?>:</b>
	<?php echo CHtml::encode($data->manufacturer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('model_number')); ?>:</b>
	<?php echo CHtml::encode($data->model_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('su_number')); ?>:</b>
        <?php echo CHtml::encode($data->su_number); ?>
        <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('availability')); ?>:</b>
        <?php
          if($data->availability)
	  {
	    echo "<font color = 'green'>Available</font>";
	  }
	  else
	  {
	    echo "<font color = 'red'>Unavailable</font>";
	  }
          //echo CHtml::encode($data->availability);

	?>
        <br />

	<?php 
	echo CHtml::beginForm();
  	  echo CHtml::htmlButton("History",
            array(
              'type' => 'submit',
              'name' => 'equipment_id',
              'value' => $data->equipment_id,
            ));
	echo CHtml::endForm();
	?>
</div>
