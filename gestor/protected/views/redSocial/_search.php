<?php
/* @var $this RedSocialController */
/* @var $model RedSocial */
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
	<div class="row"><?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>140)); ?></div>
	<div class="row"><?php echo $form->textField($model,'class',array('size'=>20,'maxlength'=>20)); ?></div>

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
