<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php echo $form->dropDownListGroup($model,'fieldtype',array(
			'widgetOptions' => array(
				'data' => Yii::app()->user->um->getFieldTypeOptions(),
				)
			)); ?>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php echo $form->textFieldGroup( $model, 'fieldsize' ); ?>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php echo $form->textFieldGroup( $model, 'maxlength' ); ?>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php echo $form->textAreaGroup( $model, 'predetvalue', array(
			'hint' => ucfirst(CrugeTranslator::t("si el fieldtype es un Listbox ponga aqui las opciones una por cada linea, el valor coloquelo al inicio seguido de una coma, ejemplo:
							<ul style='list-style: none;'>
								<li>1, azul</li>
								<li>2, rojo</li>
								<li>3, verde</li>
							</ul>")),
			) 
		); ?>
	</div>
</div>
