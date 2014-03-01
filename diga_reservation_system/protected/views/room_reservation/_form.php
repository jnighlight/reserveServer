<?php
/* @var $this Room_reservationController */
/* @var $model RoomReservation */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'room-reservation-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'room_id'); ?>
		<?php echo $form->textField($model,'room_id'); ?>
		<?php echo $form->error($model,'room_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_date_time'); ?>
		<?php echo $form->textField($model,'start_date_time'); ?>
		<?php echo $form->error($model,'start_date_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_date_time'); ?>
		<?php echo $form->textField($model,'end_date_time'); ?>
		<?php echo $form->error($model,'end_date_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
