<?php
/* @var $this CourseController */
/* @var $model Course */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'course-form',
	'enableAjaxValidation'=>false,
));
$buildings = Building::model()->findAll();
$buildList = CHtml::listData($buildings, 'building_id', 'name');
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'startDate'); ?>
		<?php echo $form->dateField($model,'startDate'); ?>
		<?php echo $form->error($model,'startDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'endDate'); ?>
		<?php echo $form->dateField($model,'endDate'); ?>
		<?php echo $form->error($model,'endDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_time'); ?>
		<?php echo CHtml::tag('p', array('class'=>'hint'), '24 hour time: If you want 8:00 PM, insert 20:00'); ?>
		<?php echo $form->textField($model,'start_time'); ?>
		<?php echo $form->error($model,'start_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_time'); ?>
		<?php echo CHtml::tag('p', array('class'=>'hint'), '24 hour time: If you want 8:00 PM, insert 20:00'); ?>
		<?php echo $form->textField($model,'end_time'); ?>
		<?php echo $form->error($model,'end_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'monday'); ?>
		<?php //echo $form->textField($model,'monday'); ?>
		<?php echo $form->checkBox($model,'monday'); ?>
		<?php echo $form->error($model,'monday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tuesday'); ?>
		<?php echo $form->checkBox($model,'tuesday'); ?>
		<?php echo $form->error($model,'tuesday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wednesday'); ?>
		<?php echo $form->checkBox($model,'wednesday'); ?>
		<?php echo $form->error($model,'wednesday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thursday'); ?>
		<?php echo $form->checkBox($model,'thursday'); ?>
		<?php echo $form->error($model,'thursday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'friday'); ?>
		<?php echo $form->checkBox($model,'friday'); ?>
		<?php echo $form->error($model,'friday'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'room_id'); ?>
		<?php //echo $form->textField($model,'room_id'); ?>
		<?php //echo $form->error($model,'room_id'); ?>
	</div>

	<div class="row">
	<?php   //Dropdown list that changes the one below it when items are selected
		echo CHtml::label('Building', 'building_list');
		echo CHtml::dropDownList('building_list','',$buildList,
	array(
	'empty'=> 'Choose a building',
	'ajax' => array(
	'type' => 'POST',
	'url'=> CController::createUrl('labHour/buildList'),
	'update'=>'#' . CHtml::activeId($model, 'room_id'),
	)));?>
	</div>

	<div class="row">
	<?php
	echo $form->labelEx($model,'room_id');
	echo $form -> dropDownList($model,'room_id',array(''=>'select a building'));
	echo $form->error($model,'room_id');
	?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
