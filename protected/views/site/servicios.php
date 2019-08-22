<?php
/* @var $this SiteController */

Yii::app()->getClientScript()->registerCssFile(Yii::app()->theme->baseUrl.'/css/servicios.css'); 
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->theme->baseUrl.'/js/cycle2.js'); 

Yii::app()->clientScript->registerScript('services', "
   $('.slider').cycle();
");

?>
<h1>Servicios</h1>
<div class="services">
	<?php foreach ($servicios as $i => $data): ?>
		<div class="row <?php echo (($i%2)===0 ? 'even' : 'odd') ;?>">
			<div class="col caption">
				<div>
					<h2><?php echo CHtml::encode($data['titulo']) ;?></h2>
					<?php echo CHtml::decode(nl2br($data['descripcion'])) ;?>
				</div>
			</div>
			<div class="col slider" data-cycle-fx="fade" data-cycle-speed="700" data-cycle-slides="> img">
				<?php echo $data['img'] ;?>
			</div>
		</div>
	<?php endforeach; ?>
</div>
<div class="warranty">
	<div class="caption">Todas nuestras cocinas gozan con 5 a&ntilde;os de <strong>garant&iacute;a</strong> certificada.</div>
	<div class="seal"></div>
</div>

<div class="clear"></div>
<div class="design">
	<div class="area">
		<div class="title">
			DISE&Ntilde;AMOS <br>	
		</div>
		<div class="caption">
			planificamos, fabricamos e instalamos tu cocina
		</div>
	</div>
</div>