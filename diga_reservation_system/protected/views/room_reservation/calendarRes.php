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

/*Yii::app()->clientScript->registerScript(
	Yii::app()->assetsManager->publish(Yii::app()->baseUrl . '/extensions/js/fullcalendar/fullcalendar/fullcalendar.min.js', CClientScript::POS_HEAD);//);*/

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
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();

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
				/*[
				{
					title: 'All Day Event',
					start: new Date(y, m, 1)
				},
				{
					title: 'Long Event',
					start: new Date(y, m, d-5),
					end: new Date(y, m, d-2)
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d-3, 16, 0),
					allDay: false
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d+4, 16, 0),
					allDay: false
				},
				{
					title: 'Meeting',
					start: new Date(y, m, d, 10, 30),
					allDay: false
				},
				{
					title: 'Lunch',
					start: new Date(y, m, d, 12, 0),
					end: new Date(y, m, d, 14, 0),
					allDay: false
				},
				{
					title: 'Birthday Party',
					start: new Date(y, m, d+1, 19, 0),
					end: new Date(y, m, d+1, 22, 30),
					allDay: false
				},
				{
					title: 'Click for Google',
					start: new Date(y, m, 28),
					end: new Date(y, m, 29),
					url: 'http://google.com/'
				}
			]*/
		});
	});
</script>
<div id='calendar'></div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'room-calendarRes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

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
