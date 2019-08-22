<?php  

$this->pageTitle = ucfirst(CrugeTranslator::t("campos personalizados")) . ' - ' . Yii::app()->name ;

?>

<h1><?php echo ucfirst(CrugeTranslator::t("campos personalizados"));?></h1>


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
				array('label' => 'Lista', 'url' => '#', 'icon'=>'th-list', 'active' => true,),
				array('label' => 'Nuevo', 'url' => Yii::app()->baseUrl.'/nuevo-campo_perfil', 'icon'=>'plus', ),
				)
			)
		)
	));
echo CHtml::closeTag('div');
?>


<div class="form">

<?php 
/*
<div class="buttons" style="padding-top:10px;">
	<?php echo Yii::app()->user->ui->getFieldAdminCreateLink(CrugeTranslator::t("Crear un nuevo campo personalizado")); ?>
	<br>
	<br>
</div>
*/
$cols = array();
// presenta los campos de ICrugeField
foreach(Yii::app()->user->um->getSortFieldNamesForICrugeField() as $key=>$fieldName){
	$value=null;
	if($fieldName == 'required')
		$value = '$data->getRequiredName()';
	$cols[] = array('name'=>$fieldName,'value'=>$value);
}
$cols[] = array(
	'class'=>'CButtonColumn',
	'deleteConfirmation'=>CrugeTranslator::t("Esta seguro de eliminar este campo ?"),
	'template'=>'{editar} {borrar}',
	'buttons'=>array(
		'editar' => array(
			'label'=>'',
			'options'=>array('class'=>'glyphicon glyphicon-edit','title'=>'Editar'),
			'url'=>'array("fieldsadminupdate","id"=>$data->getPrimaryKey())'
		),
		'borrar' => array(
			'label'=>'',
			'options'=>array('class'=>'glyphicon glyphicon-trash','title'=>'Borrar'),
			'url'=>'array("fieldsadmindelete","id"=>$data->getPrimaryKey())',
			'click' => 'function(){return confirm("¿Borrar registro?")}',
		),
	),	
);
$this->widget('booster.widgets.TbGridView', array(
	'dataProvider'=>$dataProvider,
	'pager' => array('header' => '',), 
	'template' => "{items}\n{pager}",
	'filter'=>$model,
	'columns'=>$cols,
));
?>
</div>

