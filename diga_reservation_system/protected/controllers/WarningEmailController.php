<?php

class WarningEmailController extends Controller
{

   public $layout='//layouts/column2';

   public function filters()
   {
      return array(
         'accessControl',
         'postOnly + delete',
      );
   }

   public function accessRules()
   {
      return array(
         array('allow',
            'actions'=>array('index','emailEdit'),
            'roles'=>array('admin'),
         ),
         array('deny',
            'users'=>array('*'),
         ),
      );
   }

	public function actionIndex()
	{
		$this->render('index');
	}

   public function actionEmailEdit()
   {
      $curMessage = WarningEmail::model()->findByPk(1);
      if(isset($_POST['WarningEmail']))
      {
         $curMessage->attributes=$_POST['WarningEmail'];
         if($curMessage->save())
            { $this->redirect(Yii::app()->baseUrl); }
      }
      $this->render('emailEdit',array('model'=>$curMessage));
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
