<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();


	public function init()
        {
	  /* If the user is not logged in and not already
	     on the login page, force them to do so
	  */
	  $loginPage = "site/login"; // login Controller/Action pair
	  $registerPage = "user/create"; // register Controller/Action pair

	  /*
          if((Yii::app()->user->getId() == null) &&
	    ((Yii::app()->urlManager->parseUrl(Yii::app()->request) != $loginPage) && (Yii::app()->urlManager->parseUrl(Yii::app()->request) != $registerPage)  ))
          {
              $this->redirect(array("site/login"));
          }
	  */

	  // If the user is not logged in
  	  if((Yii::app()->user->isGuest) == true)
	  {
	    // if the user is not on the login or register page
	    if((Yii::app()->urlManager->parseUrl(Yii::app()->request) != $loginPage) && (Yii::app()->urlManager->parseUrl(Yii::app()->request) != $registerPage))
	    {
	      $this->redirect(array("site/login"));
	    }
	  }
        }
}
