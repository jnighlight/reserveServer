<?php
/* @var $this Room_reservationController */
/* @var $dataProvider CActiveDataProvider */

//All that important importation
$cs = Yii::app()->clientScript;
$base = Yii::app()->baseUrl;
$fullCal = '/extensions/js/fullcalendar';
$cs->registerCssFile($base . $fullCal . '/fullcalendar/fullcalendar.css');
$cs->registerCoreScript('jquery');
$cs->registerScriptFile($base . $fullCal . '/lib/jquery-ui.custom.min.js');
$cs->registerScriptFile($base . $fullCal . '/fullcalendar/fullcalendar.min.js');


$this->breadcrumbs=array(
	'Room Reservations',
);

$this->menu=array(
	array('label'=>'Create RoomReservation', 'url'=>array('create')),
	array('label'=>'Manage RoomReservation', 'url'=>array('admin')),
);
?>
<h1>Room Reservations</h1>


<div class="form">

<?php
//Make the buildList for later
$buildList = CHtml::listData($buildings, 'building_id', 'name');
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'room-reserve-form',
	'enableAjaxValidation'=>false,
)); ?>


	<div class="row">
	<?php   //Dropdown list that changes the one below it when items are selected
		echo CHtml::dropDownList('building_list','',$buildList,
	array(
	'empty'=> 'Choose a building',
	'ajax' => array(
	'type' => 'POST',
	'url'=> CController::createUrl('room_reservation/'),
	'update'=>'#room_num',
	)));?>
	</div>
	<div class="row">
	<?php
	//This was gonna ajax it, but it got kinda weird. O.o
	/*echo CHtml::dropDownList('room_num','',array('empty'=>'Select a Building'),
	array(
	'ajax'=>array(
	'type' => 'POST',
	'url' => CController::createUrl('updateCal'),
	'success' => 'function(data){console.log(data);}'//'replaceCal(JSONRes)'
			"function(JSONRes){\$('#calendar').fullCalendar({
			editable: false,
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek'
			},
			defaultView: 'agendaWeek',
			allDayDefault: false,
			events: JSONRes
		});}",*/
	//)));
	echo CHtml::dropDownList('room_num','',array('empty'=>'select a building'));
?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('View'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->



<script>

	$(document).ready(function() {

		$('#calendar').fullCalendar({
			editable: false,
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek'
			},
			defaultView: 'agendaWeek',
			allDayDefault: false,
			events: <?php echo $JSONRes; ?>
		});
	});
</script>

<div id='calendar'></div>
