<?php
/* @var $this EquipmentController */

$this->breadcrumbs=array(
	'Equipment',
);

?>
<h1>Equipment Reservation</h1>
<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl."/css/equipment_transaction_page.css");

echo CHtml::beginForm(); // this form is for respons to reservation requests
$this->widget('zii.widgets.CListView', array(
  'dataProvider'=>$dataProvider,
  'itemView'=>'_view',
));
echo CHtml::endForm();

?>
