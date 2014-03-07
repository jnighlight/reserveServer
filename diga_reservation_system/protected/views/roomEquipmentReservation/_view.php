<?php
/* @var $this RoomEquipmentReservationController */
/* @var $data RoomEquipmentReservation */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_equipment_reservation_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->room_equipment_reservation_id), array('view', 'id'=>$data->room_equipment_reservation_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_equipment_id')); ?>:</b>
	<?php echo CHtml::encode($data->room_equipment_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_id')); ?>:</b>
	<?php echo CHtml::encode($data->room_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_date_time')); ?>:</b>
	<?php echo CHtml::encode($data->start_date_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end_date_time')); ?>:</b>
	<?php echo CHtml::encode($data->end_date_time); ?>
	<br />


</div>