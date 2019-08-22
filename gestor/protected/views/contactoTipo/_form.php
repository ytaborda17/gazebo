<?php
/* @var $this ContactoTipoController */
/* @var $model ContactoTipo */
/* @var $form CActiveForm */
?>

<div class="form">

   <?php $form = $this->beginWidget('booster.widgets.TbActiveForm',array(
      'id' => 'contacto-tipo-form',
      'type' => 'vertical',
      // 'htmlOptions' => array('enctype' => 'multipart/form-data',),
      ))?>   
   <fieldset>
      <div class="row">
         <div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
            <?php echo $form->textFieldGroup($model,'nombre',array('size'=>50,'maxlength'=>50)); ?>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
            <?php echo $form->textFieldGroup($model,'etiqueta',array('size'=>50,'maxlength'=>50)); ?>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
            <div class="form-group">
               <label class="control-label" for="Contacto_estatus">Estatus</label>
               <div>
                  <?php $this->widget('booster.widgets.TbSwitch',
                     array(
                        'name' => 'ContactoTipo[estatus]',
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
                     <br><br>
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
