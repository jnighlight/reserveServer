<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Recover Password';
$this->breadcrumbs=array(
	'Password Recovery',
);
?>

<h1>Contact Us</h1>

<?php if(Yii::app()->user->hasFlash('passwordRecov')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('passwordRecov'); ?>
</div>

<?php else: ?>

<p>
Please enter your registered phone number and 800-number and your password will be sent to your registered email address
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'passwordRecov-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_number'); ?>
		<?php echo $form->textField($model,'phone_number'); ?>
		<?php echo $form->error($model,'phone_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_number'); ?>
		<?php echo $form->textField($model,'id_number'); ?>
		<?php echo $form->error($model,'id_number'); ?>
	</div>
   
<!--	<?php /*if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; */?>
-->
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>
