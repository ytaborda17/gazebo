<?php
	/*
		$model:  es una instancia que implementa a CrugeAuthItemEditor
	*/

$this->pageTitle = 'Editar '.CrugeTranslator::t($model->categoria) . ' - ' . Yii::app()->name;
	
?>

<h1><?php echo ucfirst(CrugeTranslator::t("editar")." ".CrugeTranslator::t($model->categoria));?></h1>

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
				array('label' => 'Lista', 'url' => $this->createAbsoluteUrl('ui/rbaclistroles'), 'icon'=>'th-list'),
				array('label' => 'Nuevo', 'url' => Yii::app()->user->ui->getRbacAuthItemCreateUrl(CAuthItem::TYPE_ROLE), 'icon'=>'plus'),
				array('label' => 'Editar', 'url' => '#', 'icon'=>'edit', 'active' => true),
				)
			)
		)
	));
echo CHtml::closeTag('div');

$this->renderPartial('_authitemform',array('model'=>$model),false);?>