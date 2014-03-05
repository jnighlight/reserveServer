<?php
/* @var $this RoomReservationPolicyController */
/* @var $data RoomReservationPolicy */
$room = Room::model() -> findByAttributes(array('room_id'=>$data->room_id));
$building = Building::model() -> findByAttributes(array('building_id'=>$room['building_id']));

$roomNum = $room['room_number'];
$buildName = $building['name'];
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_reservation_policy_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($buildName . ', Room ' . $roomNum), array('view', 'id'=>$data->room_reservation_policy_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_reservation_hours')); ?>:</b>
	<?php echo CHtml::encode($data->max_reservation_hours); ?>
	<br />


</div>
