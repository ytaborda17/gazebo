<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

Yii::app()->getClientScript()->registerCssFile(Yii::app()->theme->baseUrl.'/css/contacto.css'); 
Yii::app()->clientScript->registerScriptFile('https://www.google.com/recaptcha/api.js',CClientScript::POS_END);

?>
<h1>Contacto</h1>


<div class="col">	
	<?php if (!empty($social)): ?>
		<div class="top-bar">
			<?php foreach ($social as $i => $red): ?>
				<?php echo CHtml::link(
					CHtml::image(Yii::app()->theme->baseUrl.'/img/'.$red['class'].'.png', $red['nombre']), 
					$red['url'],
					array(
						'target' => '_blank',
						'title' => $red['nombre'],
						'class' => 'social '.$red['class'],
						)
					);
				?>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>


	<p>
		Para mayor información, contáctanos a través de <?php echo $contacto['telefonos'] ;?> o envíanos un mensaje utilizando el formulario. 
	</p>
	<p>
		Si prefiere visitarnos, estamos ubicados en <?php echo $contacto['direccion'] ;?>.
	</p>

	<div class="form">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'contact-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		)); ?>
				
			<?php if(Yii::app()->user->hasFlash('contact')): ?>
				<div class="flash-success">
					<?php echo Yii::app()->user->getFlash('contact'); ?>
				</div>
			<?php else: ?>

				<?php //echo $form->errorSummary($model); ?>
				
				<div class="col">
					<div class="row">
						<?php echo $form->textField($model,'name',array('placeholder'=>'Nombre (*)','title'=>'Nombre')); ?>
						<?php echo $form->error($model,'name'); ?>
					</div>

					<div class="row">
						<?php echo $form->textField($model,'email',array('placeholder'=>'Email (*)','title'=>'Email')); ?>
						<?php echo $form->error($model,'email'); ?>
					</div>

					<div class="row">
						<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128,'placeholder'=>'Asunto (*)','title'=>'Asunto')); ?>
						<?php echo $form->error($model,'subject'); ?>
					</div>

					<div class="row">
						<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50, 'placeholder'=>'Mensaje (*)', 'title'=>'Mensaje')); ?>
						<?php echo $form->error($model,'body'); ?>
					</div>
					
					<div class="row">
						<div class="g-recaptcha" data-sitekey="<?php echo Yii::app()->params['grecaptcha']['data-sitekey']; ?>"></div>
						<?php echo $form->error($model,'verifyCode'); ?>
					</div>
				</div>
				<div class="col submit">
					<div class="row buttons"><?php echo CHtml::submitButton('Enviar'); ?></div>
				</div>

			<?php endif; ?>

		<?php $this->endWidget(); ?>
	</div>

</div>

<div class="col map">

	<?php if ($empresa->horario!=""): ?>
		<div class="schedule">
			<div class="top-bar">
				Horario de atención
			</div>
			<div class="time">
				<?php echo $empresa->horario ;?>
			</div>
		</div>
	<?php endif; ?>
	<iframe src="<?php echo $empresa->map?>" width="100%" height="<?php echo ($empresa->horario=="" ? '475' : '340');?>" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<div class="clear"></div>
