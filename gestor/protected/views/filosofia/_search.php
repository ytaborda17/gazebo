<?php
/* @var $this NosotrosController */
/* @var $model Nosotros */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'type' => 'horizontal',
	'method'=>'get',
)); ?>

<fieldset>	

	<div class="row"><?php echo $form->textField($model,'id'); ?></div>
	<div class="row"><?php echo $form->textField($model,'titulo',array('size'=>60,'maxlength'=>140)); ?></div>
	<div class="row"><?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?></div>

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
