<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
Yii::app()->getClientScript()->registerCssFile(Yii::app()->theme->baseUrl.'/css/app-index.css'); 

?>

<h1><?php echo CHtml::encode(Yii::app()->name); ?></h1>

<?php 
$this->widget('booster.widgets.TbAlert', array(
	'fade' => true,
	'closeText' => '&times;', // false equals no close link
	'events' => array(),
	'htmlOptions' => array(),
	'userComponentId' => 'user',
	'alerts' => array( // configurations per alert type
		// success, info, warning, error or danger
		'success' => array('closeText' => '&times;'),
		'info' => array('closeText' => '&times;'),
		'warning' => array('closeText' => false),
		'error' => array('closeText' => false)
	),
));
?>
<div class="row">
	<?php foreach ($counter as $type => $number): ?>
		<?php if ($number!="0"): ?>
		 	<div class="count col-xs-6 col-md-4 <?php echo strtolower($type) ;?>" data-toggle="tooltip" data-title="<?php echo $number." Visitas al ".$type ;?>">
		 		<div class="pic col-xs-2 col-md-1"></div>
		 		<div class="num col-xs-4 col-md-3 ">
		 			<?php echo $number ;?>
		 			<div class="name"><?php echo $type ;?></div>
		 		</div>
		 	</div>
		<?php endif; ?>
	<?php endforeach; ?>


	<?php foreach ($social as $i => $data): ?>
		<?php if ($data['main']!="0" && $data['main']!=null): ?>
		 	<div class="count col-xs-6 col-md-4 <?php echo strtolower($data['class']) ;?>" data-toggle="tooltip" data-title="<?php echo $data['main']." ".$data['label'] ;?>">
		 		<div class="pic col-xs-2 col-md-1"></div>
		 		<div class="num col-xs-4 col-md-3 ">
		 			<?php echo ($data['main']==0 || $data['main']==null ? "0" : $data['main']) ;?>
		 			<div class="name"><?php echo $data['label'] ;?></div>
		 		</div>
		 	</div>
		<?php endif; ?>
	<?php endforeach; ?>
</div>
