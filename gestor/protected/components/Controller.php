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
	 * @var array context menu items. This property will be assigned to {@link CMenu::intl_get_error_message(oid)}.
	 */
	public $menu = array();
	

	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	

	/**
	 * @var parametro requerido por la funcion beforeAction
	 * retorna el MENU en forma de variable de session
	 * retorna el avatar del usuario logueado
	 */
	public function beforeAction($action){

		$menuList = Menu::model()->findAll('parent=0');

		$activeItem = $this->route;
		$items=array();
		foreach ($menuList as $i => $menu) {
			$model = Menu::model()->findByPk($menu->id);
			array_push($items, $model->getListed($activeItem));
		}

		Yii::app()->session['menuItems']= $items;
	
		$pic_sel = Yii::app()->db->createCommand("SELECT * from  cruge_fieldvalue 
		                                          left join cruge_field on cruge_field.idfield = cruge_fieldvalue.idfield
		                                          where cruge_fieldvalue.iduser = '".Yii::app()->user->id."' and cruge_field.fieldname ='pic'")->queryRow();
		if ($pic_sel['value']=="" || $pic_sel['value']==null || !file_exists($_SERVER['DOCUMENT_ROOT'].Yii::app()->baseUrl."/assets/users/".Yii::app()->user->id.$pic_sel['value'])) {
			Yii::app()->session['profilePicture'] = Yii::app()->baseUrl."/assets/users/none.png";
		} else Yii::app()->session['profilePicture'] = Yii::app()->baseUrl."/assets/users/".Yii::app()->user->id.$pic_sel['value'];

		return true;
	}

	/**
	 * Instrucciones a ejecutar despues de cargar una accion
	 */
	protected function afterAction($action)
	{
		
	}

	/**
	 * Ambas funciones (render y beforeRender) son usadas por los controladores para cargar archivos css o js.
	 * No requiere configuracion ni cambios.
	 * NO TOCAR!!!
	 */
	public function render($view, $data = null, $return = false)
	{
		if ($this->beforeRender()) {
			parent::render($view, $data, $return);
		}
	}
	public function beforeRender()
	{
		return true;
	}

	public function filters()
	{
		return array(array(
			'CrugeAccessControlFilter',
			));
	}

}