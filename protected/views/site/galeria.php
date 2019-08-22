<?php
/* @var $this SiteController */

Yii::app()->getClientScript()->registerCssFile(Yii::app()->theme->baseUrl.'/css/galeria.css'); 
Yii::app()->getClientScript()->registerCssFile(Yii::app()->theme->baseUrl.'/css/_popup.css'); 
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->theme->baseUrl.'/js/popup.min.js'); 


Yii::app()->clientScript->registerScript('gallery', "
   $( '.caption' ).each(function( index ) {
   	var \$this = $(this);

   	\$this.bind('click', function() {
   		$.post( '".$this->createUrl('site/galeriaImg')."', { g: \$this.attr('id') }, function( data ) {
   			if (data!=0 && data!='0') {
   				$('#modal-box').html(data);

   				$('.info').magnificPopup({
   				  	delegate: 'a',
   				  	type: 'image',
   					closeBtnInside: false,
   					gallery:{
   						enabled:true,
   					},
   					image: {
   						titleSrc: function(item) {
   							return item.el.attr('title') + '<small>'+ item.el.attr('gallery') +'</small>';
   						},
   					},
   				});
   				$('.info a:first-child').trigger('click');

   			};
   		});
   	});
   });
");

?>

<div class="bgbg"></div>
<div id="modal-box" class="modal-box">
</div>

<h1>Galer&iacute;a</h1>
<div class="gallery">
	<?php foreach ($galerias as $i => $gal): ?>
		<div class="group">
			<?php echo CHtml::image(Yii::app()->baseUrl.'/assets/galeria/'.$gal['file_name'],$gal['titulo']) ;?>
			<div class="caption" id="<?php echo $gal['id']?>">
				<div class="zoom"></div>
				<div class="name"><?php echo $gal['nombre'] ;?></div>
			</div>
		</div>
	<?php endforeach; ?>
</div>