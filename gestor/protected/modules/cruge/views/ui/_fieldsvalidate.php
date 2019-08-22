<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php echo $form->checkboxGroup( $model, 'required' ); ?>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php echo $form->textFieldGroup( $model, 'useregexpmsg' ); ?>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php echo $form->textAreaGroup( $model, 'useregexp', array(
			'hint' => 
				ucfirst(CrugeTranslator::t("dejar en blanco si no se quiere usar")).
				"<br>".
				ucfirst(CrugeTranslator::t(
					"La expresion regular (regexp) es una lista de caracteres
					 que validan la sintaxis de lo que el usuario ingrese en este campo.
					 por ejemplo:")).
				"<pre>".
				"<u>".CrugeTranslator::t("telefono:")."</u><br/>^([0-9-.+ \(\)]{3,20})$".
				"<br/><u>".CrugeTranslator::t("digitos y letras:")."</u><br/>^([a-zA-Z0-9]+)$".
				"</pre>"
				,
			) 
		); ?>
	</div>
</div>
