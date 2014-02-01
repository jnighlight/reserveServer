<?php

class RoomController extends Controller
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
				'actions'=>array('index','view','reserve','resTest','calendarRes'),
				//'users'=>array('@'),
				'roles'=>array('user','workStudy','admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				//'users'=>array('@'),
				'roles'=>array('workStudy','admin'),
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
	Gets information from building
	*/
	public function getBuildings()
	{
		return Building::model() -> findAll(true);	
	}

	public function getRooms($buildId)
	{
		$roomNum = 1;
		return Room::model() -> findAllByAttributes(
			array('building_id'=>$buildId)
			//array('room_number'=>$roomNum),
			//"building_id=".$buildId);
			);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Room;
		/**$userLvl = Yii::app()->db->createCommand()
		->select('user_level_id')
		->from('user')
		->where('first_name =\'Jacob\'')
		->queryRow();
		echo($userLvl['user_level_id']);
		echo(Yii::app()->user->id);*/
		//$role = Yii::app()->db->createCommand()->select('user_level_id')->from('user')->where('email=\''.Yii::app()->user->id.'\'')->queryRow();echo($role['user_level_id']);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Room']))
		{
			$model->attributes=$_POST['Room'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->room_id));
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

		if(isset($_POST['Room']))
		{
			$model->attributes=$_POST['Room'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->room_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	
	public function actionResTest()
	{
		$model = new Room;
		
	    	if(isset($_POST['yt0']))
	    	{
			$model->attributes=$_POST['Room'];
			if($model->validate())
			{
				print_r($model->attributes);
		    		echo('THIS IS SUBMITed');
				//return;
				$this->redirect(array('reserve','build_id'=>$model->building_id, 'room_id'=>$model->room_number));
			}
	    	}
	    	$this->render('resTest',array('model'=>$model));

		if(!isset($_POST['Room']['building_id']))
			{/*print_r($_POST);*/ $_POST['Room']['building_id'] = '';}
		$data = Room::model()->findAll('building_id=:building_id',
			array(':building_id'=>(int) $_POST['Room']['building_id']));
		//if(isset($data[0])){print_r($data[0]['room_number']);}
		
		$data = CHtml::listData($data,'room_id','room_number');
		echo CHtml::tag('option', array('value'=>''), 'Choose a room', true);
		foreach($data as $value=>$name)
		{
			echo CHtml::tag('option',
				array('value'=>$value),CHtml::encode($name),true);
		}
		//}
	    //$this->render('resTest',array('model'=>$model));
	}

	public function actionCalendarRes()
{
    $model=new Room;

    // uncomment the following code to enable ajax-based validation
    /*
    if(isset($_POST['ajax']) && $_POST['ajax']==='room-calendarRes-form')
    {
        echo CActiveForm::validate($model);
        Yii::app()->end();
    }
    */

    if(isset($_POST['Room']))
    {
        $model->attributes=$_POST['Room'];
        if($model->validate())
        {
            // form inputs are valid, do something here
            return;
        }
    }
    $this->render('calendarRes',array('model'=>$model));
}

	public function actionReserve()
	{
    	    $model=new Room;
	    //print(Yii::app()->request->getQuery('build_id', 0));

	    if(isset($_POST['Room']))
	    {
		$model->attributes=$_POST['Room'];
		if($model->validate())
		{
		    // form inputs are valid, do something here
		    return;
		}
	    }
	    print_r($model->attributes);
	    $this->render('reserve',array('model'=>$model));
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
		$dataProvider=new CActiveDataProvider('Room');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Room('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Room']))
			$model->attributes=$_GET['Room'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Room the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Room::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Room $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='room-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
