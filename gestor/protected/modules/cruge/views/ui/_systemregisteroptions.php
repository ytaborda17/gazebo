<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php echo $form->checkboxGroup( $model, 'registrationonlogin' ); ?>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php echo $form->checkboxGroup( $model, 'registerusingcaptcha' ); ?>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php echo $form->dropDownListGroup($model,'registerusingactivation',array(
			'widgetOptions' => array(
			'data' => Yii::app()->user->um->getUserActivationOptions(),
			)
		)); ?>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php echo $form->dropDownListGroup($model,'defaultroleforregistration',array(
			'widgetOptions' => array(
				'data' => Yii::app()->user->rbac->getRolesAsOptions(CrugeTranslator::t("--no asignar ningun rol--")),
			)
		)); ?>
	</div>
</div>