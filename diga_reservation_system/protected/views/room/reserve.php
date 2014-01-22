<?php
/* @var $this RoomController */
/* @var $model Room */
/* @var $form CActiveForm */
?>
<?php
$build = $this -> getBuildings();
$buildList = CHtml::listData($build, 'building_id', 'name');
$buildMenu = CHtml::dropDownList('Building Names',Building::model(),$buildList, array('empty' => 'Choose a Building'));

$availRooms = $this -> getRooms(4);
print($availRooms[0]['room_number']);
$roomList = CHtml::listData($availRooms, 'room_id', 'room_number');
$roomMenu = CHtml::dropDownList('Room Numbers', Room::model(), $roomList, array('empty' => 'Choose a Room Number'));

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
		<? echo $form->dropDownList($model, 'room_id', $roomList, array('empty' => 'Choose a Room'));
		//php echo $form->textField($model,'room_number'); ?>
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
