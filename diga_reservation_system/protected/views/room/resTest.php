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
	'id'=>'room-resTest-form',
	'enableAjaxValidation'=>false,
	//'action'=>Yii::app()->createUrl('room/calendarRes'),
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
	'url'=> CController::createUrl('room/resTest'),
	//'update'=>'#room_num',
	'update'=>'#' . CHtml::activeId($model, 'room_id'),
	)));
	 echo $form -> error($model, 'building_id'); ?>
	</div>
	<div class="row">
	<?php
	
	echo $form -> labelEx($model, 'room_id');
	//echo CHtml::dropDownList('room_num','',array(1=>'NY', 2=>'Paree'));
	echo $form -> dropDownList($model,'room_id',array('empty'=>'select a building'));
	echo $form -> error($model, 'room_id');
?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
