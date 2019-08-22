<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link type="image/ico" href="<?php echo Yii::app()->theme->baseUrl.'/img/favicon.ico' ;?>" rel="icon">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
	<div class="bgbg"></div>
	<div class="container">
		<div class="header-bg"></div>
		<div class="header">
			<div class="area">
				<?php echo CHtml::link(
					CHtml::image(Yii::app()->theme->baseUrl.'/img/logo.png', 'Logo'), 
					Yii::app()->getBaseUrl(true),
					array('target' => '_self','title' => 'Inicio','class' => 'logo',)
					)
				;?>
				<div class="side">
					<div class="invisible menu"></div>
					<div class="menucase">
						<div class="phone"><div><?php echo (Empresa::model()->findByPk(1)->telefono)?></div></div>
						<div class="mainmenu">
							<?php $this->widget('zii.widgets.CMenu',array('activateParents'=>false,'encodeLabel' => false,'items'=> $this->menu  )); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="content area">
			<?php echo $content; ?>
		</div>
	</div>
	<div class="footer">
		<div class="flinks">
			<div class="area">
				<?php echo Yii::app()->session['flinks'] ;?>
			</div>
		</div>
		<div class="copy">
			<div class="area">
				<?php echo str_replace("{empresa}", $this->empresa->nombre, Yii::app()->params['copyRights']) ;?>
				<span><?php echo $this->empresa->nombre." ".$this->empresa->rif ;?></span>
			</div>
		</div>
	</div>
</body>
</html>
