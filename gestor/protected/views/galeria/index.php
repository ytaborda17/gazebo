<?php
/* @var $this GaleriaController */
/* @var $dataProvider CActiveDataProvider */

?>

<h1>Galeria</h1>

<?php 

echo CHtml::openTag('div', array('class' => 'bs-navbar-top'));
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
				array('label' => 'Cuadrícula', 'url' => '#', 'icon'=>'th-large', 'active' => true, 'visible' => Yii::app()->user->checkAccess("action_".Yii::app()->controller->id."_index")),
				array('label' => 'Lista', 'url' => array('lista'), 'icon'=>'th-list', 'visible' => Yii::app()->user->checkAccess("action_".Yii::app()->controller->id."_lista")),
				array('label' => 'Nuevo', 'url' => array('nuevo'), 'icon'=>'plus', 'visible' => Yii::app()->user->checkAccess("action_".Yii::app()->controller->id."_nuevo")),
				)
			)
		)
	));
echo CHtml::closeTag('div');

echo CHtml::openTag('div', array('class' => 'row-fluid'));
$this->widget('booster.widgets.TbThumbnails', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'pager' => array('header' => '',), 
	'template' => "{items}\n{pager}",
	'htmlOptions' => array('class'=>'mosiac'),
));
echo CHtml::closeTag('div');
?>
