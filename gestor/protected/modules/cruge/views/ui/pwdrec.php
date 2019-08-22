<?php  

$this->pageTitle=Yii::app()->name . " - Recuperar clave";
Yii::app()->getClientScript()->registerCssFile(Yii::app()->theme->baseUrl.'/css/logon.css');
Yii::app()->clientScript->registerScriptFile('https://www.google.com/recaptcha/api.js',CClientScript::POS_END);

?>


<div class="login_form">
	
<?php 

$form = $this->beginWidget(
	'booster.widgets.TbActiveForm',
	array(
		'id'=>'logon-form',
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
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
				<?php echo $form->textFieldGroup($model,'username',array(
					'labelOptions' => array('label' => false),
					'widgetOptions' => array('options' => array('language' => 'es',),),
					'wrapperHtmlOptions' => array('class' => 'col-sm-5',),
					'prepend' => '<i class="glyphicon glyphicon-user"></i>'
				));?>
			</div>
		</div>

		<?php if(CCaptcha::checkRequirements()): ?>
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
					<div class="g-recaptcha" data-sitekey="<?php echo Yii::app()->params['grecaptcha']['data-sitekey']; ?>"></div>
					<br>
				</div>
			</div>
		<?php endif; ?>
	</fieldset>
	<div class="form-actions row">
		<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
			<?php $this->widget('booster.widgets.TbButton',array(
				'buttonType' => 'submit',
				'icon' => 'envelope',
				'context' => 'primary',
				'label' => 'RECUPERAR'
			)); ?>
		</div>
	</div>

<?php 

$this->endWidget(); 
unset($form);

?>

</div>

