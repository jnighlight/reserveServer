<?php
/* @var $this LabHourController */
/* @var $model LabHour */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lab-hour-form',
	'enableAjaxValidation'=>false,
)); 
$buildings = Building::model()->findAll();
$buildList = CHtml::listData($buildings, 'building_id', 'name');
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

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

	<div class="row">
		<?php echo $form->labelEx($model,'start_date'); ?>
		<?php echo CHtml::tag('p', array('class'=>'hint'), 'YYYY-mm-dd'); ?>
		<?php echo $form->dateField($model,'start_date'); ?>
		<?php echo $form->error($model,'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_date'); ?>
		<?php echo CHtml::tag('p', array('class'=>'hint'), 'YYYY-mm-dd'); ?>
		<?php echo $form->dateField($model,'end_date'); ?>
		<?php echo $form->error($model,'end_date'); ?>
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
		<?php echo $form->labelEx($model,'saturday'); ?>
		<?php echo $form->checkBox($model,'saturday'); ?>
		<?php echo $form->error($model,'saturday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sunday'); ?>
		<?php echo $form->checkBox($model,'sunday'); ?>
		<?php echo $form->error($model,'sunday'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
