<?php  
	/*
		$model:  es una instancia que implementa a CrugeAuthItemEditor
	*/

	$this->pageTitle = ucfirst(CrugeTranslator::t("eliminar usuario")) . ' - ' . Yii::app()->name;

	switch (CAuthItem::TYPE_ROLE) {
		case '0':
			$type_role = "operación";
			break;
		case '1':
			$type_role = "tarea";
			break;
		case '2':
			$type_role = "rol";
			break;
	}

?>
<div class="contentTop">
	<ul class="operations">
		<li><?php echo CHtml::link('<span class="icon-list"></span> Lista', $this->createAbsoluteUrl('ui/rbaclistroles')); ?></li>
		<li><?php echo CHtml::link('<span class="icon-new"></span>'.CrugeTranslator::t("Nuevo"),Yii::app()->user->ui->getRbacAuthItemCreateUrl(CAuthItem::TYPE_ROLE));?></li>
	</ul>	
</div>

<h1><?php echo ucfirst(CrugeTranslator::t("eliminar").' '.$type_role);?></h1>


<h2><?php echo $model->name; ?></h2>

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
			    'booster.widgets.TbBadge',
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
				'label' => 'Eliminar'
			)
		); ?>
	</div>

	<?php
	$this->endWidget();
	unset($form);
	?>
</div>