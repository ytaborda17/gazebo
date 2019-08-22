<?php

class GaleriaController extends Controller
{
	public function beforeRender()
	{
		if (Yii::app()->user->isGuest) $this->redirect(array('cruge/ui/login'));

		// $cs = Yii::app()->clientScript;

		$this->pageTitle = "Galeria - " . Yii::app()->name;

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

		$this->render('detalle',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionNuevo()
	{
		$model=new Galeria;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Galeria']))
		{
			
			$model->attributes=$_POST['Galeria'];
			$model->estatus = (isset($_POST['Galeria']['estatus']) ? $_POST['Galeria']['estatus'] : 0);
			if($model->save()){

				$titles = $_POST['media']; //array();
				if (isset($_POST['media']) && !empty($_POST['media'])) foreach ($_POST['media'] as  $theTitle) {
					array_push($titles, $theTitle);
				}
			
				$path = Yii::getPathOfAlias('assets')."/galeria/"; // ruta en la cual serán almacenados los archivos
				$files = CUploadedFile::getInstancesByName('media'); // captura de los archivos
				foreach ($files as $index => $theFile) {

					$galeriaImg = new GaleriaImg();
					$galeriaImg->galeria_id = $model->id;
					$galeriaImg->titulo = $titles[$index]; // falta el title

					if ($galeriaImg->save()) {
						$fileName  = "galeria-".$model->id."-".$galeriaImg->id.".".$theFile->extensionName;
						$tmp = $path."tmp-".$fileName;
						$theFile->saveAs($tmp);
						
						$result = ImageFunctions::resize($tmp, $path.$fileName, 800, 600, $theFile->extensionName, true);

						if ($result) {
							$galeriaImg->file_name = $fileName;
							$galeriaImg->save();
						} else $galeriaImg->delete();
					}
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
		$media=array();
		$images = GaleriaImg::model()->findAll(array('condition'=>'galeria_id='.$id));	
		
		$path = Yii::getPathOfAlias('assets')."/galeria/"; // ruta en la cual serán almacenados los archivos

		$dir = array_diff( scandir(Yii::getPathOfAlias('assets').'/galeria/'), array('..', '.') );
		foreach ($dir as $i => $file) if ( strpos($file,"galeria-".$model->id."-")!==false ) { 
			array_push($media, $file);
		}
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Galeria']))
		{

			$model->attributes=$_POST['Galeria'];
			$model->estatus = (isset($_POST['Galeria']['estatus']) ? $_POST['Galeria']['estatus'] : 0);

			if($model->save()){

				$titles = array();
				if (isset($_POST['media']) && !empty($_POST['media'])) foreach ($_POST['media'] as  $theTitle) {
					array_push($titles, $theTitle);
				}
			
				$files = CUploadedFile::getInstancesByName('media'); // captura de los archivos				
				foreach ($files as $i => $theFile) {

					$galeriaImg = new GaleriaImg();
					$galeriaImg->galeria_id = $model->id;
					$galeriaImg->titulo = $titles[$i]; // falta el title
					if ($galeriaImg->save()) {

						$fileName  = "galeria-".$model->id."-".$galeriaImg->id.".".$theFile->extensionName;
						$tmp = $path."tmp-".$fileName;

						$theFile->saveAs($tmp);
						
						$result = ImageFunctions::resize($tmp, $path.$fileName, 800, 600, $theFile->extensionName, true);

						if ($result) {
							$galeriaImg->file_name = $fileName;
							$galeriaImg->save();
						} else $galeriaImg->delete();
					}
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
			'images'=>$images,
		));
	}

	/**
	 * Edita el titulo y texto alternativo de la imagen
	 * @param $_POST['pk'] id del registro a editar
	 * @param $_POST['value'] valor editado
	 */
	public function actionRenombrarImagen (){
		if (isset($_POST)) {
			$pk = $_POST['pk'];
			$value = $_POST['value'];
			
			$image = GaleriaImg::model()->findByPk($pk);
			$image->titulo = $value;
			
			if ($image->save()) {
				echo "1";
			} else {
				echo "0";
			}
		}
	}

	/**
	 * Borra la imagen seleccionada, se busca por id el nombre del archivo a borrar y se elimina del servidor
	 * @param id del registro a borrar
	 */
	public function actionBorrarImagen (){
		$pic = Yii::app()->request->getParam('pic');

		if (is_numeric($pic) && !empty($pic)) {
			$image = GaleriaImg::model()->findByPk($pic);

			$fileName = $image->file_name;
			$path = Yii::getPathOfAlias('assets').'/galeria/';

			$image->delete();

			if(file_exists($path.$fileName)) foreach(glob($path.$fileName) as $file) {
				if(unlink($file)) echo "1";
				else 					echo "0";
			}
		} else { echo "0"; }
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$galeria = GaleriaImg::model()->findAll(array("condition"=> "galeria_id='".$id."'",));
		$path = Yii::getPathOfAlias('assets').'/galeria/';

		if (!empty($galeria))  {
			foreach ($galeria as $key => $image) {
			
				$fileName = $image->file_name;
				if(file_exists($path.$fileName) && $fileName!="") foreach(glob($path.$fileName) as $file) {
					if(unlink($file)) 
						$image->delete();
				}
			}
			unset($galeria);
		}

		if (!isset($galeria) || empty($galeria)) {
			if ($this->loadModel($id)->delete()){
				Yii::app()->user->setFlash("alerta", "El registro ha sido eliminado de la base de datos.");
			} else Yii::app()->user->setFlash("error", "Se ha producido un error al tratar de eliminar el registro.");
		}

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Galeria('search');
		$model->unsetAttributes();  // clear any default values
		$dataProvider=$model->search();
		
		// $dataProvider=new CActiveDataProvider('Galeria');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionLista()
	{

		$model=new Galeria('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Galeria']))
			$model->attributes=$_GET['Galeria'];

		$this->render('lista',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Galeria the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Galeria::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Galeria $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='galeria-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	/**
	 *
	 */
	public function actions() {
	    return array(
	        'imageSortable' => array(
	        'class' => 'bootstrap.actions.TbSortableAction',
	        'modelName' => 'GalleryImage'
	    ));
	}
}
