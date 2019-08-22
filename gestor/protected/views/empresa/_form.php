<?php
/* @var $this EmpresaController */
/* @var $model Empresa */
/* @var $form CActiveForm */

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
	<fieldset>

		<?php $form = $this->beginWidget('booster.widgets.TbActiveForm',array(
			'id' => 'empresa-form',
			'type' => 'vertical',
			// 'htmlOptions' => array('enctype' => 'multipart/form-data',),
		)) ;

		$this->widget('booster.widgets.TbTabs',array(
	     'type' => 'tabs', // 'tabs' or 'pills'
	     'tabs' => array(
	     	array(
	     		'label' => 'Empresa',
	     		'icon' => 'home',
				'content'=>$this->renderPartial("_empresa", array('model' => $model, 'form' => $form),true), 
	     		'active' => true
	     		),
	     	array(
	     		'label' => 'Avanzado',
	     		'icon' => 'cog',
				'content'=>$this->renderPartial("_avanzado", array('model' => $model, 'form' => $form),true), 
	     		'visible' => (Yii::app()->user->checkAccess('action_site_header') || Yii::app()->user->checkAccess('action_site_map') ? true : false)
	     		),
	     	),
		 ));


		?>   
	</fieldset>   
	<div class="form-actions row">
		<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php $this->widget('booster.widgets.TbButton',array(
				'buttonType' => 'submit',
				'icon' => 'floppy-disk',
				'context' => 'primary',
				'label' => 'Guardar',
			)); ?>
		</div>
	</div>

<?php
	$this->endWidget();
	unset($form);
?>
</div>
