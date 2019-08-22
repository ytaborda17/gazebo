<?php
/* @var $this NosotrosController */
/* @var $model Nosotros */
/* @var $form CActiveForm */
?>

<div class="form">

   <?php 
   	$form = $this->beginWidget(
      		'booster.widgets.TbActiveForm',
      		array(
      			   'id' => 'filosofia-form',
      			   'type' => 'vertical',
      			   // 'htmlOptions' => array('enctype' => 'multipart/form-data',),
      		)
   )?>   
   <fieldset>
      <div class="row">
         <div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
            <?php echo $form->textFieldGroup($model,'titulo',array('size'=>60,'maxlength'=>140)); ?>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-8 col-md-7 col-lg-7">
            <label class="control-label required" for="Filosofia_descripcion">Descripcion <span class="required">*</span></label><br>
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
               <label class="control-label" for="Filosofia_estatus">Estatus</label>
               <div>
                  <?php $this->widget('booster.widgets.TbSwitch',
                     array(
                        'name' => 'Filosofia[estatus]',
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
         <?php 
         	$this->widget(
            		'booster.widgets.TbButton',
            		array(
               		'buttonType' => 'submit',
               		'context' => 'primary',
                     'icon' => 'floppy-disk',
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
