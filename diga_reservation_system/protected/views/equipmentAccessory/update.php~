<?php
/* @var $this RoomController */
/* @var $model Room */

$this->breadcrumbs=array(
	'Equipment Accessory'=>array('index'),
	$model->equipment_id=>array('view','equip_id'=>$model->equipment_id,'accessory_id'=>$model->accessory_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Equipment Accessories', 'url'=>array('index')),
	array('label'=>'Create Equipment Accessory Connection', 'url'=>array('create')),
	array('label'=>'View Equipment Accessories', 'url'=>array('view','equip_id'=>$model->equipment_id,'accessory_id'=>$model->accessory_id)),
);
?>

<h1>Update Room <?php echo $model->equipment_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
