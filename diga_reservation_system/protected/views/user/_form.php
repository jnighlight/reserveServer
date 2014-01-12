<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
                <?php echo $form->labelEx($model,'first_name'); ?>
                <?php echo $form->textField($model,'first_name',array('size'=>20,'maxlength'=>20)); ?>
                <?php echo $form->error($model,'first_name'); ?>
        </div>

        <div class="row">
                <?php echo $form->labelEx($model,'last_name'); ?>
                <?php echo $form->textField($model,'last_name',array('size'=>20,'maxlength'=>20)); ?>
                <?php echo $form->error($model,'last_name'); ?>
        </div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
                <?php echo $form->labelEx($model,'password_repeat'); ?>
                <?php echo $form->passwordField($model,'password_repeat',array('size'=>60,'maxlength'=>100)); ?>
                <?php echo $form->error($model,'password_repeat'); ?>
        </div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_number'); ?>
		<?php echo $form->textField($model,'phone_number',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'phone_number'); ?>
	</div>

<!--    commented out by Mark Burton. These should not be
        acceccible by an level user


	<div class="row">
		<?php echo $form->labelEx($model,'user_level_id'); ?>
		<?php echo $form->textField($model,'user_level_id'); ?>
		<?php echo $form->error($model,'user_level_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'salt'); ?>
		<?php echo $form->textField($model,'salt',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'salt'); ?>
	</div>
-->
	<div class="row">
		<?php echo $form->labelEx($model,'ID Number (800-number)'); ?>
		<?php echo $form->textField($model,'id_number',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_number'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
