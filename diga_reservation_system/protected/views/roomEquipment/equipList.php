<?php
/* @var $this RoomEquipmentController */
/* @var $dataProvider CActiveDataProvider */
/* @var $equipment EquipmentArray*/
/* @var $buildName String*/
/* @var $roomNum int*/

$this->breadcrumbs=array(
	'Room Equipments',
);

$this->menu=array(
	array('label'=>'Create RoomEquipment', 'url'=>array('create')),
	array('label'=>'Manage RoomEquipment', 'url'=>array('admin')),
);
?>

<h1>Equipment in <?php echo($buildName . ', Room ' . $roomNum); ?></h1>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'equipment-reservation',
	'enableAjaxValidation'=>false,
	//'htmlOptions'=>array('onsubmit'=>'return checkFunction()'),
)); ?>

<?php
	for($i = 0; $i < count($equipment); $i++)
	{
		$thisEquip = $equipment[$i];
		//$equipLink = Yii::app()->baseUrl . "/roomEquipmentReservation/" . $thisEquip['room_equipment_id'];
		$equipName = $thisEquip['name'];
		echo CHtml::submitButton($equipName);
		echo CHtml::hiddenField('equipmentID'. $i,$thisEquip['room_equipment_id']);
		//echo(CHtml::htmlButton($equipName, array('onclick'=>"location.href='" . $equipLink . "'")));
	}
?>
<?php $this->endWidget(); ?>
