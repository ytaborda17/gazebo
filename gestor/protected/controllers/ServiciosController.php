<?php

class ServiciosController extends Controller
{
	public function beforeRender()
	{
		if (Yii::app()->user->isGuest) $this->redirect(array('cruge/ui/login'));

		// $cs = Yii::app()->clientScript;

		$this->pageTitle = "Servicio - " . Yii::app()->name;

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
		return array(array('CrugeAccessControlFilter'));
	}


	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionDetalle($id)
	{
		$media = array();

		$path = Yii::getPathOfAlias('assets').'/servicios/'; // ruta en la cual serán almacenados los archivos

		$dir = array_diff( scandir($path), array('..', '.') );
		foreach ($dir as $i => $file) if ( strpos($file,"servicio-".$id."-")!==false ) { 
			array_push($media, $file);
		}

		$this->render('detalle',array(
			'model'=>$this->loadModel($id),
			'media'=>$media,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionNuevo()
	{
		$model=new Servicio;
		$media = array();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Servicio']))
		{
			$model->attributes=$_POST['Servicio'];
			$model->estatus = (isset($_POST['Servicio']['estatus']) ? 1 : 0);
			if($model->save()){

				$path = Yii::getPathOfAlias('assets')."/servicios/"; // ruta en la cual serán almacenados los archivos
				$files = CUploadedFile::getInstancesByName('media'); // captura de los archivos
				foreach ($files as $i => $theFile) { // renombrar archivos y subir a la ruta seleccionada
					$fileName  = "servicio-".$model->id."-".time().rand(11, 99).".".$theFile->extensionName;
					$tmp = $path."tmp-".$fileName;
					$theFile->saveAs($tmp);
					
					ImageFunctions::resize($tmp, $path.$fileName, 350, 350, $theFile->extensionName, true);
				}

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
			'media'=>$media,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionEditar($id)
	{

		$model=$this->loadModel($id);
		$media = array();

		$path = Yii::getPathOfAlias('assets').'/servicios/'; // ruta en la cual serán almacenados los archivos
		

		$dir = array_diff( scandir(Yii::getPathOfAlias('assets').'/servicios/'), array('..', '.') );
		foreach ($dir as $i => $file) if ( strpos($file,"servicio-".$id."-")!==false ) { 
			array_push($media, $file);
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Servicio']))
		{
			
			$model->attributes=$_POST['Servicio'];
			$model->estatus = (isset($_POST['Servicio']['estatus']) ? 1 : 0);

			if($model->save()){


				// Subir nuevos archivos
				$files = CUploadedFile::getInstancesByName('media'); // captura de los archivos

				
				foreach ($files as $i => $theFile) { // renombrar archivos y subir a la ruta seleccionada
					$fileName  = "servicio-".$model->id."-".time().rand(11, 99).".".$theFile->extensionName;
					$tmp = $path."tmp-".$fileName;
					$theFile->saveAs($tmp);
					
					ImageFunctions::resize($tmp, $path.$fileName, 350, 350, $theFile->extensionName, true);

				}


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
			'media'=>$media,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$path = Yii::getPathOfAlias('assets').'/servicios/';

		$dir = array_diff( scandir(Yii::getPathOfAlias('assets').'/servicios/'), array('..', '.') );
		foreach ($dir as $i => $file) if ( strpos($file,"servicio-".$id."-")!==false ) { 
			foreach(glob($path.$file) as $del) unlink($del);
		}

		if ($this->loadModel($id)->delete()) {
			Yii::app()->user->setFlash("alerta", "El registro ha sido eliminado de la base de datos.");
		} else Yii::app()->user->setFlash("error", "Se ha producido un error al tratar de eliminar el registro.");

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Borra la imagen seleccionada
	 * @param nombre del archivo a borrar
	 */
	public function actionBorrarImagen (){

		$pic = Yii::app()->request->getParam('pic');

		$path = Yii::getPathOfAlias('assets').'/servicios/';

		if(file_exists($path.$pic)) 
			foreach(glob($path.$pic) as $file) 
				if(unlink($file))
					echo "1";
				else 
					echo "0";
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Servicio');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionLista()
	{

		$model=new Servicio('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Servicio']))
			$model->attributes=$_GET['Servicio'];

		$this->render('lista',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Servicio the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Servicio::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Servicio $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='servicio-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
