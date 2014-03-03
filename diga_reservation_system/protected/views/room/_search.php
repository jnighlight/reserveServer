<?php
/* @var $this RoomController */
/* @var $model Room */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'room_id'); ?>
		<?php echo $form->textField($model,'room_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room_number'); ?>
		<?php echo $form->textField($model,'room_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'building_id'); ?>
		<?php echo $form->textField($model,'building_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'image_url'); ?>
		<?php echo $form->textField($model,'image_url',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'monday_open'); ?>
		<?php echo $form->textField($model,'monday_open'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'monday_close'); ?>
		<?php echo $form->textField($model,'monday_close'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tuesday_open'); ?>
		<?php echo $form->textField($model,'tuesday_open'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tuesday_close'); ?>
		<?php echo $form->textField($model,'tuesday_close'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wednesday_open'); ?>
		<?php echo $form->textField($model,'wednesday_open'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wednesday_close'); ?>
		<?php echo $form->textField($model,'wednesday_close'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'thursday_open'); ?>
		<?php echo $form->textField($model,'thursday_open'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'thursday_close'); ?>
		<?php echo $form->textField($model,'thursday_close'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'friday_open'); ?>
		<?php echo $form->textField($model,'friday_open'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'friday_close'); ?>
		<?php echo $form->textField($model,'friday_close'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'saturday_open'); ?>
		<?php echo $form->textField($model,'saturday_open'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'saturday_close'); ?>
		<?php echo $form->textField($model,'saturday_close'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sunday_open'); ?>
		<?php echo $form->textField($model,'sunday_open'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sunday_close'); ?>
		<?php echo $form->textField($model,'sunday_close'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->