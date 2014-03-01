<?php
/* @var $this LabHourController */
/* @var $data LabHour */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('lab_hour')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->lab_hour), array('view', 'id'=>$data->lab_hour)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_id')); ?>:</b>
	<?php echo CHtml::encode($data->room_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_date')); ?>:</b>
	<?php echo CHtml::encode($data->start_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end_date')); ?>:</b>
	<?php echo CHtml::encode($data->end_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_time')); ?>:</b>
	<?php echo CHtml::encode($data->start_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end_time')); ?>:</b>
	<?php echo CHtml::encode($data->end_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monday')); ?>:</b>
	<?php echo CHtml::encode($data->monday); ?>
	<br />

	<?php /*
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('saturday')); ?>:</b>
	<?php echo CHtml::encode($data->saturday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sunday')); ?>:</b>
	<?php echo CHtml::encode($data->sunday); ?>
	<br />

	*/ ?>

</div>