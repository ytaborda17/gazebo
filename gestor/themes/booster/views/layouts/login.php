<?php /* @var $this Controller */  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />
	<link type="image/ico" href="<?php echo Yii::app()->theme->baseUrl.'/img/favicon-app.ico' ;?>" rel="icon">
	<title><?= CHtml::encode($this->pageTitle); ?></title>
</head>


<body class="bgc2">

	<div class="loginWrap">
		<div class="loginMain">
			<div class="loginPush">
				<div class="loginHead">
					<div class="row">
						<h1 class="invisible"><?php echo CHtml::encode(Yii::app()->name); ?></h1>
						<?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/img/logo.png', 'Logo'), array('/entrar'), array('class'=>'logo'));?>
					</div>
				</div>
				<div class="content">
					<?php echo $content; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="loginFoot bgc2"><?php echo Yii::app()->params['copyRights'] ;?></div>
</body>
</html>
