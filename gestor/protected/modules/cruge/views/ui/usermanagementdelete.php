<?php  
	/*
		$model:  es una instancia que implementa a ICrugeStoredUser
	*/

	$this->pageTitle = ucfirst(CrugeTranslator::t("eliminar usuario")) . ' - ' . Yii::app()->name;

?>

<h1><?php echo ucfirst(CrugeTranslator::t("eliminar usuario"));?></h1>

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
				array('label' => 'Lista', 'url' => $this->createAbsoluteUrl('ui/usermanagementadmin'), 'icon'=>'th-list',),
				array('label' => 'Nuevo', 'url' => $this->createAbsoluteUrl('ui/usermanagementcreate'), 'icon'=>'plus', ),
				array('label' => 'Borrar', 'url' => '#', 'icon'=>'trash', 'active' => true,),
				)
			)
		)
	));
echo CHtml::closeTag('div');
?>

<h2><?php echo $model->username.', '.$model->email; ?></h2>

<div class="form">
	<?php /** @var TbActiveForm $form */
	$form = $this->beginWidget(
		'booster.widgets.TbActiveForm',
		array(
			'id' => 'crugestoreduser-form',
			'type' => 'vertical',
			'htmlOptions' => array(
				'enctype' => 'multipart/form-data',
			),
		)
	); ?>
	<fieldset>
		<div class="row">
			<?php $this->widget(
			    'booster.widgets.TbLabel',
			    array(
			        'context' => 'danger',
			        'label' => ucfirst(CrugeTranslator::t("marque la casilla para confirmar la eliminacion")).':',
			    )
			); ?>
			<br>
		</div>
		<div class="row"><?php echo $form->checkboxGroup($model, 'deleteConfirmation'); ?></div>

	</fieldset>

	<div class="form-actions row">
		<?php $this->widget(
			'booster.widgets.TbButton',
			array(
				'buttonType' => 'submit',
				'context' => 'primary',
				'icon' => 'trash',
				'label' => 'Eliminar usuario'
			)
		); ?>
	</div>

	<?php
	$this->endWidget();
	unset($form);
	?>
</div>