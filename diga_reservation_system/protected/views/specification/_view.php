<?php
/* @var $this SpecificationController */
/* @var $data Specification */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('specification_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->specification_id), array('view', 'id'=>$data->specification_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value')); ?>:</b>
	<?php echo CHtml::encode($data->value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('equipment_id')); ?>:</b>
	<?php echo CHtml::encode($data->equipment_id); ?>
	<br />


</div>