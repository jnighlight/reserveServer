<?php
/* @var $this RoomReservationPolicyController */
/* @var $model RoomReservationPolicy */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'room-reservation-policy-form',
	'enableAjaxValidation'=>false,
));
$buildings = Building::model()->findAll();
$buildList = CHtml::listData($buildings, 'building_id', 'name');
$room = Room::model()->findByAttributes(array('room_id'=>$model->room_id));
$roomNumber = $room['room_number'];
$building = Building::model()->findByAttributes(array('building_id'=>$room['building_id']));
$buildingName = $building['name'];
 ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php
		echo $form->labelEx($model,'room_id');
		echo CHtml::textField('Room num', $buildingName . ', ' . $roomNumber, array('disabled'=>'disabled'));
		echo $form -> hiddenField($model,'room_id');
		echo $form->error($model,'room_id');
		?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max_reservation_hours'); ?>
		<?php echo $form->textField($model,'max_reservation_hours'); ?>
		<?php echo $form->error($model,'max_reservation_hours'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
