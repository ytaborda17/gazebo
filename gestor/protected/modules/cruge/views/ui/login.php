<?php 

$this->pageTitle=Yii::app()->name . " - Iniciar sesión";
Yii::app()->getClientScript()->registerCssFile(Yii::app()->theme->baseUrl.'/css/logon.css');

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
			<div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
				<?php echo $form->textFieldGroup($model,'username',array(
					'labelOptions' => array('label' => false),
					'widgetOptions' => array('options' => array('language' => 'es',),),
					'prepend' => '<i class="glyphicon glyphicon-user"></i>'
				)); ?>
			</div>
			<?php if (Yii::app()->user->um->getDefaultSystem()->getn('registrationonlogin')===1): ?>
				<div class="col-xs-12 col-sm-5 col-md-6 col-lg-6 link">
					<?php $this->widget('booster.widgets.TbButton',array(
						'htmlOptions' => array('id' => 'l1',),
						'buttonType' => 'link',
						'context' => 'link',
						'url' => Yii::app()->baseUrl.'/registro',
						'icon' => 'user',
						'label' => 'Registro')
					); ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
				<?php echo $form->passwordFieldGroup($model,'password',array(
					'labelOptions' => array('label' => false),
					'widgetOptions' => array('options' => array('language' => 'es',),),
					'prepend' => '<i class="glyphicon glyphicon-lock"></i>'
				));?>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-6 col-lg-6 link">
				<?php $this->widget('booster.widgets.TbButton',array(
						'htmlOptions' => array('id' => 'l2',),
						'buttonType' => 'link',
						'context' => 'link',
						'url' => Yii::app()->baseUrl.'/recuperar-clave',
						'icon' => 'lock',
						'label' => 'Recuperar clave')
					); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
				<?php echo $form->checkboxGroup($model, 'rememberMe'); ?>
			</div>
		</div>


		<?php if (Yii::app()->getComponent('crugeconnector') != null && Yii::app()->crugeconnector->hasEnabledClients): // si el componente CrugeConnector existe lo usa:?>
			<div class='crugeconnector'>
				<span><?php echo CrugeTranslator::t('logon', 'You also can login with');?>:</span>
				<ul>
				<?php 
					$cc = Yii::app()->crugeconnector;
					foreach($cc->enabledClients as $key=>$config){
						$image = CHtml::image($cc->getClientDefaultImage($key));
						echo "<li>".CHtml::link($image,
							$cc->getClientLoginUrl($key))."</li>";
					}
				?>
				</ul>
			</div>
		<?php endif; ?>
	</fieldset>
	<div class="form-actions row">
		<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
			<?php $this->widget('booster.widgets.TbButton',array(
				'buttonType' => 'submit',
				'context' => 'primary',
				'label' => 'INICIAR SESION')
			); ?>
		</div>
	</div>

<?php 

$this->endWidget(); 
unset($form);

?>

</div>