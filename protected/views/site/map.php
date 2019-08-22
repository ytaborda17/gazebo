<?php
/* @var $this SiteController */
/* @var $error array */

Yii::app()->getClientScript()->registerCssFile(Yii::app()->theme->baseUrl.'/css/map.css'); 

?>

<h1>Mapa del sitio</h1>

<p>
	La siguiente es una lista ordenada de las páginas de nuestro sitio web:
</p>
<div class="map">
	<?php $this->widget('zii.widgets.CMenu',array('activateParents'=>false,'encodeLabel' => false,'items'=> $this->menu )); ?>
</div>