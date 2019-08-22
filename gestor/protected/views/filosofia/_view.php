<?php
/* @var $this NosotrosController */
/* @var $data Nosotros */
?>

<div class="item">
			
	<h3><?php echo CHtml::encode($data->titulo); ?></h3>			
	<div class="">
		<small><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</small> <?php echo CHtml::encode($data->estatus ? "Activo" : "Inactivo"); ?>
	</div>
	<div class="">
		<br>
		<?php $this->widget(
			'booster.widgets.TbButtonGroup',
			array(
				'buttons' => array(
					array(
						'buttonType' => 'link', 
						'icon' => 'eye-open', 
						'visible' => Yii::app()->user->checkAccess('action_filosofia_detalle'),
						'htmlOptions' => array(
							'title' => 'Detalle',
							), 
						'url' => Yii::app()->createUrl('filosofia/detalle', array('id'=> $data->id)),
						),
					array(
						'buttonType' => 'link', 
						'icon' => 'edit', 
						'visible' => Yii::app()->user->checkAccess('action_filosofia_editar'),
						'htmlOptions' => array(
							'title' => 'Editar',
							), 
						'url' => Yii::app()->createUrl('filosofia/editar', array('id'=> $data->id)),
						),
					array(
						'buttonType' => 'link', 
						'icon' => 'trash', 
						'visible' => Yii::app()->user->checkAccess('action_filosofia_delete'),
						'htmlOptions' => array(
							'title' => 'Borrar',
							'onclick' => "return confirm('¿Borrar elemento?')",
							), 
						'url' => Yii::app()->createUrl('filosofia/delete', array('id'=> $data->id)),
						),
					),	
				)
			); 
		?>
	</div>
</div>