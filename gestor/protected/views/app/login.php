<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);

?>

<div class="crud_form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); 

// if ($form->error($model,'username')!==null) Yii::app()->user->setFlash("error",$form->error($model,'username'));
// if ($form->error($model,'password')!==null) Yii::app()->user->setFlash("error",$form->error($model,'password'));
// if ($form->error($model,'rememberMe')!==null) Yii::app()->user->setFlash("error",$form->error($model,'rememberMe'));
?>

	<div class="loginInput inputText">
		<?php // echo $form->labelEx($model,'Usuario <span class="required">*</span>'); ?>
		<?php echo $form->textField($model,'username',array('size'=>50,'maxlength'=>255,'placeholder'=>'Usuario')); ?>
		<?php // echo $form->error($model,'username'); ?>
	</div>

	<div class="loginInput inputText">
		<?php // echo $form->labelEx($model,'Contraseña <span class="required">*</span>'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>50,'maxlength'=>255,'placeholder'=>'Contraseña')); ?>
		<?php // echo $form->error($model,'password'); ?>
	</div>

	<div class="rememberMe fc4">
		<label class="fc4"><?php echo $form->checkBox($model,'rememberMe'); ?> Recordarme</label>
		<?php // echo $form->label($model,'recordarme'); ?>
		<?php // echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="buttonLightDark loginButton">
		<?php echo CHtml::submitButton('Aceptar'); ?>
	</div>

	<div class="loginErrorSumary">
		<?php //echo $form->errorSummary($model,"Verifique los siguientes campos:"); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
