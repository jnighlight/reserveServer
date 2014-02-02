<?php
/* @var $this Room_reservationController */
/* @var $data RoomReservation */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_reservation_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->room_reservation_id), array('view', 'id'=>$data->room_reservation_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('building_id')); ?>:</b>
	<?php echo CHtml::encode($data->building_id); ?>
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