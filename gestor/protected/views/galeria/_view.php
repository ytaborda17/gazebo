<?php
/* @var $this GaleriaController */
/* @var $data Galeria */
?>

<div class="item">
				
				
		<h3><?php echo CHtml::encode($data->nombre); ?></h3>			
		<?php /*<div class="row">
			<small><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</small> <?php echo CHtml::encode($data->descripcion); ?>
		</div>*/?>	
		<div class="row">
			<div style="line-height:16px; float:left;"><small><?php echo CHtml::encode($data->getAttributeLabel('prioridad')); ?>:</small> </div>
			<div style="line-height:16px; float:left;margin-left:5px;">
			<?php 
				$this->widget('CStarRating',array(
					'value'     =>$data->prioridad,
					'name'      =>'prioridad_'.$data->id,
					'readOnly'  =>true,
					// 'cssFile'   =>Yii::app()->theme->baseUrl.'/css/stars-rating.css',
					'minRating' =>1,
					'maxRating' =>5,
					// 'titles'    => $clasificacion_estrellas,
				));
			?>
		</div>
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
							'visible' => Yii::app()->user->checkAccess('action_galeria_detalle'),
							'htmlOptions' => array(
								'title' => 'Detalle',
								), 
							'url' => Yii::app()->createUrl('galeria/detalle', array('id'=> $data->id)),
							),
						array(
							'buttonType' => 'link', 
							'icon' => 'edit', 
							'visible' => Yii::app()->user->checkAccess('action_galeria_editar'),
							'htmlOptions' => array(
								'title' => 'Editar',
								), 
							'url' => Yii::app()->createUrl('galeria/editar', array('id'=> $data->id)),
							),
						array(
							'buttonType' => 'link', 
							'icon' => 'trash', 
							'visible' => Yii::app()->user->checkAccess('action_galeria_delete'),
							'htmlOptions' => array(
								'title' => 'Borrar',
								'onclick' => "return confirm('¿Borrar elemento?')",
								), 
							'url' => Yii::app()->createUrl('galeria/delete', array('id'=> $data->id)),
							),
						),	
					)
				); 
			?>
		</div>
</div>