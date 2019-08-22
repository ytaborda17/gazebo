<?php
/* @var $this EmpresaController */
/* @var $data Empresa */
?>

<div class="item col-sm-6 col-md-4 col-lg-4">
	<div class="thumbnail">
		<div class="caption">
										
								
			<h3><?php echo CHtml::encode($data->nombre); ?></h3>							
			<?php echo CHtml::encode($data->getAttributeLabel('rif')); ?>: <?php echo CHtml::encode($data->rif); ?>
			<br />
			<?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>: <?php echo CHtml::encode($data->telefono); ?>
			<br />
			<?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>: <?php echo CHtml::encode($data->direccion); ?>
			<br />
			<?php echo CHtml::encode($data->getAttributeLabel('email')); ?>: <?php echo CHtml::encode($data->email); ?>
			<br />
			<?php echo CHtml::encode($data->getAttributeLabel('keywords')); ?>: <?php echo CHtml::encode($data->keywords); ?>
			<br />
			<?php /*
	<?php echo CHtml::encode($data->getAttributeLabel('metatags')); ?>: <?php echo CHtml::encode($data->metatags); ?>
	<br />
			*/ ?>
			<br>
			<?php $this->widget(
				'booster.widgets.TbButtonGroup',
				array(
					'buttons' => array(
						array(
							'buttonType' => 'link', 
							'icon' => 'eye-open', 
							'visible' => Yii::app()->user->checkAccess('action_empresa_detalle'),
							'htmlOptions' => array(
								'title' => 'Detalle',
								), 
							'url' => Yii::app()->createUrl('empresa/detalle', array('id'=> $data->id)),
							),
						array(
							'buttonType' => 'link', 
							'icon' => 'edit', 
							'visible' => Yii::app()->user->checkAccess('action_empresa_editar'),
							'htmlOptions' => array(
								'title' => 'Editar',
								), 
							'url' => Yii::app()->createUrl('empresa/editar', array('id'=> $data->id)),
							),
						array(
							'buttonType' => 'link', 
							'icon' => 'trash', 
							'visible' => Yii::app()->user->checkAccess('action_empresa_delete'),
							'htmlOptions' => array(
								'title' => 'Borrar',
								'onclick' => "return confirm('¿Borrar elemento?')",
								), 
							'url' => Yii::app()->createUrl('empresa/delete', array('id'=> $data->id)),
							),
						),	
					)
				); 
			?>
		</div>
	</div>
</div>