<?php

class AuditoriaController extends Controller
{
	public function beforeRender()
	{
		if (Yii::app()->user->isGuest) $this->redirect(array('cruge/ui/login'));
		// $cs = Yii::app()->clientScript;

		return true;
	}
	
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
		/*
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
		*/
		return array(array('CrugeAccessControlFilter'));
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' actions
				'actions'=>array('create'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'update' actions
				'actions'=>array('update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'delete' actions
				'actions'=>array('delete'),
				'users'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' actions
				'actions'=>array('admin'),
				'users'=>array('admin'),
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
	public function actionDetalle($id)
	{
		$model       = Auditoria::model()->findByPk($id);
		$geoLocation = Yii::app()->db->createCommand()
			->select("*")
			->from("cruge_session")
			->where("iduser='".$model->user_id."'")
			->andwhere("ipaddress='".$model->ipAddress."'")
			->andwhere("created<'".time($model->time_stamp)."'")
			->andwhere("expire>'".time($model->time_stamp)."'")
			->queryRow()
		;
		
		$this->renderPartial('detalle',array(
			'model'=>$model,
			'geoLocation'=>$geoLocation,
		),false,true);
		Yii::app()->end(); 
	}

	/**
	 * Manages all models.
	 */
	public function actionLista()
	{
		$model=new Auditoria('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Auditoria']))
			$model->attributes=$_GET['Auditoria'];

		$this->render('lista',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Auditoria the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Auditoria::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Auditoria $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='app-auditoria-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
