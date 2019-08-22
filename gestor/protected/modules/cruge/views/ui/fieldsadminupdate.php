<?php
	/*
		$model:  es una instancia que implementa a ICrugeField
	*/
?>
<h1><?php echo ucfirst(CrugeTranslator::t(	(($model->isNewRecord==1) ? "Nuevo campo personalizado" :"Editar campo personalizado")));?></h1>

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
				array('label' => 'Lista', 'url' => Yii::app()->baseUrl.'/campos-perfil', 'icon'=>'th-list',),
				array('label' => 'Nuevo', 'url' => Yii::app()->baseUrl.'/nuevo-campo_perfil', 'icon'=>'plus', 'active'=>(($model->isNewRecord==1) ? true : false)),
				(($model->isNewRecord!=1) ? array('label' => 'Editar', 'url' => '#', 'icon'=>'edit', 'active' => true) : array())
				)
			)
		)
	));
echo CHtml::closeTag('div');
?>
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
		<?php 

		$this->widget(
			'booster.widgets.TbTabs',
			array(
				'type' => 'tabs', 
				'tabs' => array(
				array(
					'label' => ucfirst(CrugeTranslator::t("datos del campo")),
					'content'=>$this->renderPartial("_fieldsdata", array('model' => $model, 'form' => $form),true), 
					'active' => true,
					),
				array(
					'label' => ucfirst(CrugeTranslator::t("datos del contenido")),
					'content'=>$this->renderPartial("_fieldscontent", array('model' => $model, 'form' => $form),true), 
					),
				array(
					'label' => ucfirst(CrugeTranslator::t("datos de validacion")),
					'content'=>$this->renderPartial("_fieldsvalidate", array('model' => $model, 'form' => $form),true), 
					),
				),
				)
			);

		?>
	</fieldset>
	<div class="form-actions">
		<?php $this->widget(
			'booster.widgets.TbButton',
			array(
				'buttonType' => 'submit',
				'icon' => 'floppy-disk',
				'context' => 'primary',
				'label' => 'Guardar',
			)
		); ?>
	</div>

	<?php
		$this->endWidget();
		unset($form);
	?>
</div>