<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Soporte';

Yii::app()->clientScript->registerScriptFile('https://www.google.com/recaptcha/api.js',CClientScript::POS_END);
?>

<h1>Soporte</h1>

<?php 
$this->widget('booster.widgets.TbAlert', array(
	'fade' => true,
	'closeText' => '&times;', // false equals no close link
	'events' => array(),
	'htmlOptions' => array(),
	'userComponentId' => 'user',
	'alerts' => array( // configurations per alert type
		// success, info, warning, error or danger
		'success' => array('closeText' => '&times;'),
		'info' => array('closeText' => '&times;'),
		'warning' => array('closeText' => false),
		'error' => array('closeText' => false)
	),
));
?>

<div class="form">
	<?php /** @var TbActiveForm $form */
	$form = $this->beginWidget(
		'booster.widgets.TbActiveForm',
		array(
			'id' => 'crugestoreduser-form',
			'type' => 'vertical',
			'htmlOptions' => array(
				'enctype' => 'multipart/form-data',
			),
		)
	); ?>
	<fieldset>
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
				<?php echo $form->textFieldGroup( $model, 'name', array(
				'widgetOptions' => array(
					'htmlOptions' => array(
						'readonly' => true,
						),
					)
				)); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
				<?php echo $form->textFieldGroup( $model, 'email', array(
					'widgetOptions' => array(
						'htmlOptions' => array(
							'readonly' => true,
							),
						)
					) ); ?>
			</div>
		</div>
		
		<div class="row">
				<div class="col-md-10">
					<?php echo $form->html5EditorGroup($model,'body',array(
						'widgetOptions' => array(
							'editorOptions' => array(
								'class' => 'span4',
								'rows' => 5,
								'height' => '200',
								'options' => array('color' => true)
								),
							)
						));  ?>
					<br>
				</div>
			</div>
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
				<?php echo $form->labelEx($model,'files'); ?>
				<?php $this->widget('CMultiFileUpload', array(
						'attribute' => 'files',
						'name'      => 'files',
						'accept'    => 'jpg|jpeg|gif|png|pdf|doc|docx|ppt|pptx|txt', 
						'denied'    => 'Archivos permitidos: jpg, jpeg, gif, png, pdf, doc, docx, ppt, pptx.', 
						'remove'    => '<span class="glyphicon glyphicon-remove"></span>',
						'max'			=> 3,
						'options'=>array(
							'onFileSelect'=>'function(e, v ,m){
								var fileSize = e.files[0].size;
								if ( fileSize > 5120*1024 ) { // 5MB
									alert("Tamaño máximo de archivo: 5MB.");
									return false;
								}
							}',
						)
				)); ?>
				<span class="light-error"><?php echo $form->error($model,'files'); ?></span>
				<br>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
				<div class="g-recaptcha" data-sitekey="<?php echo Yii::app()->params['grecaptcha']['data-sitekey']; ?>"></div>
				<?php echo $form->error($model,'verifyCode'); ?>
				<br>
			</div>
		</div>
	</fieldset>
	<div class="form-actions row">
		<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
			<?php $this->widget(
				'booster.widgets.TbButton',
				array(
					'buttonType' => 'submit',
					'icon' => 'floppy-disk',
					'context' => 'primary',
					'label' => 'Aceptar'
				)
			); ?>
		</div>
	</div>

	<?php
		$this->endWidget();
		unset($form);
	?>
</div>

