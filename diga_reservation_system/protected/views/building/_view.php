<?php
/* @var $this BuildingController */
/* @var $data Building */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('building_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->building_id), array('view', 'id'=>$data->building_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />


</div>