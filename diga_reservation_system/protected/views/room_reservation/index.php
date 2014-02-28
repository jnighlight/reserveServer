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
	<!-- ></div>
	<div class="row"> -->
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
	echo CHtml::dropDownList('room_num','',array(''=>'---'));
	echo CHtml::hiddenField('cur_build', $buildingID, array("id"=>"cur_build")); 
	echo CHtml::hiddenField('cur_room', $roomID, array("id"=>"cur_room")); 
	?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('View');
		      echo " " . CHtml::submitButton('Reserve');
			$usersRole = User::model()->findByAttributes(array('email'=>Yii::app()->user->getId()));
			if($usersRole['user_level_id'] == 2 || $usersRole['user_level_id'] == 1)
			{
				echo CHtml::submitButton('Modify Permissions');
			}

?>
	</div>
	</center>
<?php $this->endWidget(); ?>

</div><!-- form -->

<?php echo ("<center><h1> " . $buildingName . ", Room " . $roomNumber ." </h1></center>"); ?>

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
<script>
$('#room-reserve-form').submit(function(){ //listen for submit event
    $.each(params, function(i,param){
        $('<input />').attr('type', 'hidden')
            .attr('name', 'bob')
            .attr('value', '10')
            .appendTo('#room-reserve-form');
    });

    return true;
});
</script>

<div id='calendar'></div>
