<?php
	/* formulario de edicion de CrugeSystem

		argumento:

		$model: instancia de ICrugeSession
	*/

	$this->pageTitle = 'Sistema - ' . Yii::app()->name;

?>

<h1>Sistema <small>Opciones del sistema</small> </h1>

<?php
	if(Yii::app()->user->hasFlash('systemFormFlash'))  {
		echo "<div class='flash-success'>";
		echo Yii::app()->user->getFlash('systemFormFlash');
		echo "</div>";
	}
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
				'type' => 'tabs', // 'tabs' or 'pills'
				'tabs' => array(
					array(
						'label' => ucfirst(CrugeTranslator::t("opciones de sesion")),
						'content'=>$this->renderPartial("_systemsessionoptions", array('model' => $model, 'form' => $form),true), 
						'active' => true,
						),
					array(
						'label' => ucfirst(CrugeTranslator::t("opciones de registro de usuarios")),
						'content'=>$this->renderPartial("_systemregisteroptions", array('model' => $model, 'form' => $form),true), 
						),
					array(
						'label' => ucfirst(CrugeTranslator::t("terminos y condiciones de registro")),
						'content'=>$this->renderPartial("_systemtermsoptions", array('model' => $model, 'form' => $form),true), 
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
				'context' => 'primary',
				'icon' => 'floppy-disk',
				'label' => 'Guardar',
			)
		); ?>
	</div>

	<?php
		$this->endWidget();
		unset($form);
	?>
</div>