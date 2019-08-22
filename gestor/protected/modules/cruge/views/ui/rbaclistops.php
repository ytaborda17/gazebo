<h1><?php echo ucfirst(CrugeTranslator::t("operaciones"));?></h1>

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
				array('label' => 'Lista', 'url' => $this->createAbsoluteUrl('ui/rbaclistops'), 'icon'=>'th-list', 'active' => true),
				array('label' => 'Nuevo', 'url' => Yii::app()->user->ui->getRbacAuthItemCreateUrl(CAuthItem::TYPE_OPERATION), 'icon'=>'plus'),
				)
			)
		)
	));
echo CHtml::closeTag('div');

echo CrugeTranslator::t("Filtrar por Controlador:");
$ar = array(
	'0'=>CrugeTranslator::t('Ver Todo'),
	'1'=>CrugeTranslator::t('Otras'),
	'2'=>CrugeTranslator::t('Cruge'),
	'3'=>CrugeTranslator::t('Controladoras'),
);
foreach(Yii::app()->user->rbac->enumControllers() as $c)
	$ar[$c] = $c;
// build list
echo "<ul class='cruge_filters'>";
foreach($ar as $filter=>$text) echo "<li>".CHtml::link($text, array('/cruge/ui/rbaclistops','filter'=>$filter))."</li>";
echo "</ul>";

$this->renderPartial('_listauthitems'
	,array('dataProvider'=>$dataProvider)
	,false
	);

?>