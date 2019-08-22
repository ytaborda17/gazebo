<?php
/* @var $this EmpresaController */
/* @var $model Empresa */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'type' => 'horizontal',
	'method'=>'get',
)); ?>

<fieldset>	

	<div class="row"><?php echo $form->textField($model,'id'); ?></div>
	<div class="row"><?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>255)); ?></div>
	<div class="row"><?php echo $form->textField($model,'rif',array('size'=>12,'maxlength'=>12)); ?></div>
	<div class="row"><?php echo $form->textField($model,'telefono',array('size'=>20,'maxlength'=>20)); ?></div>
	<div class="row"><?php echo $form->textField($model,'direccion',array('size'=>60,'maxlength'=>510)); ?></div>
	<div class="row"><?php echo $form->textField($model,'email',array('size'=>20,'maxlength'=>20)); ?></div>
	<div class="row"><?php echo $form->textArea($model,'keywords',array('rows'=>6, 'cols'=>50)); ?></div>
	<div class="row"><?php echo $form->textArea($model,'metatags',array('rows'=>6, 'cols'=>50)); ?></div>

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
