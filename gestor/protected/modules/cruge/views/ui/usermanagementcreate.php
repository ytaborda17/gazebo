<?php  

	/*
		$model:  es una instancia que implementa a ICrugeStoredUser
	*/

$this->pageTitle = ucfirst(CrugeTranslator::t("nuevo usuario")) . ' - ' . Yii::app()->name;

?>
<h1><?php echo ucfirst(CrugeTranslator::t("nuevo usuario"));?></h1>

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
				array('label' => 'Lista', 'url' => $this->createAbsoluteUrl('ui/usermanagementadmin'), 'icon'=>'th-list'),
				array('label' => 'Nuevo', 'url' => '#', 'icon'=>'plus', 'active' => true, ),
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
	
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
			<?php echo $form->textFieldGroup( $model, 'username', array( 'prepend' => '<i class="glyphicon glyphicon-user"></i>' ) ); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
			<?php echo $form->textFieldGroup( $model, 'email', array( 'prepend' => '<i class="glyphicon glyphicon-envelope"></i>' ) ); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
			<?php 
				echo $form->passwordFieldGroup( $model, 'newPassword', array( 'prepend' => '<i class="glyphicon glyphicon-lock"></i>' ) ); 
				$this->widget('booster.widgets.TbButton',array(
						'label' => CrugeTranslator::t("Generar una nueva clave"),
						'buttonType' => 'ajaxSubmit',
						'url' => Yii::app()->user->ui->ajaxGenerateNewPasswordUrl,
						'ajaxOptions' => array(
							'type' => 'POST',
							'success' => 'function(data) { 
								$("#CrugeStoredUser_newPassword").val(data)
							}',
							'error' => 'function(e) { 
								alert("error: "+e.responseText);
							}',
							)
						)
					);

			?>
			<br>
			<br>
		</div>
	</div>


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
