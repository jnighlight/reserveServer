<?php
/* @var $this RoomController */
/* @var $data Room */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->room_id), array('view', 'id'=>$data->room_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_number')); ?>:</b>
	<?php echo CHtml::encode($data->room_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('building_id')); ?>:</b>
	<?php echo CHtml::encode($data->building_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_url')); ?>:</b>
	<?php echo CHtml::encode($data->image_url); ?>
	<br />


</div>