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
$equipment = Equipment::model()->findAll();
$equipList = CHtml::listData($equipment, 'equipment_id', 'name');
$accessories = Accessory::model()->findAll();
$accessList = CHtml::listData($accessories, 'accessory_id', 'name');
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'accessory_id'); ?>
		<?php echo $form->dropDownList($model,'accessory_id',$accessList); ?>
		<?php echo $form->error($model,'accessory_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'equipment_id'); ?>
		<?php echo $form->dropDownList($model,'equipment_id',$equipList); ?>
		<?php echo $form->error($model,'equipment_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
