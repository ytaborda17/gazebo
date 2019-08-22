<?php
/* @var $this EmpresaController */
/* @var $model Empresa */


/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form .panel-body').slideToggle('fast');
	return false;
});

$('.search-form form').submit(function(){
	$('#empresa-grid').yiiGridView('editar', {
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

<h1>Empresa</h1>

<?php /*$this->widget(
	'booster.widgets.TbButtonGroup',
	array(
		'buttons' => array(
			array(
				'buttonType' => 'link', 
				'label' => 'Cuadricula', 
				'icon' => 'th-large', 
				'disabled' => !Yii::app()->user->checkAccess('action_empresa_index'),
				'htmlOptions' => array(
					'title' => 'Lista',
					'class' => Yii::app()->user->checkAccess('action_empresa_index') ? '' : 'invisible',
					), 
				'url' => Yii::app()->createUrl('empresa/index'),
				),
			array(
				'buttonType' => 'link', 
				'label' => 'Nuevo', 
				'icon' => 'plus', 
				'disabled' => !Yii::app()->user->checkAccess('action_empresa_nuevo'),
				'htmlOptions' => array(
					'title' => 'Nuevo',
					'class' => Yii::app()->user->checkAccess('action_empresa_nuevo') ? '' : 'invisible',
					), 
				'url' => Yii::app()->createUrl('empresa/nuevo'),
				),
			),	
		)
	); */

	// Eliminar comentario para activar formulario de busqueda en a parte superior de la lista
	// replace firs line, with this---->  = widget('booster.widgets.TbPanel',
	/* $this->widgetwidget('booster.widgets.TbPanel',
	 	array(
	     	'title' => CHtml::link('Busqueda avanzada <span class="arrow-down"></span>','#',array('class'=>'search-button')), //'Busqueda avanzada',
	     	'headerIcon' => 'search',
	     	// 'content' => $this->renderPartial('_search',array('model'=>,),true),
	     	'htmlOptions' => array('class' => 'search-form')
	 	)
	);*/
?>

<?php $this->widget('booster.widgets.TbGridView', array(
	'id'=>'empresa-grid',
	'dataProvider'=>$model->search(),
	'responsiveTable' => true,
	'pager' => array('header' => '',), 
	'template' => "{items}\n{pager}",
	'filter'=>$model,
	'columns'=>array(
		// 'id',
		'nombre',
		'rif',
		'telefono',
		'direccion',
		'email',
		/*
		'bussines',
		'keywords',
		'metatags',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{detalle} {editar} {borrar}',
			'buttons'=>array(
				'detalle' => array(
					'label'=>'',
					'options'=>array('class'=>'glyphicon glyphicon-eye-open','title'=>'Detalle'),
					'url'=>'Yii::app()->createUrl("empresa/detalle", array("id"=>$data->id))',
					'visible' => Yii::app()->user->checkAccess("action_empresa_detalle") ? 'true' : 'false' ,
				),
				'editar' => array(
					'label'=>'',
					'options'=>array('class'=>'glyphicon glyphicon-edit','title'=>'Editar'),
					'url'=>'Yii::app()->createUrl("empresa/editar", array("id"=>$data->id))',
					'visible' => Yii::app()->user->checkAccess("action_empresa_editar") ? 'true' : 'false' ,
				),
				'borrar' => array(
					'label'=>'',
					'options'=>array('class'=>'glyphicon glyphicon-trash','title'=>'Borrar'),
					'url'=>'Yii::app()->createUrl("empresa/delete", array("id"=>$data->id))',
					'visible' => Yii::app()->user->checkAccess("action_empresa_delete") ? 'true' : 'false' ,
					'click' => 'function(){return confirm("¿Borrar registro?")}',
				),
			),
		),
	),
)); ?>
