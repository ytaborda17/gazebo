<?php /* @var $this Controller */  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />
	<?php 
		$cs         = Yii::app()->getClientScript();
		$cssexclude =array();
		$jsexclude  =array();

		$dir = array_diff( scandir(Yii::app()->theme->basePath.'/css/'), array('..', '.') );
		foreach ($dir as $i => $file) {
			if ( substr($file,strlen($file)-3,3)=="css" && in_array($file, $cssexclude)===false ) { 
				$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/'.$file); }
		}
		$cs->registerCoreScript('jquery');

	?>
	<title><?= CHtml::encode($this->pageTitle); ?></title>
	<!--[if !IE 7]>
	    <style type="text/css">
	        body {display:table;height:100%}
	    </style>
	<![endif]-->
</head>

<body class="bgc2">
	<div class="loginWrap">
		<div class="loginHead">
			<?php if ( ($msgs =Yii::app()->user->getFlashes())!==null ): ?>
				<?php foreach ($msgs as $type => $message): ?>
					<div class="content alert alert-<?= $type ;?>" style="padding:auto;">
						<div style="width:80%; margin:auto; text-align:left;">
							<button type="button" class="close" data-dismiss="alert" onclick="$(this).parent().slideUp(200, function(){ $(this).remove(); });">&times;</button>
							<span>
								<h4><?= "¡".ucfirst($type)."!" ;?></h4>
								<?= $message ;?>
							</span>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
			<div class="row">
				<h1 class="invisible"><?php echo CHtml::encode(Yii::app()->name); ?></h1>
				<a href="<?= Yii::app()->baseUrl ;?>/index.php"><img class="logo" src="<?= Yii::app()->baseUrl ;?>/images/logo-company.png"></a>
			</div>
		</div>
		<div class="content">
				<?php echo $content; ?>
		</div>
	</div>
	<div class="loginFoot bgc2">
		<?php /*<p>Copyright &copy; 2014 Todos los derechos reservados.</p>*/ ;?>
	</div>
</body>
</html>
