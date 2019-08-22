<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php echo $form->checkboxGroup( $model, 'registerusingterms' ); ?>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php echo $form->textFieldGroup( $model, 'registerusingtermslabel' ); ?>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php echo $form->textAreaGroup( $model, 'terms' ); ?>
	</div>
</div>
