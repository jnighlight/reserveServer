<?php
/* @var $this RoomController */
/* @var $model Room */
/* @var $form CActiveForm */
?>
<?php
//Prepares information for the dropdown boxes
$hourSelect = array();
$hourSelect[] = 12;
for($i = 1; $i <= 11; $i++)
{
	$hourSelect[] = $i;
}
$minuteSelect = array(0=>"00", 1=>"30");
$ampmSelect = array(0=>"AM", 1=>"PM");

//Importin dose libraries doe
$cs = Yii::app()->clientScript;
$base = Yii::app()->baseUrl;
$fullCal = '/extensions/js/fullcalendar';
$cs->registerCssFile($base . $fullCal . '/fullcalendar/fullcalendar.css');
$cs->registerCoreScript('jquery');
$cs->registerScriptFile($base . $fullCal . '/lib/jquery-ui.custom.min.js');
$cs->registerScriptFile($base . $fullCal . '/fullcalendar/fullcalendar.min.js');
?>
<script>
	//A script to create the calendar
	$(document).ready(function() {

		$('#calendar').fullCalendar({
			dayClick: function(date, allDay, jsEvent, view) {
				//Lets you select the day by clicking on it...
				$("#daySelect").html($.fullCalendar.formatDate(date, "dddd',' MMMM d',' yyyy"));
				$("#dateHolder").val(date);
                                },
			eventClick: function(calEvent, jsEvent, view) {
				//...Even if they click an event on that day
				$("#daySelect").html($.fullCalendar.formatDate(calEvent.start, "dddd',' MMMM d',' yyyy"));
				$("#dateHolder").val(calEvent.start);
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
	//We don't want them submitting without clicking a day first
	if($("#dateHolder").val() == '')
	{
		alert("Please click a day");
		return false;
	}
}
</script>
<?php echo ("<center><h1> " . $buildingName . ", Room " . $roomNumber ." </h1></center>"); ?>
<div id='calendar'></div>
<div class="form">

<?php 	//And this is the pretty form
	$form=$this->beginWidget('CActiveForm', array(
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
