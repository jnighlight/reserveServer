<?php

class RoomEquipmentController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('equipList'),
				'roles'=>array('user','workStudy', 'admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update'),
				'roles'=>array('workStudy', 'admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new RoomEquipment;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RoomEquipment']))
		{
			$model->attributes=$_POST['RoomEquipment'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->room_equipment_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RoomEquipment']))
		{
			$model->attributes=$_POST['RoomEquipment'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->room_equipment_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('RoomEquipment');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Lists all equipment so they can rent one
	 */
	public function actionEquipList()
	{
		print_r($_POST);
		$i = 0;
		$room_id = Yii::app()->request->getParam('room_id', -1);
		while(isset($_POST['equipmentID'.$i]))
		{
			if(isset($_POST['yt'. $i]))
			{
				$this->redirect(array('/roomEquipmentReservation/equipmentRes',
					'equipment_id'=>$_POST['equipmentID'.$i], 'room_id'=>$room_id));
			}
			$i++;
		}
		if($room_id == -1)
			{$this -> redirect(array('/room_reservation/'));}
		$equipment = RoomEquipment::model()->findAllByAttributes(array('room_id'=>$room_id));
		if(!isset($equipment[0]))
			{$this->redirect(array("/room_reservation/index",'noEquip'=>true,));}
		$room = Room::model()->findByAttributes(array('room_id'=>$room_id));
		$building = Building::model()->findByAttributes(array('building_id'=>$room['building_id']));
		$dataProvider=new CActiveDataProvider('RoomEquipment');
		$this->render('equipList',array(
			'dataProvider'=>$dataProvider, 'equipment'=>$equipment, 'buildName'=>$building['name'],
			'roomNum'=>$room['room_number']
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new RoomEquipment('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RoomEquipment']))
			$model->attributes=$_GET['RoomEquipment'];
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return RoomEquipment the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=RoomEquipment::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param RoomEquipment $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='room-equipment-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
