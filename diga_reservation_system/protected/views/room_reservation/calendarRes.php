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
//print($availRooms[0]['room_number']);
$roomList = CHtml::listData($availRooms, 'room_id', 'room_number');
$roomMenu = CHtml::dropDownList('Room Numbers', Room::model(), $roomList, array('empty' => 'Choose a Room Number'));

$hourSelect = array();
$hourSelect[] = 12;
for($i = 1; $i <= 11; $i++)
{
	$hourSelect[] = $i;
}
$minuteSelect = array(0=>"00", 1=>"30");
$ampmSelect = array(0=>"AM", 1=>"PM");

$cs = Yii::app()->clientScript;
$base = Yii::app()->baseUrl;
$fullCal = '/extensions/js/fullcalendar';
$cs->registerCssFile($base . $fullCal . '/fullcalendar/fullcalendar.css');
$cs->registerCoreScript('jquery');
$cs->registerScriptFile($base . $fullCal . '/lib/jquery-ui.custom.min.js');
$cs->registerScriptFile($base . $fullCal . '/fullcalendar/fullcalendar.min.js');
//$cs->registerScript();
?>
<script>

	$(document).ready(function() {

		$('#calendar').fullCalendar({
			dayClick: function(date, allDay, jsEvent, view) {
				//alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

				//alert('Current view: ' + view.name);
				$("#daySelect").html($.fullCalendar.formatDate(date, "dddd',' MMMM d',' yyyy"));
				$("#dateHolder").val(date);
				//$("#dateHolder").val("BLECH");
				//alert(date);
				// change the day's background color just for fun
				//$(this).css('background-color', '#bbbbbb');

                                },
			eventClick: function(calEvent, jsEvent, view) {

				//alert('Event: ' + calEvent.title);
				//alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
				//alert('View: ' + view.name);

				$("#daySelect").html($.fullCalendar.formatDate(calEvent.start, "dddd',' MMMM d',' yyyy"));
				$("#dateHolder").val(calEvent.start);

				// change the border color just for fun
				//$(this).css('border-color', 'red');
				return false;

			    },
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
<script>
function checkFunction()
{
	if($("#dateHolder").val() == '')
	{
		alert("Please click a day");
		return false;
	}
}
</script>
<div id='calendar'></div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'room-calendarRes-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('onsubmit'=>'return checkFunction()'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
	<?php echo("<b>Date</b>"); ?>
	</div>

	<div class="row" id="daySelect">
	<?php echo("Click a day"); ?>
	</div>
	
	<div>
		<?php echo CHtml::hiddenField('dateHolder', '', array("id"=>"dateHolder")); ?>
	</div

	<div class="row">
	<?php echo("<b>Start Time</b>"); ?>
	</div>
	<div class="row">
		<?php 
		echo CHtml::dropDownList('StartHour','0',$hourSelect);
		echo(":");
		echo CHtml::dropDownList('StartMinute','0',$minuteSelect);
		echo CHtml::dropDownList('StartAMPM','0',$ampmSelect);
		//echo $form -> dropDownList($model,'start_date_time',array('empty'=>'select a time'));
		?>
	</div>

	<div class="row">
	<?php echo("<b>End Time</b>"); ?>
	</div>
	<div class="row">
		<?php 
		echo CHtml::dropDownList('EndHour','0',$hourSelect);
		echo(":");
		echo CHtml::dropDownList('EndMinute','0',$minuteSelect);
		echo CHtml::dropDownList('EndAMPM','1',$ampmSelect);
		?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
