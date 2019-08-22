<?php
/* @var $this ServiciosController */
/* @var $model Servicio */
?>

<h1>Servicios <small><?php echo $model->titulo; ?></small></h1>

<?php 
echo CHtml::openTag('div', array('class' => 'bs-navbar-top'));
$this->widget('booster.widgets.TbNavbar',array(
	'brand' => 'Opciones',
	'brandUrl' => '#',
	  // 'brandOptions' => array('style' => 'width:auto; margin-left:0px;'),
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
				array('label' => 'Nuevo', 'url' => array('nuevo'), 'icon'=>'plus', 'visible' => Yii::app()->user->checkAccess("action_".Yii::app()->controller->id."_nuevo")),
				array('label' => 'Detalle', 'url' => '#', 'active' => true, 'icon'=>'eye-open', 'visible' => Yii::app()->user->checkAccess("action_".Yii::app()->controller->id."_detalle")),
				array('label' => 'Editar', 'url' => array('editar', 'id'=>$model->id), 'icon'=>'edit', 'visible' => Yii::app()->user->checkAccess("action_".Yii::app()->controller->id."_editar")),
				array('label' => 'Borrar', 'url' => array('delete', 'id'=>$model->id), 'icon'=>'trash', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Borrar registro?'), 'visible' => Yii::app()->user->checkAccess("action_".Yii::app()->controller->id."_delete")),
				)
			)
		)
	));
echo CHtml::closeTag('div');
?>

<div class="view-detail">
<?php $this->widget('booster.widgets.TbDetailView', array(
	'type' => 'condensed',
	'data'=>$model,
	'attributes'=>array(
		// 'id',
		'titulo',
		'descripcion',
		'estatus' => array(
			'name'   => 'estatus',
			'type'   => 'raw',
			'value'  => $model->estatus ? 'Activo' : 'Inactivo', 
			),
		'media' => array(
			'label'   => 'Imagenes del rotador',
			'type'   => 'raw',
			'value'  => Servicio::model()->getImagenes($model->id), 
			),
	),
)); ?>
</div>