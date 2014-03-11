<?php
/* @var $this RoomController */
/* @var $data Room */
$building = Building::model()->findByAttributes(array('building_id'=>$data->building_id));
$buildName = $building['name'];
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_number')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->room_number), array('view', 'id'=>$data->room_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('building_id')); ?>:</b>
	<?php echo CHtml::encode($buildName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monday_open')); ?>:</b>
	<?php echo CHtml::encode($data->monday_open); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monday_close')); ?>:</b>
	<?php echo CHtml::encode($data->monday_close); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('tuesday_open')); ?>:</b>
	<?php echo CHtml::encode($data->tuesday_open); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tuesday_close')); ?>:</b>
	<?php echo CHtml::encode($data->tuesday_close); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wednesday_open')); ?>:</b>
	<?php echo CHtml::encode($data->wednesday_open); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wednesday_close')); ?>:</b>
	<?php echo CHtml::encode($data->wednesday_close); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('thursday_open')); ?>:</b>
	<?php echo CHtml::encode($data->thursday_open); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('thursday_close')); ?>:</b>
	<?php echo CHtml::encode($data->thursday_close); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('friday_open')); ?>:</b>
	<?php echo CHtml::encode($data->friday_open); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('friday_close')); ?>:</b>
	<?php echo CHtml::encode($data->friday_close); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('saturday_open')); ?>:</b>
	<?php echo CHtml::encode($data->saturday_open); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('saturday_close')); ?>:</b>
	<?php echo CHtml::encode($data->saturday_close); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sunday_open')); ?>:</b>
	<?php echo CHtml::encode($data->sunday_open); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sunday_close')); ?>:</b>
	<?php echo CHtml::encode($data->sunday_close); ?>
	<br />

	*/ ?>

</div>
