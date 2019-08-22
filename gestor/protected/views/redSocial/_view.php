<?php
/* @var $this RedSocialController */
/* @var $data RedSocial */
?>

<div class="item">

								
		<h3><?php echo CHtml::encode($data->nombre); ?></h3>							
		<div class="row">
			<small><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</small> <?php echo CHtml::encode($data->url); ?>
			<br />
		</div>
					
		<div class="row">
			<small><?php echo CHtml::encode($data->getAttributeLabel('class')); ?>:</small> <?php echo CHtml::encode($data->class); ?>
			<br />
			<br>
		</div>
		<div class="row">
			<?php $this->widget(
				'booster.widgets.TbButtonGroup',
				array(
					'buttons' => array(
						array(
							'buttonType' => 'link', 
							'icon' => 'eye-open', 
							'visible' => Yii::app()->user->checkAccess('action_redSocial_detalle'),
							'htmlOptions' => array(
								'title' => 'Detalle',
								), 
							'url' => Yii::app()->createUrl('redSocial/detalle', array('id'=> $data->id)),
							),
						array(
							'buttonType' => 'link', 
							'icon' => 'edit', 
							'visible' => Yii::app()->user->checkAccess('action_redSocial_editar'),
							'htmlOptions' => array(
								'title' => 'Editar',
								), 
							'url' => Yii::app()->createUrl('redSocial/editar', array('id'=> $data->id)),
							),
						array(
							'buttonType' => 'link', 
							'icon' => 'trash', 
							'visible' => Yii::app()->user->checkAccess('action_redSocial_delete'),
							'htmlOptions' => array(
								'title' => 'Borrar',
								'onclick' => "return confirm('¿Borrar elemento?')",
								), 
							'url' => Yii::app()->createUrl('redSocial/delete', array('id'=> $data->id)),
							),
						),	
					)
				); 
			?>
		</div>
</div>