<?php
/* @var $this RoomController */
/* @var $model Room */

$this->breadcrumbs=array(
	'Equipment Accessory'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Equipment Accessories', 'url'=>array('index')),
);
?>

<h1>Create Equipment Accessory Link</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
