<?php
/* @var $this EquipmentController */
/* @var $model Equipment */
/* @var $form CActiveForm */
$cs = Yii::app()->clientScript;
$base = Yii::app()->baseUrl;
$cs->registerCssFile($base . '/css/variableTextFields.css');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'equipment-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
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
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<!--
                <?php echo $form->labelEx($model,'image'); ?>
                <?php echo $form->fileField($model,'image'); ?>
                <?php echo $form->error($model,'image'); ?>  -->

		<?php
		  echo CHtml::openTag("p"); echo "Image"; echo CHtml::closeTag("p");
		  echo CHtml::fileField("image");
		?>
        </div>
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'image_url'); ?>
		<?php echo $form->textField($model,'image_url',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'image_url'); ?>
	</div>
-->
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
  }
?>
	<a href="#" id="addAcessory">Add Another Input Box</a>

	<div id="accessoryFields">
	    <p>
		<label for="accessoryFields"><input type="text" id="accessory" size="20" name="accessory[accessory_0]" value="" placeholder="Input Value" /></label><a href="#" id="removeAccessory">Remove</a>
	    </p>
	</div>


<script>
$(function() {
        var scntDiv = $('#accessoryFields');
        var i = $('#accessoryFields p').size();
        
        $('#addAcessory').live('click', function() {
                $('<p><label for="accessoryFields"><input type="text" id="accessory" size="20" name="accessory[accessory_' + i +']" value="" placeholder="Input Value" /></label> <a href="#" id="removeAccessory">Remove</a></p>').appendTo(scntDiv);
                i++;
                return false;
        });
        
        $('#removeAccessory').live('click', function() { 
                if( i > 0 ) {
                        $(this).parents('p').remove();
                        i--;
                }
                return false;
        });
});


</script>

<?php
  echo CHtml::closeTag("div");

  // Specification Section
  $specs_section = array("class"=>"specs_section");


  $specs = $model->getSpecs();

  echo CHtml::openTag("h3");
    print("Specifications");
  echo CHtml::closeTag("h3");

  echo CHtml::openTag("div",$specs_section);
?>
	<a href="#" id="addspec">Add Another Input Box</a>

	<div id="specFields">
	    <p>
		<label for="specFields"><input type="text" id="spec" size="20" name="specs[spec_0]" value="" placeholder="Input Value" /></label><a href="#" id="removespec">Remove</a>
	    </p>
	</div>


<script>
$(function() {
        var scntDiv = $('#specFields');
        var i = $('#specFields p').size();
        
        $('#addspec').live('click', function() {
                $('<p><label for="specFields"><input type="text" id="accessory" size="20" name="specs[spec_' + i +']" value="" placeholder="Input Value" /></label> <a href="#" id="removespec">Remove</a></p>').appendTo(scntDiv);
                i++;
                return false;
        });
        
        $('#removespec').live('click', function() { 
                if( i > 0 ) {
                        $(this).parents('p').remove();
                        i--;
                }
                return false;
        });
});


</script>

<?php
  echo CHtml::closeTag("div");
?>

        <div class="row buttons">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        </div>
<?php $this->endWidget(); ?>


</div><!-- form -->
