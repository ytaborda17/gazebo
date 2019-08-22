<?php
/* @var $this ContactoTipoController */
/* @var $model ContactoTipo */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'type' => 'horizontal',
	'method'=>'get',
)); ?>

<fieldset>	

	<div class="row"><?php echo $form->textField($model,'id'); ?></div>
	<div class="row"><?php echo $form->textField($model,'nombre',array('size'=>50,'maxlength'=>50)); ?></div>
	<div class="row"><?php echo $form->textField($model,'etiqueta',array('size'=>50,'maxlength'=>50)); ?></div>
	<div class="row"><?php echo $form->textField($model,'estatus'); ?></div>

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
