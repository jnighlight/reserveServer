<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->email), array('view', 'id'=>$data->user_id)); ?>
	<br />
<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />
-->
	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_number')); ?>:</b>
	<?php echo CHtml::encode($data->phone_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_level_id')); ?>:</b>
	<?php 
	  $user_level = UserLevel::model()->findByPk($data->user_level_id)->name;
	  echo CHtml::encode($user_level); ?>
	<br />

	<?php
        echo CHtml::beginForm();
          echo CHtml::htmlButton("History",
            array(
              'type' => 'submit',
              'name' => 'user_id',
              'value' => $data->user_id,
            ));
        echo CHtml::endForm();
        ?>


</div>
