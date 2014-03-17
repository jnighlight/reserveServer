<?php
/* @var $this RoomReservationPermissionController */
/* @var $model RoomReservationPermission */
/* @var $form CActiveForm */
?>

<div class="form">

<?php
$cs = Yii::app()->clientScript;
$cs->registerCoreScript('jquery');
$cs->registerCssFile(Yii::app()->baseUrl.'/css/permission_table.css');

$this->breadcrumbs=array(
	'Room Reservations'=>array('index'), 'Permissions'
);
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'room-reservation-permission-permissions-form',
	'enableAjaxValidation'=>false,
)); ?>

	<center>
	<h1> Reservation Permissions</h1>
	<h1> <?php echo($building_name . ', Room ' . $room_number);?></h1>
	</center>
	<?php echo $form->errorSummary($model); ?>
	<center>
	<div style="overflow:scroll;" id="userBox">
	<table id="userTable">
	<tr>
		<th>Student</th>
		<th id='permHeader'>Permission</th>
	<tr>
	<?php
		$i = 1;
		foreach($users as $user)
		{
			$checked = in_array($user['user_id'], $permissionIds);
			echo('<tr>');
			echo('<th>' . $user['last_name'] . ', ' . $user['first_name'] . '</th>');
			echo('<th>'. CHtml::checkBox(('usr'.$i), $checked) .'</th>');
			echo CHtml::hiddenField('usr'.$i.'hid', $user['user_id']);
			echo('</tr>');
			$i++;
		}
		/*for($i = 0; $i < 50; $i++)
		{
			echo('<p>');
			echo('H');
			for($j = 0; $j < $i; $j++)
			{
				echo('i');
			}
			echo('</p>');
		}*/
	?>
	</table>
	</div>
	</center>
	<script>
		var style = "border:solid;overflow:auto;width:" + ($(window).width()/2.25) + "px;height:" +
			($(window).height()/2) + "px;";
		$("#userBox").attr('style', style);
		$("#permHeader").attr('width','' + $(window).width()/10 + 'px');

		$(window).resize(function() {
			var style = "border:solid;overflow:auto;width:" + ($(window).width()/2.25) + "px;height:"+
				($(window).height()/2) + "px;";
			$("#userBox").attr('style', style);
			$("#permHeader").attr('width','' + $(window).width()/10 + 'px');
		});
	</script>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit', array('id'=>'subBut')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
