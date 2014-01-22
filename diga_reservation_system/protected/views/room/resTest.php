<?php
/* @var $this RoomController */
/* @var $model Room */
/* @var $form CActiveForm */
?>

<div class="form">

<?php
$build = $this -> getBuildings();
$buildList = CHtml::listData($build, 'building_id', 'name');
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'room-resTest-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
	<?php echo CHtml::dropDownList('building_id','',$buildList,
	array(
	'ajax' => array(
	'type' => 'POST',
	//'data' => array('building_id'=>'js:this.value'),
	'url'=> CController::createUrl('room/resTest'),
	//'update'=>'#room_num',
	'update'=>'#' . CHtml::activeId($model, 'room_num'),
	)));
	//echo CHtml::dropDownList('room_num','',array(1=>'NY', 2=>'Paree'));
	echo CHtml::dropDownList(CHtml::activeName($model, 'room_num'),'rum_num',array());
?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
