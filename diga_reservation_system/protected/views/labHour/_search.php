<?php
/* @var $this LabHourController */
/* @var $model LabHour */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'lab_hour'); ?>
		<?php echo $form->textField($model,'lab_hour'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room_id'); ?>
		<?php echo $form->textField($model,'room_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'start_date'); ?>
		<?php echo $form->textField($model,'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'end_date'); ?>
		<?php echo $form->textField($model,'end_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'start_time'); ?>
		<?php echo $form->textField($model,'start_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'end_time'); ?>
		<?php echo $form->textField($model,'end_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'monday'); ?>
		<?php echo $form->textField($model,'monday'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tuesday'); ?>
		<?php echo $form->textField($model,'tuesday'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wednesday'); ?>
		<?php echo $form->textField($model,'wednesday'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'thursday'); ?>
		<?php echo $form->textField($model,'thursday'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'friday'); ?>
		<?php echo $form->textField($model,'friday'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'saturday'); ?>
		<?php echo $form->textField($model,'saturday'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sunday'); ?>
		<?php echo $form->textField($model,'sunday'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
