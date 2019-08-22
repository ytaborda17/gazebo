<?php

class EmpresaController extends Controller
{
	public function beforeRender()
	{
		if (Yii::app()->user->isGuest) $this->redirect(array('cruge/ui/login'));

		// $cs = Yii::app()->clientScript;

		$this->pageTitle = "Empresa - " . Yii::app()->name;

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
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionDetalle($id)
	{

		$this->render('detalle',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	/*public function actionNuevo()
	{
		$model=new Empresa;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Empresa']))
		{
			$model->attributes=$_POST['Empresa'];
			if($model->save()){
				Yii::app()->user->setFlash("success", "Los datos han sido guardados :)");
				$this->redirect(array('detalle','id'=>$model->id));
			} else Yii::app()->user->setFlash("error", "No se guardaron los datos :(");
		}

		if ($model->hasErrors()) {
			$errores = '';
			foreach ($model->getErrors() as $e) {
			    $errores.=implode("<br>", $e)."<br>";
			}
			Yii::app()->user->setFlash("error", $errores);
		}

		$this->render('nuevo',array(
			'model'=>$model,
		));
	}*/

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionEditar($id)
	{

		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Empresa']))
		{
			// echo "<pre>";
			// 	print_r($_POST);
			// echo "</pre>"; exit;
			
			$model->attributes=$_POST['Empresa'];
			if($model->save()){
				Yii::app()->user->setFlash("success", "Se han actualizado los datos :)");
				$this->redirect(array('detalle','id'=>$model->id));
			} else Yii::app()->user->setFlash("error", "No se actualizaron los datos :(");
		}

		if ($model->hasErrors()) {
			$errores = '';
			foreach ($model->getErrors() as $e) {
			    $errores.=implode("<br>", $e)."<br>";
			}
			Yii::app()->user->setFlash("error", $errores);
		}
		
		$this->render('editar',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	/*public function actionDelete($id)
	{
		if ($this->loadModel($id)->delete()){
			Yii::app()->user->setFlash("alerta", "El registro ha sido eliminado de la base de datos.");
		} else Yii::app()->user->setFlash("error", "Se ha producido un error al tratar de eliminar el registro.");

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}*/

	/**
	 * Lists all models.
	 */
	/*public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Empresa');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}*/

	/**
	 * Manages all models.
	 */
	/*public function actionLista()
	{

		$model=new Empresa('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Empresa']))
			$model->attributes=$_GET['Empresa'];

		$this->render('lista',array(
			'model'=>$model,
		));
	}*/

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Empresa the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Empresa::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Empresa $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='empresa-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
