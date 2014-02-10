<?php
/* @var $this RoomController */
/* @var $model Room */
/* @var $form CActiveForm */
?>

<div class="form">

<?php
$build = $this -> getBuildings();
$buildList = CHtml::listData($build, 'building_id', 'name');
//$buildIDs = array_keys($buildList);
//$roomsInBuild = $this -> getRooms($buildList[0]['building_id']);
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'room-reserve-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
	<?php echo $form -> labelEx($model, 'building_id');
		//echo CHtml::dropDownList('building_id','',$buildList,
		echo $form -> dropDownList($model, 'building_id',$buildList,
	array(
	'empty'=> 'Choose a building',
	'ajax' => array(
	'type' => 'POST',
	//'data' => array('building_id'=>'js:this.value'),
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
