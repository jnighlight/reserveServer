<?php

class Equipment_checkinController extends Controller
{
	public function actionIndex()
	{
		if(isset($_POST['equipment_id']))
	        {
		  if(!is_numeric($_POST['equipment_id']) ||
		    empty($_POST['equipment_id']))
		    {
		      print("Invalid piece of equipment");
		    }
		  else
		  {
		    $this->redirect(
		    array("/checkin/?equipment_id=".$_POST['equipment_id']));
		  }
		}
		$dataProvider=new CActiveDataProvider('Equipment',
		  array('criteria'=>
		    array('condition'=>'availability = false')));
                $this->render('index',array(
                        'dataProvider'=>$dataProvider,
                ));

		//$this->render('index');
	}

	public function getMissingEquipment()
	{
	  $equipment = Equipment::model();
	  $criteria = new CDbCriteria;
	    $limit = 10;
	    $offset = 0;
	  $criteria->limit = $limit;
	  $criteria->offset = $offset;
	  $criteria->order = "name ASC";
	  $criteria->condition = "availability = false"; // only checkin things that are gone.

          return $equipment->findAll($criteria);
	}

	public function getAllEquipmentTypes()
	{
	  return EquipmentType::model()->findAll(
	    array('order'=>'name'));
	}

	public function getEquipmentType($equipment_type_id)
	{
	  $equipment_type = EquipmentType::model();
	  $type = $equipment_type->findByPK($equipment_type_id);

          return $type->name;
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
