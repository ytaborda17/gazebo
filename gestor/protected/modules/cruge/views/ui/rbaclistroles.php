<?php  

/*switch (CAuthItem::TYPE_ROLE) {
	case '1':
		$rbac_title = 'Tareas';
		break;
	case '2':
		$rbac_title = 'Roles';
		break;
	case '3':
		$rbac_title = 'Operaciones';
		break;
	default:
		# code...
		break;
}*/

$this->pageTitle = 'Roles - ' . Yii::app()->name;

?>

<h1><?php echo ucfirst(CrugeTranslator::t("roles"));?></h1>

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
				array('label' => 'Nuevo', 'url' => Yii::app()->user->ui->getRbacAuthItemCreateUrl(CAuthItem::TYPE_ROLE), 'icon'=>'plus'),
				)
			)
		)
	));
echo CHtml::closeTag('div');

$this->renderPartial('_listauthitems',array('dataProvider'=>$dataProvider),false);?>