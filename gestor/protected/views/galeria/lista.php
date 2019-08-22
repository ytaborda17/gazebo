<?php
/* @var $this GaleriaController */
/* @var $model Galeria */

/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form .panel-body').slideToggle('fast');
	return false;
});

$('.search-form form').submit(function(){
	$('#galeria-grid').yiiGridView('editar', {
		data: $(this).serialize()
	});
	return false;
});

$('span.required').remove();

$('.search-form input').each(function( i ) {
	if ($(this).val()!='') {
		$('.search-form .panel-body').show();
		breack;
	} else {
		$('.search-form .panel-body').hide();
	}
});
");*/
?>

<h1>Galeria</h1>

<?php 	echo CHtml::openTag('div', array('class' => 'bs-navbar-top'));
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
					array('label' => 'Lista', 'url' => '#', 'icon'=>'th-list', 'active' => true, 'visible' => Yii::app()->user->checkAccess("action_".Yii::app()->controller->id."_lista")),
					array('label' => 'Nuevo', 'url' => array('nuevo'), 'icon'=>'plus', 'visible' => Yii::app()->user->checkAccess("action_".Yii::app()->controller->id."_nuevo")),
					)
				)
			)
		));
	echo CHtml::closeTag('div');
	// Eliminar comentario para activar formulario de busqueda en a parte superior de la lista
	/*$this->widget = array('booster.widgets.TbPanel',
	 	array(
	     	'title' => CHtml::link('Busqueda avanzada <span class="arrow-down"></span>','#',array('class'=>'search-button')), //'Busqueda avanzada',
	     	'headerIcon' => 'search',
	     	'content' => $this->renderPartial('_search',array('model'=>$model,),true),
	     	'htmlOptions' => array('class' => 'search-form')
	 	)
	);*/
?>

<?php $this->widget('booster.widgets.TbExtendedGridView', array(
	'id'=>'galeria-grid',
	'dataProvider'=>$model->search(),
	'responsiveTable' => true,
	'template' => "{items}\n{pager}",
	'filter'=>$model,
	'sortableRows'=>true,
	'type'=>'striped',
	'afterSortableUpdate' => 'js:function(id, position){ 
		console.log("id: "+id+", position:"+position);
	}',
	'sortableAttribute' => 'prioridad',
	// 'sortableAjaxSave' => true,
	// 'sortableAction' => 'galeria/imageSortable',
	'columns'=>array(
		// 'id',
		'nombre',
		// 'descripcion',
		'prioridad'=>array(
			'htmlOptions'=>array('width'=>'120px'),
			'name'=>'prioridad',
			'type'=>'raw',
			'value'  => function($model){
				$max_stars = 5;
				$estrellas ="";
				for ($i=0; $i < $max_stars; $i++) { 
					$estrellas .= '<div class="star-rating '.($i<$model->prioridad ? ' star-rating-on' : '').'"></div>';
				}
				return $estrellas;
			}, 
			'filter'=> false,
		),
		'estatus' => array(
			'htmlOptions'=> array('width'=>'120px'),
			'name' => 'estatus',
			'type' => 'raw',
			'value' => '$data->estatus ? "Activo" : "Inactivo"',
			'filter'=> CHtml::dropDownList(
				'Galeria[estatus]', 
				$model->estatus, 
				array(
					'1'=>'Activo',
					'0'=>'Inactivo',
					), 
				array('empty'=> '', 'class'=>'form-control')
				),
			),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{detalle} {editar} {borrar}',
			'buttons'=>array(
				'detalle' => array(
					'label'=>'',
					'options'=>array('class'=>'glyphicon glyphicon-eye-open','title'=>'Detalle'),
					'url'=>'Yii::app()->createUrl("galeria/detalle", array("id"=>$data->id))',
					'visible' => Yii::app()->user->checkAccess("action_galeria_detalle") ? 'true' : 'false' ,
				),
				'editar' => array(
					'label'=>'',
					'options'=>array('class'=>'glyphicon glyphicon-edit','title'=>'Editar'),
					'url'=>'Yii::app()->createUrl("galeria/editar", array("id"=>$data->id))',
					'visible' => Yii::app()->user->checkAccess("action_galeria_editar") ? 'true' : 'false' ,
				),
				'borrar' => array(
					'label'=>'',
					'options'=>array('class'=>'glyphicon glyphicon-trash','title'=>'Borrar'),
					'url'=>'Yii::app()->createUrl("galeria/delete", array("id"=>$data->id))',
					'visible' => Yii::app()->user->checkAccess("action_galeria_delete") ? 'true' : 'false' ,
					'click' => 'function(){return confirm("¿Borrar registro?")}',
				),
			),
		),
	),
)); ?>
