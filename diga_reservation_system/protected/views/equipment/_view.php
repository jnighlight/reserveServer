<?php
/* @var $this EquipmentController */
/* @var $data Equipment */

$image_style = array('class'=>'equipment_image',);

?>



<div class="view">
<!--	<b><?php echo CHtml::encode($data->getAttributeLabel('image_url')); ?>:</b> 
        <?php echo CHtml::image($data->image_url); ?> -->
	<?php echo CHtml::openTag("div",$image_style); ?>
	<?php echo CHtml::link(CHtml::image($data->image_url), array('view', 'id'=>$data->equipment_id)); ?>
	<?php echo CHtml::closeTag("div"); ?>

        <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->equipment_id)); ?>
        <br />

<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('equipment_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->equipment_id), array('view', 'id'=>$data->equipment_id)); ?>
	<br />
-->
	<b><?php echo CHtml::encode($data->getAttributeLabel('serial_number')); ?>:</b>
	<?php echo CHtml::encode($data->serial_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('manufacturer')); ?>:</b>
	<?php echo CHtml::encode($data->manufacturer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('model_number')); ?>:</b>
	<?php echo CHtml::encode($data->model_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />
<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />
-->
<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('image_url')); ?>:</b>
	<?php echo CHtml::encode($data->image_url); ?>
	<br />
-->
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('equipment_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->equipment_type_id); ?>
	<br />

	*/ ?>

</div>
