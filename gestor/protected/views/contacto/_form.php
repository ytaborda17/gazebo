<?php
/* @var $this ContactoController */
/* @var $model Contacto */
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


<script type="text/javascript">
$(document).ready(function(){
	 $('#Contacto_tipo_id').trigger('change');
});
function contacto(val) {
	 var tag;

	 $('#red-social').addClass('hidden');
	 
	 switch(val) {
			case '2': 
				 tag = 'Email'; 
				 break;
			case '3': 
				 tag = 'Dirección'; 
				 break;
			case '5': 
				 tag = 'URL'; 
				 $('#red-social').removeClass('hidden');
				 break;
			case '6': 
				 tag = 'PIN'; 
				 break;
			case '1': 
			case '4': 
			case '7': 
				 tag = 'Teléfono'; 
				 break;
			default: tag = 'Valor';
	 }

	 $('#valor label').html(tag+'<span class="required">*</span>');
	 $('#valor input').attr('placeholder',tag);

}
</script>
<div class="form">

	 <?php 
		$form = $this->beginWidget(
					'booster.widgets.TbActiveForm',
					array(
							 'id' => 'crugestoreduser-form',
							 'type' => 'vertical',
							 // 'htmlOptions' => array('enctype' => 'multipart/form-data',),
					)
	 )?>   
	 <fieldset>
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
				 <?php /*echo $form->dropDownListGroup($model,'empresa_id', array(
							 'widgetOptions'=>array(
									'data'=>CHtml::listData(Empresa::model()->findAll(array('order'=>'nombre')), 'id', 'nombre'),
									)
							 )
						);*/
				 ?>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
				<?php echo $form->dropDownListGroup($model,'tipo_id', array(
				 	'widgetOptions'=>array(
				 		'data'=>CHtml::listData(ContactoTipo::model()->findAll(array('order'=>'nombre','condition'=>'estatus=1')), 'id', 'nombre'),
				 		'htmlOptions' => array('prompt'=>'-','onchange' => "contacto($(this).val())"),
				 		),
				 	'ajax' => array()
				 	));
				?>
			</div>
		</div>
		<div class="row hidden" id="red-social">
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
				<?php echo $form->dropDownListGroup($model,'red_id', array(
				 	'widgetOptions'=>array(
				 		'data'=>CHtml::listData(RedSocial::model()->findAll(array('order'=>'nombre')), 'id', 'nombre'),
				 		'htmlOptions' => array('prompt'=>'-')
				 		)
				 	));
				?>
			</div>
		</div>
		<div class="row" id="valor">
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
				<?php echo $form->textFieldGroup($model,'valor',array('size'=>60,'maxlength'=>250)); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
				<div class="form-group">
					<label class="control-label" for="Contacto_estatus">Estatus</label>
					<div>
						 <?php $this->widget('booster.widgets.TbSwitch',
								array(
									 'name' => 'Contacto[estatus]',
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
					<br>
				</div>
			</div>
		</div>
	 </fieldset>   
	 <div class="form-actions row">
	 	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
			<?php 
				$this->widget(
						'booster.widgets.TbButton',
						array(
								'buttonType' => 'submit',
								'icon' => 'floppy-disk',
								'context' => 'primary',
								'label' => 'Guardar',
					)
				); ?>
	 	</div>
	 </div>

<?php
			$this->endWidget();
			unset($form);
	 ?>
</div>

