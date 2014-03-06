<?php
/* @var $this UserController */
/* @var $model User */


Yii::app()->clientScript->registerScriptFile("//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js");

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/extensions/js/user_form/password_autofill.js");


$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->email=>array('view','id'=>$model->email),
	'Update',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->user_id)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Update User <?php echo $model->email; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
