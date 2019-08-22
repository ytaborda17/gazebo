<?php  

$this->pageTitle = 'Usuarios - ' . Yii::app()->name ;

?>


<h1><?php echo ucfirst(CrugeTranslator::t('admin', 'Users'));?> <small>administrar usuarios</small> </h1>

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
				array('label' => 'Lista', 'url' => '#', 'icon'=>'th-list', 'active' => true),
				array('label' => 'Nuevo', 'url' => $this->createAbsoluteUrl('ui/usermanagementcreate'), 'icon'=>'plus', ),
				)
			)
		)
	));
echo CHtml::closeTag('div');
?>

<div class="form">

<?php 

$this->widget('booster.widgets.TbAlert', array(
	'fade' => true,
	'closeText' => '&times;', // false equals no close link
	'events' => array(),
	'htmlOptions' => array(),
	'userComponentId' => 'user',
	'alerts' => array( // configurations per alert type
	  // success, info, warning, error or danger
		'success' => array('closeText' => '&times;'),
		'info' => array('closeText' => '&times;'),
		'warning' => array('closeText' => false),
		'error' => array('closeText' => false)
		),
));

?>

<?php 

$cols = array();

// presenta los campos de ICrugeStoredUser
foreach(Yii::app()->user->um->getSortFieldNamesForICrugeStoredUser() as $key=>$fieldName){
	if ($fieldName != "iduser") {
		$value=null; // default
		$filter=null; // default, textbox
		$type='text';
		if($fieldName == 'state'){
			$value = '$data->getStateName()';
			$filter = Yii::app()->user->um->getUserStateOptions();
		}
		if($fieldName == 'logondate'){
			$type='datetime';
		}
		$cols[] = array('name'=>$fieldName,'value'=>$value,'filter'=>$filter,'type'=>$type);
	}
}
	
$cols[] = array(
	'class'=>'CButtonColumn',
	
	'template' => '{editar} {borrar}',
	'deleteConfirmation'=>CrugeTranslator::t('admin', 'Are you sure you want to delete this user'),
	'buttons' => array(
		'editar'=>array(
			'label'=>'',
			'options'=>array('class'=>'glyphicon glyphicon-edit','title'=>'Editar'),
			'url'=>'array("usermanagementupdate","id"=>$data->getPrimaryKey())',
		),
		'borrar'=>array(
			'label'=>'',
			'options'=>array('class'=>'glyphicon glyphicon-trash','title'=>'Borrar'),
			'url'=>'array("usermanagementdelete","id"=>$data->getPrimaryKey())',
			'click' => 'function(){return confirm("¿Borrar registro?")}',
		),
	),	
);

$this->widget(
	'booster.widgets.TbGridView',
	array(
		'responsiveTable' => true,
		'dataProvider' => $dataProvider,
		'template' => "{items}\n{pager}",
		'columns' => $cols,
		'filter'=>$model,
		)
	);

?>
</div>