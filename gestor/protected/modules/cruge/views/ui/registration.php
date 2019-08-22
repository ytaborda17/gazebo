<?php
/*
 * $model:  es una instancia que implementa a ICrugeStoredUser
 */

$this->pageTitle=Yii::app()->name . " - Registro";
Yii::app()->getClientScript()->registerCssFile(Yii::app()->theme->baseUrl.'/css/logon.css');
Yii::app()->clientScript->registerScriptFile('https://www.google.com/recaptcha/api.js',CClientScript::POS_END);

?>

<div class="login_form">

<?php 

$form = $this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'registration-form',
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'type' => 'vertical',
)); 

?>

	<fieldset>
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
				<h4>Datos de la cuenta</h4>
			</div>
		</div>
		
		<div class="row">
			<?php foreach (CrugeUtil::config()->availableAuthModes as $authmode){ ?>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
					<?php echo $form->textFieldGroup($model,$authmode,array(
						'labelOptions' => array('label' => false),
						'widgetOptions' => array('options' => array('language' => 'es',),),
						'wrapperHtmlOptions' => array('class' => 'col-sm-5',),
						'prepend' => '<i class="glyphicon glyphicon-'.($authmode=="username" ? 'user' : 'envelope').'"></i>'
					));?>
				</div>
			<?php } ?>
<!-- 		</div>

		<div class="row"> -->
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				<?php echo $form->passwordFieldGroup($model,'newPassword',array(
					'labelOptions' => array('label' => false),
					'widgetOptions' => array('options' => array('language' => 'es',),),
					'wrapperHtmlOptions' => array('class' => 'col-sm-5',),
					'prepend' => '<i class="glyphicon glyphicon-lock"></i>',
					'hint' => "Puede usar letras o digitos o los caracteres @#$%. Minimo 6 simbolos.",
				));?>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
				<h4>Datos del perfil</h4>
			</div>
		</div>
		
		<?php  // inicio de campos extra definidos por el administrador del sistema 
		if(count($model->getFields()) > 0){ ?>
			<div class="row">
				<?php foreach ($model->getFields() as $f): ?>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
						<?php if ($f->fieldname!="pic"): ?>
							<div class="form-group">
								<?php echo Yii::app()->user->um->getInputField($model,$f); ?>
							</div>		
						<?php endif; ?>
					</div>		
				<?php endforeach; ?>
			</div>
		<?php } // fin de campos extra definidos por el administrador del sistema ?>

		<?php // inicio - terminos y condiciones 
		if(Yii::app()->user->um->getDefaultSystem()->getn('registerusingterms') == 1) : ?>
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
					<?php $this->beginWidget('booster.widgets.TbModal',array('id' => 'myModal')); ?>
						<div class="modal-header">
							<a class="close" data-dismiss="modal">&times;</a>
							<h4><?php echo ucfirst(CrugeTranslator::t("terminos y condiciones"));?></h4>
						</div>
						<div class="modal-body">
							<p><?php echo Yii::app()->user->um->getDefaultSystem()->get('terms') ;?> </p>
						</div>
					<?php $this->endWidget(); ?>

					<?php $this->widget(
						'booster.widgets.TbButton',
						array(
							'label' => 'Ver '.strtolower(CrugeTranslator::t(Yii::app()->user->um->getDefaultSystem()->get('registerusingtermslabel'))),
							'context' => 'link',
							'htmlOptions' => array(
				            'data-toggle' => 'modal',
				            'data-target' => '#myModal',
				            'class' => 'tcenter'
				        	),
						)
					);

					echo $form->checkboxGroup($model, 'terminosYCondiciones');
					?>
					<br>
				</div>
			</div>
		<?php endif; // fin - terminos y condiciones ?>

		<?php // inicio pide captcha 
		if(Yii::app()->user->um->getDefaultSystem()->getn('registerusingcaptcha') == 1) : ?>
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
					<div class="g-recaptcha" data-sitekey="<?php echo Yii::app()->params['grecaptcha']['data-sitekey']; ?>"></div>
					<br>
				</div>
			</div>
		<?php endif; //fin pide captcha ?>

	</fieldset>

	<div class="form-actions row">
		<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
			<?php $this->widget(
				'booster.widgets.TbButton',
				array(
					'buttonType' => 'submit',
					'context' => 'primary',
					'label' => 'REGISTRARSE'
				)
			); ?>
		</div>
	</div>


<?php 

$this->endWidget(); 
unset($form);

?>

</div>