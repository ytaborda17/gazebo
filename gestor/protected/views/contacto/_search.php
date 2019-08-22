<?php
/* @var $this ContactoController */
/* @var $model Contacto */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'type' => 'horizontal',
	'method'=>'get',
)); ?>

<fieldset>	

	<div class="row"><?php echo $form->textField($model,'id'); ?></div>
	<div class="row"><?php echo $form->textField($model,'type_id'); ?></div>
	<div class="row"><?php echo $form->textField($model,'value',array('size'=>60,'maxlength'=>144)); ?></div>
	<div class="row"><?php echo $form->textField($model,'status'); ?></div>
	<div class="row"><?php echo $form->textField($model,'empresa_id'); ?></div>

</fieldset>   
<div class="form-actions row">
   <?php $this->widget('booster.widgets.TbButton',
		array(
   		'buttonType' => 'submit',
   		'label' => 'Buscar',
   	  )
	  );</div>
<?php $this->endWidget(); 
unset(); ?>
