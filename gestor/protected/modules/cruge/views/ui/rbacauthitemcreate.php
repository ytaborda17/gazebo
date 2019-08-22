<?php
	/*
		$model:  es una instancia que implementa a CrugeAuthItemEditor
	*/

switch (Yii::app()->request->getParam('type')) {
	case '0':
		$url = "rbaclistops";
		break;
	// case '1':
	// 	$url = "Tareas"; // =P
	// 	break;
	case '2':
		$url = "rbaclistroles";
		break;
}
$this->pageTitle = 'Nuevo '.CrugeTranslator::t($model->categoria) . ' - ' . Yii::app()->name;

?>

<h1><?php echo ucfirst(CrugeTranslator::t("Creando")." ".CrugeTranslator::t($model->categoria));?></h1>

<?php 

echo CHtml::openTag('div', array('class' => 'bs-navbar-top'));
$this->widget('booster.widgets.TbNavbar',array(
	'brand' => 'Opciones',
	'fixed' => 'top',
	'fluid' => true,
	'htmlOptions' => array('style' => 'position:absolute; top:70px;'),
	'items' => array(
		array(
			'class' => 'booster.widgets.TbMenu',
			'type' => 'navbar',
			'items' => array(
				array('label' => 'Lista', 'url' => $this->createAbsoluteUrl('ui/'.$url), 'icon'=>'th-list'),
				array('label' => 'Nuevo', 'url' => '#', 'icon'=>'plus', 'active' => true),
				)
			)
		)
	));
echo CHtml::closeTag('div');

$this->renderPartial('_authitemform',array('model'=>$model),false);?>