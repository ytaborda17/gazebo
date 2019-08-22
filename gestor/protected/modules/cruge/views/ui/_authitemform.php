<?php 
	/* formulario comun para create y update
	
		argumento:
		
		$model: instancia de CrugeAuthItemEditor
	*/
?>

<div class="form">

	<?php  

	$form = $this->beginWidget(
		'booster.widgets.TbActiveForm',
		array(
			'id'=>'registration-form',
			'enableClientValidation'=>false,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
			'type' => 'vertical',
		)
	); 

	?>
	
	<fieldset>
		
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
				<?php echo $form->textFieldGroup( $model, 'name'); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
				<?php echo $form->textFieldGroup( $model, 'description'); ?>
			</div>
		</div>
		<?php if ($model->categoria  == "tarea"): ?>
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
					<div class='hint'>Tip: precede este valor con un ":" para que la tarea sea exportada como un menuitem al usar<br/> <span class='code'>
					Yii::app()->user->rbac->getMenu();</span> y finalizala con un {nombremenuitem} para que quede dentro de un -nombremenuitem-.
					ejemplo: <span class='code'>":Edita tu Perfil{menuprincipal}"</span></div>
				</div>
			</div>
		<?php endif; ?>

	
		<?php  
			/*echo CHtml::openTag('div', array('class' => 'row'));
			
			echo $form->textAreaGroup( 
				$model, 
				'businessRule',
				array(
					// 'wrapperHtmlOptions' => array('class' => 'col-sm-5',),
					'hint' => CrugeTranslator::t("define una regla de negocio que sera ejecutada cada vez que este item sea evaluado mediante una llamada a checkAccess, el argumento params es entregado a checkAccess de forma opcional:")
					)
				);
			$this->widget(
				'booster.widgets.TbBadge',
				array(
					'label' => CrugeTranslator::t("regla de ejemplo:"),
					)
				);
			echo '<pre>return Yii::app()->user->id==$params["post"]->authID;</pre>';
			echo '<pre> $params= ...'.CrugeTranslator::t("cualquier cosa").'...; <br/> if(Yii::app()->user->checkAccess('.$model->name.', $params)){ ... }</pre>';

			echo CHtml::closeTag('div');	*/		
		?>
	

	</fieldset>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton',array(
				'buttonType' => 'submit',
				'context' => 'primary',
				'icon' => 'floppy-disk',
				'label' => 'Guardar',
			)); ?>
	</div>
<?php 

$this->endWidget(); 
unset($form);

?>

</div>

