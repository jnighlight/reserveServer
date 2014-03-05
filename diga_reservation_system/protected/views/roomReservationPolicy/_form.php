<?php
/* @var $this RoomReservationPolicyController */
/* @var $model RoomReservationPolicy */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'room-reservation-policy-form',
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
		<?php echo $form->labelEx($model,'max_reservation_hours'); ?>
		<?php echo $form->textField($model,'max_reservation_hours'); ?>
		<?php echo $form->error($model,'max_reservation_hours'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
