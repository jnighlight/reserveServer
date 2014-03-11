<?php
/* @var $this RoomEquipmentController */
/* @var $data RoomEquipment */
$room = Room::model()->findByAttributes(array('room_id'=>$data->room_id));
$roomName = $room['room_number'];
$building = Building::model()->findByAttributes(array('building_id'=>$room['building_id']));
$buildingName = $building['name'];
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->room_equipment_id)); ?>
	<br />

	<b><?php echo CHtml::encode('Building'); ?>:</b>
	<?php echo CHtml::encode($buildingName); ?>
	<br />

	<b><?php echo CHtml::encode('Room Number'); ?>:</b>
	<?php echo CHtml::encode($roomName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serial_number')); ?>:</b>
	<?php echo CHtml::encode($data->serial_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>
