<?php
/* @var $this ServiciosController */
/* @var $data Servicio */
?>

<div class="item">
				
				
		<h3><?php echo CHtml::encode($data->titulo); ?></h3>
		<div class="row">
			<small><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</small> <?php echo CHtml::encode($data->estatus ? 'Activo' : 'Inactivo'); ?>
		</div>				
		<div class="row">
			<br>
			<?php $this->widget(
				'booster.widgets.TbButtonGroup',
				array(
					'buttons' => array(
						array(
							'buttonType' => 'link', 
							'icon' => 'eye-open', 
							'visible' => Yii::app()->user->checkAccess('action_servicios_detalle'),
							'htmlOptions' => array(
								'title' => 'Detalle',
								), 
							'url' => Yii::app()->createUrl('servicios/detalle', array('id'=> $data->id)),
							),
						array(
							'buttonType' => 'link', 
							'icon' => 'edit', 
							'visible' => Yii::app()->user->checkAccess('action_servicios_editar'),
							'htmlOptions' => array(
								'title' => 'Editar',
								), 
							'url' => Yii::app()->createUrl('servicios/editar', array('id'=> $data->id)),
							),
						array(
							'buttonType' => 'link', 
							'icon' => 'trash', 
							'visible' => Yii::app()->user->checkAccess('action_servicios_delete'),
							'htmlOptions' => array(
								'title' => 'Borrar',
								'onclick' => "return confirm('¿Borrar elemento?')",
								), 
							'url' => Yii::app()->createUrl('servicios/delete', array('id'=> $data->id)),
							),
						),	
					)
				); 
			?>
		</div>
</div>