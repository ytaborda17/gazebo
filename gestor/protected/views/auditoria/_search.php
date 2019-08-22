<?php
/* @var $this AuditoriaController */
/* @var $model AppAuditoria */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<table border="0" cellspacing="1" cellpading="2" class="appForm wide">
	<tr class="row">
		<td><?php echo $form->label($model,'id'); ?>:</td>
		<td><div><?php echo $form->textField($model,'id'); ?></div></td>
	</tr>

	<tr class="row">
		<td><?php echo $form->label($model,'description'); ?>:</td>
		<td><div><?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>250)); ?></div></td>
	</tr>

	<tr class="row">
		<td><?php echo $form->label($model,'action'); ?>:</td>
		<td><div><?php echo $form->textField($model,'action',array('size'=>50,'maxlength'=>50)); ?></div></td>
	</tr>

	<tr class="row">
		<td><?php echo $form->label($model,'model'); ?>:</td>
		<td><div><?php echo $form->textField($model,'model',array('size'=>50,'maxlength'=>50)); ?></div></td>
	</tr>

	<tr class="row">
		<td><?php echo $form->label($model,'model_id'); ?>:</td>
		<td><div><?php echo $form->textField($model,'model_id'); ?></div></td>
	</tr>

	<tr class="row">
		<td><?php echo $form->label($model,'field'); ?>:</td>
		<td><div><?php echo $form->textField($model,'field',array('size'=>50,'maxlength'=>50)); ?></div></td>
	</tr>

	<tr class="row">
		<td><?php echo $form->label($model,'time_stamp'); ?>:</td>
		<td><div><?php echo $form->textField($model,'time_stamp'); ?></div></td>
	</tr>

	<tr class="row">
		<td><?php echo $form->label($model,'user_id'); ?>:</td>
		<td><div><?php echo $form->textField($model,'user_id'); ?></div></td>
	</tr>

	<tr class="row">
		<td><?php echo $form->label($model,'ipAddress'); ?>:</td>
		<td><div><?php echo $form->textField($model,'ipAddress',array('size'=>50,'maxlength'=>50)); ?></div></td>
	</tr>

	<tr><td colspan="">&nbsp;</td></tr>
	<tr class="row">
		<td></td>
		<td><div class="buttons"><?php echo CHtml::submitButton('Buscar'); ?></div></td>
	</tr>
	<tr><td colspan="">&nbsp;</td></tr>
</table><!-- search-form -->
<?php $this->endWidget(); ?>
