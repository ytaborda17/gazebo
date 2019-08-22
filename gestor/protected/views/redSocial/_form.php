<?php
/* @var $this RedSocialController */
/* @var $model RedSocial */
/* @var $form CActiveForm */
?>

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
            <?php echo $form->textFieldGroup($model,'nombre',array('size'=>50,'maxlength'=>50)); ?>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
            <?php echo $form->textFieldGroup($model,'url',array('size'=>60,'maxlength'=>140,'hint' => 'URL de la red social sin el nombre de usuario')); ?>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
            <?php echo $form->textFieldGroup($model,'class',array('size'=>20,'maxlength'=>20, 'hint'=>'Para uso del sitio')); ?>
         </div>
      </div>
   </fieldset>   
   <div class="form-actions row">
      <div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
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
