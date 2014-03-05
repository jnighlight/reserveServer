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
$maxRes = RoomReservationPolicy::model()->findByAttributes(array('room_id'=>$roomID));
$maxRes = $maxRes['max_reservation_hours'];

$usersRole = User::model()->findByAttributes(array('email'=>Yii::app()->user->getId()));
$superUser = ($usersRole['user_level_id'] == 2 || $usersRole['user_level_id'] == 1);

$this->breadcrumbs=array(
	'Room Reservations',
);
if($superUser)
{
	$this->menu=array(
	array('label'=>'Create Room Reservation', 'url'=>array('create')),
	array('label'=>'Manage Room Reservation', 'url'=>array('admin')),
	array('label'=>'Manage Max Reservation Times', 'url'=>array('/roomReservationPolicy')),
	);
}


if(isset($alert) && $alert)
{
	echo("
	<script>
		alert('You do not have permission to reserve " . $buildingName . ", room ". $roomNumber ."');
	</script>
	");
}
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
	'htmlOptions'=>array('onsubmit'=>'return checkFunction()'),
)); ?>

	<center>
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

	<?php
	echo CHtml::dropDownList('room_num','',array(''=>'---'));
	echo CHtml::hiddenField('cur_build', $buildingID, array("id"=>"cur_build")); 
	echo CHtml::hiddenField('cur_room', $roomID, array("id"=>"cur_room")); 
	?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('View');
		      echo " " . CHtml::submitButton('Reserve');
			if($superUser)
			{
				echo " " . CHtml::submitButton('Modify Permissions');
				echo " " . CHtml::submitButton('Set Reservation Time');
			}

?>
	</div>
	</center>
<?php $this->endWidget(); ?>

</div><!-- form -->

<?php echo ("<center><h1> " . $buildingName . ", Room " . $roomNumber ." </h1></center>"); ?>
<?php if(isset($maxRes))
	{echo ("<center><h3> Max Reservation Time: ". $maxRes ." Hours</h3></center>");} ?>

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
	//

	$('#calendar').fullCalendar('addEventSource',
		function(start, end, callback)
		{
			var events = [];
			var times = <?php echo(json_encode($roomTimes)); ?>;
			for(loop = start.getTime(); loop <= end.getTime(); loop = loop + (24*60*60*1000))
			{
				var start_date = new Date(loop);
				console.log(start_date.getDay());
				var todayOpen = times[start_date.getDay() * 2];
				todayOpen = todayOpen.split(":");
				var todayClose = times[(start_date.getDay() * 2) + 1];
				todayClose = todayClose.split(":");
				
				start_date.setHours(0);
				start_date.setMinutes(0);
				start_date.setSeconds(0);
				start_date.setMilliseconds(0);

				var end_date = new Date(loop);
				end_date.setHours(todayOpen[0]);
				end_date.setMinutes(todayOpen[1]);
				end_date.setSeconds(todayOpen[2]);

				events.push({
					title:'CLOSED',
					start: new Date(start_date.getTime()),
					end: new Date(end_date.getTime()),
					color:'#000000',
				});

				start_date.setHours(todayClose[0]);
				start_date.setMinutes(todayClose[1]);
				start_date.setSeconds(todayClose[2]);
				end_date.setHours(24);
				end_date.setMinutes(0);
				end_date.setSeconds(0);
				events.push({
					title:'CLOSED',
					start: start_date,
					end: end_date,
					color:'#000000',
				});
			}
			callback(events);
		});
	});
	//$('#calendar').fullCalendar.addEventSource();
</script>
<script>
function checkFunction()
{
	//We don't want them submitting without selecting a room and building
	//if($("#building_list").val() == '' ||$("#room_num").val() == '')
	//{
		//alert("Please select a Building and a Room");
		//$('#room-reserve-form').attr('name', 'bob')
		//alert('click');
		//return false;
	//}
}
</script>

<div id='calendar'></div>
