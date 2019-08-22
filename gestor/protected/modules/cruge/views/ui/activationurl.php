<?php
// llamada cuando el actionRegistration ha insertado a un usuario
Yii::app()->getClientScript()->registerCssFile(Yii::app()->theme->baseUrl.'/css/logon.css');

?>

<h1><?php echo CrugeTranslator::t("Activación de la cuenta");?></h1>
<div class="login_form">
	<div class='row form'>

		<p>
			<?php echo $resp ;?>
		</p>
	</div>
</div>