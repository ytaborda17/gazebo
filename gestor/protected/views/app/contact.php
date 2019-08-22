<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle = 'Contact Us - ' . Yii::app()->name;
$this->breadcrumbs=array(
	'Contact',
);
?>

<h1>Soporte</h1>


<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<div class="crud_form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<table border="0" cellspacing="1" cellpading="2" class="appForm" style="display:inline-block;">
	<tr>
		<td><?php echo $form->labelEx($model,'name'); ?></td>
		<td><?php echo $form->textField($model,'name'); ?> <?php echo $form->error($model,'name'); ?></td>
	</tr>
	<tr>
		<td><?php echo $form->textField($model,'name'); ?> <?php echo $form->error($model,'name'); ?></td>
		<td><?php echo $form->textField($model,'email'); ?> <?php echo $form->error($model,'email'); ?></td>
	</tr>
	<tr>
		<td><?php echo $form->labelEx($model,'subject'); ?></td>
		<td><?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?> <?php echo $form->error($model,'subject'); ?></td>
	</tr>
	<tr>
		<td><?php echo $form->labelEx($model,'body'); ?></td>
		<td><?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?> <?php echo $form->error($model,'body'); ?></td>
	</tr>
	<?php if(CCaptcha::checkRequirements()): ?>
		<tr>
			<td><?php echo $form->labelEx($model,'verifyCode'); ?></td>
			<td>
				<?php echo $form->textField($model,'verifyCode'); ?>
				<div class="hint">
					Por favor ingrese las letras tal como se muestran en la imagen inferior.<br/>
					Las letras no son sensibles a mayúsculas o minúsculas.
				</div>
				<br>
				<?php $this->widget('CCaptcha'); ?>
				<?php echo $form->error($model,'verifyCode'); ?>
			</td>
		</tr>
	<?php endif; ?>
	<tr>
		<td></td>
		<td><?php echo CHtml::submitButton('Submit'); ?></td>
	</tr>
</table>


<?php $this->endWidget(); ?>

</div><!-- form -->

