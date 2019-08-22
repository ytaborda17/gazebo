<?php
/* @var $this ServiciosController */
/* @var $model Servicio */
/* @var $form CActiveForm */


?>

<div class="form">

	<?php 
		$form = $this->beginWidget(
				'booster.widgets.TbActiveForm',
				array(
						'id' => 'crugestoreduser-form',
						'type' => 'vertical',
						'htmlOptions' => array('enctype' => 'multipart/form-data',),
				)
	)?>   
	<fieldset>
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
				<?php echo $form->textFieldGroup($model,'titulo',array('size'=>60,'maxlength'=>140,)); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-7 col-lg-7">
				<label class="control-label required" for="Servicio_descripcion">Descripcion <span class="required">*</span></label><br>
				<?php echo $form->textArea($model,'descripcion',array(
					'class' => 'form-control count-chars-left',
					// 'hint'=>"Caracteres restantes <span class=\"badge alert-default\" id=\"badge\">140</span>",
					'rows'=>7,
					'cols'=>140,
					'maxlength'=>800,
					'placeholder' => "Descripcion"
					)); ?>
				<span class="help-block">Caracteres restantes <span class="badge alert-default">800</span></span>
			</div>
		</div>	
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
				<div class="form-group">
					<label class="control-label" for="media">Imagenes del rotador</label>
						<?php 
						$this->widget('CMultiFileUpload', array(
							'attribute' =>'image',
							'name'      => 'media',
							'accept'    => 'jpg|jpeg|gif|png|bmp', 
							'denied'    => 'Archivos permitidos: jpg, jpeg, gif, png, bmp.', 
							'duplicate' => 'Archivo duplicado', 
							'remove'    => '<span class="glyphicon glyphicon-remove"></span>',
							'max'			=> $model->isNewRecord ? 5 : (5-count($media)),
							'options'=>array(
								'onFileSelect'=>'function(e, v ,m){
									var fileSize = e.files[0].size;
									if ( fileSize > 5120*1024 ) { // 5MB
										alert("Tamaño máximo de archivo: 5MB.");
										return false;
									}
								}',
							)
						)); ?>
					<span class="help-block">Se recomienda usar imagenes rectangulares de 350x250px.</span>
				</div>
			</div>
		</div>
		<?php if (is_array($media) && !empty($media)): ?>
			<div class="mosiac">
				<div class="row items">
					<div class="col-xs-12 col-md-12">
						<?php foreach ($media as $i => $file): ?>
						   <div class="item thumbnail">
							   <?php echo CHtml::image(Yii::app()->params['assets_url'].'/servicios/'.$file,''/*,array('class'=>'item thumbnail')*/) ;?>
						    	<?php $this->widget('booster.widgets.TbButton',array(
					    			'icon' => 'trash', 
					    			'buttonType' => 'ajaxSubmit',
		    			            'url' => Yii::app()->createUrl('servicios/borrarImagen', array('pic'=> $file)),
		    			            'ajaxOptions' => array(
		    			               'type' => 'POST',
		    			               'success' => 'function(data) { 
		    			               	if (data==1) location.reload(true);
	    			                	}',
		    			            ),
		    			            'htmlOptions'=>array('style'=>'margin-top:6px;')
					    			));?>		
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
				<div class="form-group">
					<label class="control-label" for="Contacto_estatus">Estatus</label>
					<div>
						<?php $this->widget('booster.widgets.TbSwitch',
							array(
								'name' => 'Servicio[estatus]',
								'value' => empty($model->estatus) ? false : true,
								'options' => array(
									'onColor' => 'success',
									'offColor' => 'danger',
									'onText' => 'ACTIVO',
									'offText' => 'INACTIVO',
									'size' => 'small',
									),
								'events' => array()
								)
							);
							?>
					</div>
				</div>
			 </div>
		</div>
	</fieldset>   
	<div class="form-actions row">
		<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
			<br>
			<?php $this->widget('booster.widgets.TbButton',array(
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