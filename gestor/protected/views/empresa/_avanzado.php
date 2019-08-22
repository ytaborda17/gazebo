<div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="alert alert-warning" role="alert">
		   <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		   Los siguientes campos son delicados, modifican la información del header del sitio web, antes de hacer cualquier cambio <strong>comuníquese con el administrador del sistema</strong> puede enviarle un mensaje a través de <strong><?php echo  CHtml::link(Yii::app()->params['adminEmail'],array("/soporte")) ;?></strong>.
		</div>
	</div>
</div>
<?php if (Yii::app()->user->checkAccess('action_site_header')): ?>
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-7 col-lg-7">
			<div class="form-group <?php echo ($form->error($model,'keywords')!="" ? 'has-error' : '') ;?>">
				<label class="control-label required <?php echo ($form->error($model,'keywords')!="" ? 'error' : '') ;?>" for="Empresa_keywords">Keywords <span class="required">*</span></label><br>
				<?php echo $form->textArea($model,'keywords',array(
					'class' => 'form-control count-chars-left ',
					'rows'=>4,
					'cols'=>50,
					'maxlength'=>250,
					'placeholder' => "Keywords"
					)); ?>
				<?php echo $form->error($model,'keywords') ;?>
				<span class="help-block info">Caracteres restantes <span class="badge alert-default"></span></span>
				<div><span class="help-block">Define las palabras claves para los buscadores, <strong>modificar a discresión</strong>.</span></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-7 col-lg-7">
			<div class="form-group <?php echo ($form->error($model,'description')!="" ? 'has-error' : '') ;?>">
				<label class="control-label required <?php echo ($form->error($model,'description')!="" ? 'error' : '') ;?>" for="Empresa_description">Description <span class="required">*</span></label><br>
				<?php echo $form->textArea($model,'description',array(
					'class' => 'form-control count-chars-left ',
					'rows'=>4,
					'cols'=>50,
					'maxlength'=>250,
					'placeholder' => "Description"
					)); ?>
				<?php echo $form->error($model,'description') ;?>
				<span class="help-block">Caracteres restantes <span class="badge alert-default"></span></span>
				<div><span class="help-block">Esta es la descripción del sitio web, de esta forma se muestra en los buscadores y redes sociales al compartir el sitio, <strong>modificar a discresión</strong>.</span></div>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php if (Yii::app()->user->checkAccess('action_site_map')): ?>
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-7 col-lg-7">
			<?php echo $form->textareaGroup($model,'map',array(
				'row'=>4,
				'cols'=>50,
				'hint'=>'<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Esta URL se agrega al iframe de la página de contacto, <strong>modificar a discresión</strong>.'
				)); ?>
		</div>
	</div>
	<br>
<?php endif; ?>