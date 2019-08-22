<?php
/* @var $this ContactoTipoController */
/* @var $data ContactoTipo */
?>

<div class="item">
				
				
		<h3><?php echo CHtml::encode($data->nombre); ?></h3>			
		<div class="row">
			<small><?php echo CHtml::encode($data->getAttributeLabel('etiqueta')); ?>:</small> <?php echo CHtml::encode($data->etiqueta); ?>
		</div>			
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
							'visible' => Yii::app()->user->checkAccess('action_contactoTipo_detalle'),
							'htmlOptions' => array(
								'title' => 'Detalle',
								), 
							'url' => Yii::app()->createUrl('contactoTipo/detalle', array('id'=> $data->id)),
							),
						array(
							'buttonType' => 'link', 
							'icon' => 'edit', 
							'visible' => Yii::app()->user->checkAccess('action_contactoTipo_editar'),
							'htmlOptions' => array(
								'title' => 'Editar',
								), 
							'url' => Yii::app()->createUrl('contactoTipo/editar', array('id'=> $data->id)),
							),
						array(
							'buttonType' => 'link', 
							'icon' => 'trash', 
							'visible' => Yii::app()->user->checkAccess('action_contactoTipo_delete'),
							'htmlOptions' => array(
								'title' => 'Borrar',
								'onclick' => "return confirm('¿Borrar elemento?')",
								), 
							'url' => Yii::app()->createUrl('contactoTipo/delete', array('id'=> $data->id)),
							),
						),	
					)
				); 
			?>
		</div>
</div>