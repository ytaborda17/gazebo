<?php
/* @var $this ContactoController */
/* @var $data Contacto */
?>

<div class="item">
		<div class="">
			<small><?php echo CHtml::encode($data->getAttributeLabel('tipo_id')); ?>:</small> <?php echo CHtml::encode(ContactoTipo::model()->findByPk($data->tipo_id)->nombre); ?>
		</div>
		<?php if ($data->red_id!=null): ?>
			<div class="">
				<small><?php echo CHtml::encode($data->getAttributeLabel('red_id')); ?>:</small> <?php echo CHtml::encode(RedSocial::model()->findByPk($data->red_id)->nombre); ?>
			</div>
		<?php endif; ?>
		<div class="">
			<small><?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</small> <?php echo CHtml::encode($data->valor); ?>
		</div>
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
							'visible' => Yii::app()->user->checkAccess('action_contacto_detalle'),
							'htmlOptions' => array(
								'title' => 'Detalle',
								), 
							'url' => Yii::app()->createUrl('contacto/detalle', array('id'=> $data->id)),
							),
						array(
							'buttonType' => 'link', 
							'icon' => 'edit', 
							'visible' => Yii::app()->user->checkAccess('action_contacto_editar'),
							'htmlOptions' => array(
								'title' => 'Editar',
								), 
							'url' => Yii::app()->createUrl('contacto/editar', array('id'=> $data->id)),
							),
						array(
							'buttonType' => 'link', 
							'icon' => 'trash', 
							'visible' => Yii::app()->user->checkAccess('action_contacto_delete'),
							'htmlOptions' => array(
								'title' => 'Borrar',
								'onclick' => "return confirm('¿Borrar elemento?')",
								), 
							'url' => Yii::app()->createUrl('contacto/delete', array('id'=> $data->id)),
							),
						),	
					)
				); 
			?>
		</div>
</div>