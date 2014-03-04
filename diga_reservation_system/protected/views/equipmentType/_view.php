<?php
/* @var $this EquipmentTypeController */
/* @var $data EquipmentType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('equipment_type_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->equipment_type_id), array('view', 'id'=>$data->equipment_type_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />


</div>