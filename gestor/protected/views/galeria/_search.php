<?php
/* @var $this GaleriaController */
/* @var $model Galeria */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'type' => 'horizontal',
	'method'=>'get',
)); ?>

<fieldset>	

	<div class="row"><?php echo $form->textField($model,'id'); ?></div>
	<div class="row"><?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>140)); ?></div>
	<div class="row"><?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>500)); ?></div>
	<div class="row"><?php echo $form->textField($model,'prioridad'); ?></div>
	<div class="row"><?php echo $form->textField($model,'categoria',array('size'=>60,'maxlength'=>110)); ?></div>
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
