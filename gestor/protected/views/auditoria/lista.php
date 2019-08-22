<?php
/* @var $this AuditoriaController */
/* @var $model AppAuditoria */


/*Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#app-auditoria-grid').yiiGridView('editar', {
		data: $(this).serialize()
	});
	return false;
});
");*/
?>

<h1>Auditoria</h1>

<div id="detalle-auditoria"></div> 
<?php 
	// Eliminar comentario para activar formulario de busqueda en a parte superior de la lista
	/*$this->widget('booster.widgets.TbPanel',
	 	array(
	     	'title' => CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')), //'Busqueda avanzada',
	     	'headerIcon' => 'search',
	     	'content' => $this->renderPartial('_search',array('model'=>$model,),true),
	     	'htmlOptions' => array('class' => 'search-form')
	 	)
	);*/


	$this->widget(
		'booster.widgets.TbGridView',
		array(
			'responsiveTable' => true,
			'dataProvider'=>$model->search(),
			'template'=>'{items}{pager}',
			'filter'=>$model,
			'afterAjaxUpdate'=>'function(id, data) {$.fn.setPreviewLinksHandler(id, data);}',
			'columns'=>array(
				// array(
				// 	'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
				// 	'htmlOptions'=> array('width'=>'60px'),
				// 	),
				'action' => array(
					'name'   => 'action',
					'type'   => 'raw',
					'filter' => array(
						'CREAR' => 'CREAR',
						'EDITAR' => 'EDITAR',
						'BORRAR' => 'BORRAR',
						),
					),
				'model',
				'model_id',
				'field',
				'time_stamp'=>array(
					'name'=>'time_stamp',
					'type'   => 'raw',
					'value'   => array($model,'getTime'),
					),
				'user_id'=>array(
					'name'   => 'user_id',
					'type'   => 'raw',
					'value'  => array($model,'getUser'), 
					'filter' => CHtml::listData(Crugeuser::model()->findAll(array('order'=>'iduser')), 'iduser', 'username'),
					),
				array(
					'class'=>'CButtonColumn',
					'template'=>'{detalle}',
					'buttons'=>array(
						'detalle' => array(
							'label'=>'',
							'url'=>'Yii::app()->createUrl("Auditoria/detalle", array("id"=>$data->id))',
							'options' => array(
								'name'=>'ajax-link',
								'ajax-pointer'=>'#detalle-auditoria',
								'title'=>'Detalle',
								'class'=>'glyphicon glyphicon-eye-open',
								),
							),
						),
					),
				),
			)
);

?>