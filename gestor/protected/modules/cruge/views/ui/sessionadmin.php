<div class="form">
<h1><?php echo ucfirst(CrugeTranslator::t("sesiones de usuario"));?></h1>
<?php 

$superadmin_cols = array(
	'idsession',
	array('name'=>'iduser','htmlOptions'=>array('width'=>'50px')),
	array('name'=>'sessionname','filter'=>''),
	array('name'=>'status',
		'filter'=>array(1=>'Activa',0=>'Cerrada'),
		'value'=>'$data->status==1 ? \'activa\' : \'cerrada\' '),
	array('name'=>'created','type'=>'raw','value'=>'date(\'d/m/Y h:i a\',$data->created)'),
	array('name'=>'lastusage','type'=>'raw','value'=>'date(\'d/m/Y h:i a\',$data->lastusage)'),
	array('name'=>'usagecount','type'=>'number','header'=>'contador login'),
	array('name'=>'expire','type'=>'raw','value'=>'date(\'d/m/Y h:i a\',$data->expire)'),
	'ipaddress',
	array(
		'class'=>'CButtonColumn',
		'template' => '{borrar}',
		'deleteConfirmation'=>CrugeTranslator::t("Esta seguro de eliminar esta sesion ?"),
		'buttons' => array(
			'borrar'=>array(
				'label'=>'',
				'options'=>array('class'=>'glyphicon glyphicon-trash','title'=>CrugeTranslator::t("eliminar sesion")),
				'url'=>'array("sessionadmindelete","id"=>$data->getPrimaryKey())',
				'click' => 'function(){return confirm("¿Borrar registro?")}',
			),
		),	
	)	
);
$normal_cols = array(
	// 'idsession',
	// array('name'=>'iduser','htmlOptions'=>array('width'=>'50px')),
	array('name'=>'sessionname','filter'=>''),
	array('name'=>'status',
		'filter'=>array(1=>'Activa',0=>'Cerrada'),
		'value'=>'$data->status==1 ? \'activa\' : \'cerrada\' '),
	array('name'=>'created','type'=>'raw','value'=>'date(\'d/m/Y h:i a\',$data->created)'),
	array('name'=>'lastusage','type'=>'raw','value'=>'date(\'d/m/Y h:i a\',$data->lastusage)'),
	// array('name'=>'usagecount','type'=>'number','header'=>'contador login'),
	array('name'=>'expire','type'=>'raw','value'=>'date(\'d/m/Y h:i a\',$data->expire)'),
	'ipaddress',
);

if (Yii::app()->user->isSuperAdmin) $cols = $superadmin_cols;
else $cols = $normal_cols;

$this->widget(
	'booster.widgets.TbGridView',
	array(
		'type' => 'condensed',
		'responsiveTable' => true,
		'dataProvider' => $dataProvider,
		'template' => "{items}\n{pager}",
		'columns' => $cols,
		'filter'=>$model,
		)
	);

?>

</div>