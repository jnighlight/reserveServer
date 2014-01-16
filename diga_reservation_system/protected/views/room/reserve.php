<?php
/* @var $this RoomController */
/* @var $model Room */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'room-reserve-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'room_number'); ?>
		<?php echo $form->textField($model,'room_number'); ?>
		<?php echo $form->error($model,'room_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'building_id'); ?>
		<?php echo $form->textField($model,'building_id'); ?>
		<?php echo $form->error($model,'building_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description'); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image_url'); ?>
		<?php echo $form->textField($model,'image_url'); ?>
		<?php echo $form->error($model,'image_url'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->