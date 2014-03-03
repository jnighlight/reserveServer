<?php
/* @var $this RoomController */
/* @var $model Room */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'room-form',
	'enableAjaxValidation'=>false,
)); 
$buildings = Building::model()->findAll();
$buildList = CHtml::listData($buildings, 'building_id', 'name');
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'room_number'); ?>
		<?php echo $form->textField($model,'room_number'); ?>
		<?php echo $form->error($model,'room_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'building_id'); ?>
		<?php echo $form->dropDownList($model,'building_id',$buildList); ?>
		<?php echo $form->error($model,'building_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image_url'); ?>
		<?php echo $form->textField($model,'image_url',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'image_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'monday_open'); ?>
		<?php echo CHtml::tag('p', array('class'=>'hint'), '24 hour time: If you want 8:00 PM, insert 20:00'); ?>
		<?php echo $form->textField($model,'monday_open'); ?>
		<?php echo $form->error($model,'monday_open'); ?>

		<?php echo $form->labelEx($model,'monday_close'); ?>
		<?php echo $form->textField($model,'monday_close'); ?>
		<?php echo $form->error($model,'monday_close'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tuesday_open'); ?>
		<?php echo $form->textField($model,'tuesday_open'); ?>
		<?php echo $form->error($model,'tuesday_open'); ?>

		<?php echo $form->labelEx($model,'tuesday_close'); ?>
		<?php echo $form->textField($model,'tuesday_close'); ?>
		<?php echo $form->error($model,'tuesday_close'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wednesday_open'); ?>
		<?php echo $form->textField($model,'wednesday_open'); ?>
		<?php echo $form->error($model,'wednesday_open'); ?>

		<?php echo $form->labelEx($model,'wednesday_close'); ?>
		<?php echo $form->textField($model,'wednesday_close'); ?>
		<?php echo $form->error($model,'wednesday_close'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thursday_open'); ?>
		<?php echo $form->textField($model,'thursday_open'); ?>
		<?php echo $form->error($model,'thursday_open'); ?>

		<?php echo $form->labelEx($model,'thursday_close'); ?>
		<?php echo $form->textField($model,'thursday_close'); ?>
		<?php echo $form->error($model,'thursday_close'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'friday_open'); ?>
		<?php echo $form->textField($model,'friday_open'); ?>
		<?php echo $form->error($model,'friday_open'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'friday_close'); ?>
		<?php echo $form->textField($model,'friday_close'); ?>
		<?php echo $form->error($model,'friday_close'); ?>

		<?php echo $form->labelEx($model,'saturday_open'); ?>
		<?php echo $form->textField($model,'saturday_open'); ?>
		<?php echo $form->error($model,'saturday_open'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'saturday_close'); ?>
		<?php echo $form->textField($model,'saturday_close'); ?>
		<?php echo $form->error($model,'saturday_close'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sunday_open'); ?>
		<?php echo $form->textField($model,'sunday_open'); ?>
		<?php echo $form->error($model,'sunday_open'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sunday_close'); ?>
		<?php echo $form->textField($model,'sunday_close'); ?>
		<?php echo $form->error($model,'sunday_close'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
