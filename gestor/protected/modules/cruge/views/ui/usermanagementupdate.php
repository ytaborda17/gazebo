<?php
/*
	$model:  
		es una instancia que implementa a ICrugeStoredUser, y debe traer ya los campos extra 	accesibles desde $model->getFields()
	
	$boolIsUserManagement: 
		true o false.  si es true indica que esta operandose bajo el action de adminstracion de usuarios, si es false indica que se esta operando bajo 'editar tu perfil'
*/

$this->pageTitle = ($boolIsUserManagement ? "Editar usuario" : "Perfil") . ' - ' . Yii::app()->name;

Yii::app()->getClientScript()->registerCoreScript('jquery.ui');

?>

<?php if ($boolIsUserManagement) {
	echo CHtml::openTag('div', array('class' => 'bs-navbar-top'));
	$this->widget('booster.widgets.TbNavbar',array(
		'brand' => 'Opciones',
		'fixed' => 'top',
		'fluid' => true,
		'htmlOptions' => array('style' => 'position:absolute; top:70px;'),
		'items' => array(
			array(
				'class' => 'booster.widgets.TbMenu',
				'type' => 'navbar',
				'items' => array(
					array('label' => 'Lista', 'url' => $this->createAbsoluteUrl('ui/usermanagementadmin'), 'icon'=>'th-list'),
					array('label' => 'Nuevo', 'url' => $this->createAbsoluteUrl('ui/usermanagementcreate'), 'icon'=>'plus', ),
					array('label' => 'Editar', 'url' => '#', 'active' => true, 'icon'=>'edit'),
					)
				)
			)
		));
	echo CHtml::closeTag('div');
} ?>

<h1><?php echo ucfirst(CrugeTranslator::t($boolIsUserManagement ? "editando usuario" : "Perfil"));?></h1>


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

		<?php 

		if ($boolIsUserManagement && Yii::app()->user->checkAccess('action_ui_rbacajaxassignment')) {
			$tabs = array(
				array(
					'label' => 'Cuenta',
					'content'=>$this->renderPartial("_account", array('model' => $model, 'form' => $form),true), 
					'active' => true,
					),
				array(
					'label' => 'Perfil',
					'content'=>$this->renderPartial("_profile", array('model' => $model, 'form' => $form),true), 
					),
				array(
					'label' => 'Avanzado',
					'content'=> $this->renderPartial('_edit-advanced-profile-features',array('model'=>$model,'form'=>$form),true) ,
					),
				);
		} else {
			$tabs = array(
				array(
					'label' => 'Cuenta',
					'content'=>$this->renderPartial("_account", array('model' => $model, 'form' => $form),true), 
					'active' => true,
					),
				array(
					'label' => 'Perfil',
					'content'=>$this->renderPartial("_profile", array('model' => $model, 'form' => $form),true), 
					),
				);
		}

		$this->widget('booster.widgets.TbTabs',array(
         'type' => 'tabs', // 'tabs' or 'pills'
        	'tabs' => $tabs,
	   	));

		?>

	</fieldset>
	<div class="form-actions">
		<?php $this->widget(
			'booster.widgets.TbButton',
			array(
				'buttonType' => 'submit',
				'context' => 'primary',
				'icon' => 'floppy-disk',
				'label' => 'Guardar',
			)
		); ?>
	</div>

	<?php
	$this->endWidget();
	unset($form);
	?>
</div>
