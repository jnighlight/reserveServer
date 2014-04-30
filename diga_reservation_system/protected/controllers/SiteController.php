<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		if(isset($_POST['room_admin_controls']) || isset($_POST['room_admin_controls_x']))
			{$this->redirect(array("/room"));}
		elseif(isset($_POST['reserve_equipment']) || isset($_POST['reserve_equipment_x']))
			{$this->redirect(array("/equipment_reservation"));}
		elseif(isset($_POST['equipment_admin_controls']) || isset($_POST['equipment_admin_controls_x']))
			{$this->redirect(array("/equipment"));}
		elseif(isset($_POST['reserve_room']) || isset($_POST['reserve_room_x']))
			{$this->redirect(array("/room_reservation"));}
		elseif(isset($_POST['user_admin_controls'])|| isset($_POST['user_admin_controls_x']))
			{$this->redirect(array("/user"));}
		elseif(isset($_POST['admin_email__controls'])|| isset($_POST['admin_email_controls_x']))
			{$this->redirect(array("/adminEmail/addressEdit"));}
		elseif(isset($_POST['warning_email_controls'])|| isset($_POST['warning_email_controls_x']))
			{$this->redirect(array("/warningEmail/emailEdit"));}
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionPasswordRecov()
	{
		$model=new User;
		if(isset($_POST['User']))
		{
         echo("BUton Pushed");
			/*$model->attributes=$_POST['User'];
            echo('model validated');
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);*/
            $success = mail("jlites@stetson.edu", "SUBJECT", "MESSAGE");
            if($success)
            {
				   Yii::app()->user->setFlash('passwordRecov','Thank you for contacting us. We will respond to you as soon as possible.');
            }
            else
            {
				   Yii::app()->user->setFlash('passwordRecov','Boo');
            }
				$this->refresh();
		}
		$this->render('passRecov',array('model'=>$model));
   }

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		if(isset($_POST["Register"]))
		{
		  $this->redirect(array("user/create"));
		  //print("TEST");
		}

		if(isset($_POST["forgotPass"]))
		{
		  $this->redirect(array("site/passwordRecov"));
		  //print("TEST");
      }

		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				//$this->redirect(Yii::app()->user->returnUrl);
				$this->redirect(array("site/index"));

		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/*
	  checks to see if user is an admin
	*/

	public function isUserAdmin()
	{
	  // Real logic to come once Jacob figures it out.
	  return true;
	}

	/*
          checks to see if user is workstudy
        */

        public function isUserWorkstudy()
        {
          // Real logic to come once Jacob figures it out.
          return true;
        }


	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}
