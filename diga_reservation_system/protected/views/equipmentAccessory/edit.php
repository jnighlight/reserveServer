<?php
/* @var $this EquipmentAccessoryController */
/* @var $model EquipmentAccessory */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'equipment-accessory-edit-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'accessory_id'); ?>
		<?php echo $form->textField($model,'accessory_id'); ?>
		<?php echo $form->error($model,'accessory_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'equipment_id'); ?>
		<?php echo $form->textField($model,'equipment_id'); ?>
		<?php echo $form->error($model,'equipment_id'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->