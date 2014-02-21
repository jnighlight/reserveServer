<?php
/* @var $this CourseController */
/* @var $data Course */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('class_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->class_id), array('view', 'id'=>$data->class_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_id')); ?>:</b>
	<?php echo CHtml::encode($data->room_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('startDate')); ?>:</b>
	<?php echo CHtml::encode($data->startDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('endDate')); ?>:</b>
	<?php echo CHtml::encode($data->endDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_time')); ?>:</b>
	<?php echo CHtml::encode($data->start_time); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('end_time')); ?>:</b>
	<?php echo CHtml::encode($data->end_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monday')); ?>:</b>
	<?php echo CHtml::encode($data->monday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tuesday')); ?>:</b>
	<?php echo CHtml::encode($data->tuesday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wednesday')); ?>:</b>
	<?php echo CHtml::encode($data->wednesday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('thursday')); ?>:</b>
	<?php echo CHtml::encode($data->thursday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('friday')); ?>:</b>
	<?php echo CHtml::encode($data->friday); ?>
	<br />

	*/ ?>

</div>