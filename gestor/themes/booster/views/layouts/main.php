<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />
	<link type="image/ico" href="<?php echo Yii::app()->theme->baseUrl.'/img/favicon-app.ico' ;?>" rel="icon">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<!--[if IE]><link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl."/css/ie.css"; ?>" /><![endif]-->
	<?php 
	$cs = Yii::app()->getClientScript();
	$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/main.css'); 
	$cs->registerCoreScript('jquery');
	$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/main.js');
	?>
</head>

<body>
	<div id="main-container">
		<div id="cleft">		
			<div class="logo">
				<?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/img/logo.png','Logo',array('class'=>'media-screen')), array('/'));?>
				<?php echo CHtml::image(Yii::app()->theme->baseUrl.'/img/logo-print.png','Logo',array('class'=>'hidden media-print logo'));?><br>
				<?php echo CHtml::link('[SITIO]', dirname(Yii::app()->baseUrl), array('title'=>'Sitio Web', 'target'=>'_blank', 'class'=>'site'));?>
			</div>
			<div class="content">
				<div id="menu"><?php $this->widget('zii.widgets.CMenu',array('activateParents'=>false,'encodeLabel' => false,'items'=> Yii::app()->session['menuItems'])); ?></div>
				<?php if (!Yii::app(	)->user->isGuest): ?>
					<div class="perfil">
						<?php echo CHtml::image(Yii::app()->session['profilePicture']); ?>
						<?php echo CHtml::link('Perfil', $this->createAbsoluteUrl('/cruge/ui/editprofile/'), array('class'=>'editProfile')); ;?>
					</div>
				<?php endif; ?>
				<div class="footer in">
					<?php echo CHtml::link('Cerrar sesión ('.Yii::app()->user->name.')', Yii::app()->user->ui->logoutUrl, array('class'=>'log-out')) ;?>
				</div>
			</div>
		</div>
		<div id="cright">
			<div class="content container-fluid">
				<?php echo $content; ?>
				<div class="footer hidden"><?php echo Yii::app()->params['copyRights'] ;?></div>
			</div>
		</div>
	</div>
	<?php echo Yii::app()->user->ui->displayErrorConsole(); ?> 
</body>
</html>