<?php

class MainController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');

		if(isset($_POST['reserve_room']))
		  print("test");
		elseif(isset($_POST['reserve_equipment']))
		  $this->redirect(array("/equipment"));
	}

	/*
	public function init()
	{
	  if(Yii::app()->user->getId() == null)
	  {
	    print("TESTER");
	  }
	}
	*/

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
