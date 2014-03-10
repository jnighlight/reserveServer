<?php
/* @var $this RoomController */
/* @var $data Room */
?>
<?php
$equipmentName = Equipment::model()->findByAttributes(array('equipment_id'=>$data->equipment_id));
$equipmentName = $equipmentName['name'];
$accessoryName = Accessory::model()->findByAttributes(array('accessory_id'=>$data->accessory_id));
$accessoryName = $accessoryName['name'];
?>
<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('equipment_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($equipmentName), array('view', 'equip_id'=>$data->equipment_id, 'accessory_id'=>$data->accessory_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('accessory_id')); ?>:</b>
	<?php echo CHtml::encode($accessoryName); ?>
	<br />
</div>
