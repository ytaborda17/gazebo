<?php
/* @var $this SiteController */

Yii::app()->getClientScript()->registerCssFile(Yii::app()->theme->baseUrl.'/css/empresa.css'); 

?>
<h1>Empresa</h1>
<?php foreach ($filosofias as $i => $data): ?>
	<div class="row <?php echo (($i%2)===0 ? 'even' : 'odd') ;?>">
		<div class="col title">
			<h2><?php echo CHtml::encode($data->titulo) ;?></h2>
		</div>
		<div class="col caption"><?php echo CHtml::encode(nl2br($data->descripcion)) ;?></div>
	</div>
<?php endforeach; ?>

<div class="clear"></div>
<div class="bottom"><div class="area">El <b>diseño</b> base de nuestra Filosofía</div></div>