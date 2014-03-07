<?php
/* @var $this RoomEquipmentReservationController */
/* @var $model RoomEquipmentReservation */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'room_equipment_reservation_id'); ?>
		<?php echo $form->textField($model,'room_equipment_reservation_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room_equipment_id'); ?>
		<?php echo $form->textField($model,'room_equipment_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room_id'); ?>
		<?php echo $form->textField($model,'room_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'start_date_time'); ?>
		<?php echo $form->textField($model,'start_date_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'end_date_time'); ?>
		<?php echo $form->textField($model,'end_date_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->