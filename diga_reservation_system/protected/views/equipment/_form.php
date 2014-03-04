<?php
/* @var $this EquipmentController */
/* @var $model Equipment */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'equipment-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'serial_number'); ?>
		<?php echo $form->textField($model,'serial_number',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'serial_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'manufacturer'); ?>
		<?php echo $form->textField($model,'manufacturer',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'manufacturer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'model_number'); ?>
		<?php echo $form->textField($model,'model_number',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'model_number'); ?>
	</div>

	<div class="row">
                <?php echo $form->labelEx($model,'su_number'); ?>
                <?php echo $form->textField($model,'su_number',array('size'=>30,'maxlength'=>30)); ?>
                <?php echo $form->error($model,'su_number'); ?>
        </div>


	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image_url'); ?>
		<?php echo $form->textField($model,'image_url',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'image_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Equipment Type'); ?>
		<!--<?php echo $form->textField($model,'equipment_type_id'); ?> -->
		<?php echo $form->dropDownList($model, 'equipment_type_id', CHtml::listData(EquipmentType::model()->findAll(array('order'=>'name')),'equipment_type_id','name'));?>
		<?php echo $form->error($model,'equipment_type_id'); ?>
	</div>
<?php
if(isset($model->equipment_id))
{
  // Accessories Section
  $accessory_section = array("class"=>"accessory_section");

  $accessories = $model->getAccessories();

  echo CHtml::openTag("h3");
    print("Accessories");
  echo CHtml::closeTag("h3");

  echo CHtml::openTag("div",$accessory_section);
  foreach($accessories as $accessory)
  {
    echo CHtml::textField($accessory->accessory_id, $accessory->name);
    echo CHtml::closeTag("br");
  }
  echo CHtml::closeTag("div");

  // Specification Section
  $specs_section = array("class"=>"specs_section");


  $specs = $model->getSpecs();

  echo CHtml::openTag("h3");
    print("Specifications");
  echo CHtml::closeTag("h3");
  echo CHtml::closeTag("br");

  echo CHtml::openTag("div",$specs_section);
  foreach($specs as $spec)
  {
    echo CHtml::textField($spec->specification_id, $spec->name);
    echo CHtml::closeTag("br");
  }
  echo CHtml::closeTag("div");
}
?>

        <div class="row buttons">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        </div>
<?php $this->endWidget(); ?>


</div><!-- form -->
