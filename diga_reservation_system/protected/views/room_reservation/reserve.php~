<?php
/* @var $this RoomController */
/* @var $model Room */
/* @var $form CActiveForm */
?>

<div class="form">

<?php
//Getting the buildList for later
$build = $this -> getBuildings();
$buildList = CHtml::listData($build, 'building_id', 'name');
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'room-reserve-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
	<?php echo //Making a drop down list that will modify the room_number list after it
		$form -> labelEx($model, 'building_id');
		//echo CHtml::dropDownList('building_id','',$buildList,
		echo $form -> dropDownList($model, 'building_id',$buildList,
	array(
	'empty'=> 'Choose a building',
	'ajax' => array(
	'type' => 'POST',
	'url'=> CController::createUrl('room_reservation/reserve'),
	//'update'=>'#room_num',
	'update'=>'#' . CHtml::activeId($model, 'room_number'),
	)));
	 echo $form -> error($model, 'building_id'); ?>
	</div>
	<div class="row">
	<?php
	
	echo $form -> labelEx($model, 'room_number');
	//echo CHtml::dropDownList('room_num','',array(1=>'NY', 2=>'Paree'));
	echo $form -> dropDownList($model,'room_number',array('empty'=>'select a building'));
	echo $form -> error($model, 'room_number');
?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
