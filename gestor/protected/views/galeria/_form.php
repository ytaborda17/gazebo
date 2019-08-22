<?php
/* @var $this GaleriaController */
/* @var $model Galeria */
/* @var $form CActiveForm */

$this->widget('booster.widgets.TbAlert', array(
	'fade' => true,
	'closeText' => '&times;', // false equals no close link
	'events' => array(),
	'htmlOptions' => array(),
	'userComponentId' => 'user',
	'alerts' => array( // configurations per alert type
		// success, info, warning, error or danger
		'success' => array('closeText' => '&times;'),
		'info' => array('closeText' => '&times;'),
		'warning' => array('closeText' => false),
		'error' => array('closeText' => false)
	),
));
?>
<div class="form">

	<?php $form = $this->beginWidget('booster.widgets.TbActiveForm',array(
		'id' => 'galeria-form',
		'type' => 'vertical',
		'htmlOptions' => array('enctype' => 'multipart/form-data',),
		))?>   
	<fieldset>
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
				<?php echo $form->textFieldGroup($model,'nombre',array('size'=>60,'maxlength'=>140)); ?>
			</div>
		</div>
		<?php /*<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-7">
				<label class="control-label required" for="Galeria_descripcion">Descripcion <span class="required">*</span></label><br>
				<?php echo $form->textArea($model,'descripcion',array(
					'class' => 'form-control count-chars-left',
					'rows'=>4,
					'cols'=>140,
					'maxlength'=>500,
					'placeholder' => "Mensaje"
					)); ?>
				<span class="help-block">Caracteres restantes <span class="badge alert-default">500</span></span>
			</div>
		</div>*/?>
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
				<?php //echo $form->textFieldGroup($model,'prioridad'); ?>
				<label class="control-label" for="Galeria_prioridad">Prioridad</label>
				<div>
					<?php $this->widget('CStarRating',array(
		            'name'=>'Galeria[prioridad]',
		            'value'=>$model->prioridad,
		            'minRating'=>1,
		            'maxRating'=>5,
		            'starCount'=>5,
	            ));?>
				</div>
            <br>
            <br>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
				<div class="form-group">
					<label class="control-label" for="media">Imagenes de la galería</label>
						<?php 
						$this->widget('CMultiFileUpload', array(
							'attribute' =>'image',
							'name'      => 'media',
							'accept'    => 'jpg|jpeg|gif|png|bmp', 
							'denied'    => 'Archivos permitidos: jpg, jpeg, gif, png, bmp.', 
							'duplicate' => 'Archivo duplicado', 
							'remove'    => '<span class="glyphicon glyphicon-remove"></span>',
							// 'max'       => $model->isNewRecord ? 5 : (5-count($media)),
							'options'=>array(
								'afterFileAppend'=>'function(e, v, m) { 
									var indice=m.slaves.length-1;'.
									'$(".MultiFile-label").last().append("<input type=\"text\" name=\"media["+indice+"]\" placeholder=\"Título de la imagen\" maxlength=\"140\" title=\"El título no puede contener más de 140 caracteres.\" />");
								}',
								'onFileSelect'=>'function(e, v ,m){
									var fileSize = e.files[0].size;
									if ( fileSize > 5120*1024 ) { // 5MB
										alert("Tamaño máximo de archivo: 5MB.");
										return false;
									}
								}',
							)
						)); 
						?>
				</div>
			</div>
		</div>
		<?php if ($images!=null): ?>
			<div class="row">
				<?php foreach ($images as $i => $img): ?>
					<div class="col-xs-6 col-md-4">
						<div class="thumbnail">
							<?php echo CHtml::image(str_replace("//", "/", Yii::app()->params['assets_url'].'/galeria/').$img->file_name,'') ;?>
							<div class="caption">
								<div>
									<?php $this->widget('booster.widgets.TbEditableField', array(
								      'type' => 'text',
								      // 'placement' => 'top',
								      'mode' => 'inline',
								      'title' => 'Cabiar título de la imagen',
								      'model' => $img,
								      'attribute' => 'titulo', // $model->name will be editable
										'url' => Yii::app()->createUrl('galeria/renombrarImagen', array('pic'=> $img->id)), //url for submit data
								   )); ?>
								</div>
								<div>
									<?php $this->widget(
										'booster.widgets.TbButton',
										array(
											'icon' => 'trash', 
											'buttonType' => 'ajaxSubmit',
												'url' => Yii::app()->createUrl('galeria/borrarImagen', array('pic'=> $img->id)),
												'ajaxOptions' => array(
													'type' => 'POST',
													'success' => 'function(data) { 
														if (data==1) location.reload(true);
													}',
												),
											'htmlOptions'=>array('style'=>'margin-top:6px;')
											)
										);?>     
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
				<div class="form-group">
					<label class="control-label" for="Contacto_estatus">Estatus</label>
					<div>
						<?php $this->widget('booster.widgets.TbSwitch',array(
							'name' => 'Galeria[estatus]',
							'value' => empty($model->estatus) ? false : true,
							'options' => array(
								'onColor' => 'success',
								'offColor' => 'danger',
								'onText' => 'ACTIVO',
								'offText' => 'INACTIVO',
								'size' => 'small',
								),
							'events' => array()
							));?>
							<br>
							<br>
					</div>
				</div>
			 </div>
		</div>
		</fieldset>   
	<div class="form-actions row">
		<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php $this->widget('booster.widgets.TbButton', array(
					'buttonType' => 'submit',
					'context' => 'primary',
					'icon' => 'floppy-disk',
					'label' => 'Guardar',
			)); ?>
		</div>
	</div>

<?php
		$this->endWidget();
		unset($form);
	?>
</div>
