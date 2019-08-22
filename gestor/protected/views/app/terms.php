<?php
/* @var $this CrugeController */
/* @var $model about */

$cs         = Yii::app()->getClientScript();
$cssexclude =array('ver-detalle.css');

$dir = array_diff( scandir(Yii::app()->theme->basePath.'/css/'), array('..', '.') );
foreach ($dir as $i => $file) if ( substr($file,strlen($file)-3,3)=="css" && in_array($file, $cssexclude)===false ) { 
	$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/'.$file); 
}
?>

<h1>Terminos y condiciones</h1>
<br />
<p style="text-align: justify;text-justify: inter-word;">
	<?php echo nl2br($terms); ?>
</p>	
