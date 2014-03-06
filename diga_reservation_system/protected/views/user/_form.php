<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
                <?php echo $form->labelEx($model,'first_name'); ?>
                <?php echo $form->textField($model,'first_name',array('size'=>20,'maxlength'=>20)); ?>
                <?php echo $form->error($model,'first_name'); ?>
        </div>

        <div class="row">
                <?php echo $form->labelEx($model,'last_name'); ?>
                <?php echo $form->textField($model,'last_name',array('size'=>20,'maxlength'=>20)); ?>
                <?php echo $form->error($model,'last_name'); ?>
        </div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<div class="row">
                <?php echo $form->labelEx($model,'password_repeat'); ?>
                <?php echo $form->passwordField($model,'password_repeat',array('size'=>60,'maxlength'=>100)); ?>
                <?php echo $form->error($model,'password_repeat'); ?>
        </div>
	<div class="row">
		<?php echo $form->labelEx($model,'phone_number'); ?>
		<?php echo $form->textField($model,'phone_number',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'phone_number'); ?>
	</div>
<?php
  if(!Yii::app()->user->isGuest)
  {
    $user = User::model()->findByAttributes(array("email"=>Yii::app()->user->name));
    if($user->user_level_id == 3) // if the user is an admin
    {
?>
	<div class="row">
                <?php echo $form->labelEx($model,'User Level'); ?>
                <?php echo $form->dropDownList($model, 'user_level_id', CHtml::listData(UserLevel::model()->findAll(array('order'=>'name')),'user_level_id','name'));?>
                <?php echo $form->error($model,'user_level_id'); ?>
        </div>
<?php
    }
  }
?>
	<div class="row">
		<?php echo $form->labelEx($model,'ID Number (800-number)'); ?>
		<?php echo $form->textField($model,'id_number',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_number'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
