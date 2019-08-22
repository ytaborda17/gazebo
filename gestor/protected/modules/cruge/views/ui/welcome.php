<?php
// llamada cuando el actionRegistration ha insertado a un usuario

$this->pageTitle = "Bienvenido - " . Yii::app()->name;
Yii::app()->getClientScript()->registerCssFile(Yii::app()->theme->baseUrl.'/css/logon.css');

?>

<div class="welcome-form">

	<div class='row links tcenter form'>
		<p><b><?php echo CrugeTranslator::t('registration', 'The account has been created!'); ?></b></p>
		<p><?php echo CrugeTranslator::t('registration', 'Click here to login using new credentials:'); ?><br/>
			<br/>
			<?php echo ucfirst(Yii::app()->user->ui->loginLink);	?>
		</p>
	</div>
	
</div>