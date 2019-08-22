<?php
/* @var $this ContactoTipoController */
/* @var $model ContactoTipo */
?>

<h1>Nuevo</h1>
<?php	echo CHtml::openTag('div', array('class' => 'bs-navbar-top'));
	$this->widget('booster.widgets.TbNavbar',array(
		'brand' => 'Opciones',
		'brandUrl' => '#',
		'fixed' => 'top',
		'fluid' => true,
		'htmlOptions' => array('style' => 'position:absolute; top:70px;'),
		'items' => array(
			array(
				'class' => 'booster.widgets.TbMenu',
				'type' => 'navbar',
				'items' => array(
				array('label' => 'Cuadrícula', 'url' => array('index'), 'icon'=>'th-large', 'visible' => Yii::app()->user->checkAccess("action_".Yii::app()->controller->id."_index")),
					array('label' => 'Lista', 'url' => array('lista'), 'icon'=>'th-list', 'visible' => Yii::app()->user->checkAccess("action_".Yii::app()->controller->id."_lista")),
					array('label' => 'Nuevo', 'url' => '#', 'icon'=>'plus', 'active' => true, 'visible' => Yii::app()->user->checkAccess("action_".Yii::app()->controller->id."_nuevo")),
					)
				)
			)
		));
	echo CHtml::closeTag('div');
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>