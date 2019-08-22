<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php echo $form->checkboxGroup( $model, 'systemdown' ); ?>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php echo $form->checkboxGroup( $model, 'systemnonewsessions' ); ?>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php echo $form->textFieldGroup( $model, 'sessionmaxdurationmins', array( 'prepend' => '<i class="glyphicon glyphicon-time"></i>' ) ); ?>
	</div>
</div>