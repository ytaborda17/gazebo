<?php
/* @var $this SiteController */

$this->pageTitle = $this->empresa->nombre;
Yii::app()->clientScript->registerMetaTag($this->pageTitle, "title", null, array(), 'twt');

Yii::app()->getClientScript()->registerCssFile(Yii::app()->theme->baseUrl.'/css/home.css'); 
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->theme->baseUrl.'/js/cycle2.js'); 

Yii::app()->clientScript->registerScript('index', "
   $('.slide-bg, #stitle, #scaption').cycle();
   // $('.slide-bg').cycle();
	// $('#stitle').cycle();
	// $('#scaption').cycle();
");

?>

<div class="slide-bg" data-cycle-fx="fade" data-cycle-speed="700" data-cycle-delay="3000" data-cycle-next="#next" data-cycle-prev="#prev" data-cycle-pager="#dots" data-cycle-slides="> div">
	<div class="slide1"></div>
	<div class="slide4"></div>
	<div class="slide2"></div>
	<div class="slide5"></div>
	<div class="slide3"></div>
	<div class="slide6"></div>
</div>

<div class="bottom">
	<div class="area">
		<div class="col navbar">
			<div class="nav" id="prev"></div>
			<div class="nav" id="next"></div>
			<div class="nav" id="dots"></div>
		</div>
		<div class="col slide">
			<div class="title" id="stitle" data-cycle-fx="scrollHorz" data-cycle-speed="700" data-cycle-delay="3000" data-cycle-next="#next" data-cycle-prev="#prev" data-cycle-pager="#dots" data-cycle-pager-template="" data-cycle-slides="> div">
				<div>Cocinas</div>
				<div class="rows">Hunter Douglas</div>
				<div>Cocinas</div>
				<div class="rows"><small>Pisos y revestimientos</small></div>
				<div>Cocinas</div>
				<div class="rows">Puertas de Baño</div>
			</div>
			<div class="caption" id="scaption" data-cycle-fx="fade" data-cycle-speed="700" data-cycle-delay="3000" data-cycle-next="#next" data-cycle-prev="#prev" data-cycle-pager="#dots" data-cycle-pager-template="" data-cycle-slides="> div">
				<div>Reinventamos el concepto de cocinas estilo italiano y lo adapatamos a nuestros matices</div>
				<div>Decora, ilumina y da vida a tus espacios con la más variada selección en persianas</div>
				<div>Diseños que combinarán con tu personalidad y manera de cocinar</div>
				<div>Superficies que dominarán tus entornos brindando confort y firmeza que perduran</div>
				<div>Simplicidad y distinción definidos por los conceptos que marcan tendencia</div>
				<div>Combinamos funcionalidad y estilo para crear un ambiente estimulante</div>
			</div>
			<div class="nature"></div>
		</div>
	</div>
</div>
