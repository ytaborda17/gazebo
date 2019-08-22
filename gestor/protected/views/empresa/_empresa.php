<div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="alert alert-info" role="alert">
		  <span class="glyphicon glyphicon-exclamation-home" aria-hidden="true"></span>
		  Los siguientes datos son los datos principales del sitio web y seran los primeros en mostrarse tanto en el pie de página como en la página de contacto.
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php echo $form->textFieldGroup($model,'nombre',array('size'=>60,'maxlength'=>140)); ?>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php echo $form->textFieldGroup($model,'rif',array('size'=>12,'maxlength'=>12)); ?>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php echo $form->textFieldGroup($model,'telefono',array('size'=>20,'maxlength'=>20)); ?>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php echo $form->textFieldGroup($model,'direccion',array('size'=>60,'maxlength'=>250)); ?>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php echo $form->textFieldGroup($model,'email',array('size'=>60,'maxlength'=>100)); ?>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-10 col-lg-9">
		<?php echo '<label class="control-label required" for="Empresa_horario">Horario <span class="required">*</span></label>';
		$this->widget('booster.widgets.TbCKEditor',array(
			'model' => $model,
			'attribute' => 'horario',
			'editorOptions' => array(
				'plugins' => 'toolbar,basicstyles,enterkey,entities,wysiwygarea',
				'uiColor'=> '#ffffff',
				'language'=> 'es',
				'height'=> '200',
				)
			)); ?>
		<br>
	</div>
</div>