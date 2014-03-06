<?php
/* @var $this AccessoryController */
/* @var $data Accessory */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('accessory_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->accessory_id), array('view', 'id'=>$data->accessory_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>