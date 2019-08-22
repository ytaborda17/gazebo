<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
Yii::app()->getClientScript()->registerCssFile(Yii::app()->theme->baseUrl.'/css/app-index.css'); 
?>

<h1>Estadísticas</h1>

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
	<?php foreach ($social as $i => $data) if ($data['main']!=0 && $data['main']!=null): ?>
		<div class="col-xs-12 col-sm-6 col-md-4">
			<?php $this->widget('booster.widgets.TbHighCharts',array(
				'options' => array(
					'exporting'=> array('enabled'=> false),
					'credits'=>array('enabled'=>false,),
					'series'=> array([
						'type'=> 'pie',
						'name'=> $data['nombre'],
						'innerSize'=> '50%',
						'data'=> $data['count']
					]),
					'title' => array(
						'text' => ucfirst($data['nombre']),
						'align' => 'center',
		            'verticalAlign' => 'middle',
		            'y' => 50,
						),
					'chart' => array(
						'height' => 150,
						'plotBackgroundColor' => 'white',
						'plotBorderWidth' => 1,
						'plotShadow' => false
						),
					'tooltip'=> array(
						'headerFormat'=> '<span style="font-size:11px">{series.name}</span><br>',
		            'pointFormat'=> '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:..0f}</b>'
						),
					'plotOptions'=> array(
						'pie'=> array(
							'allowPointSelect'=> false,
		               'cursor'=> 'pointer',
							'dataLabels'=> array(
								'enabled'=> true,
								// 'distance'=> -50,
								'crop'=> false,
								'overflow'=> 'none',
								'style'=> array(
									'fontWeight'=> 'bold',
									'color'=> 'white',
									'textShadow'=> '0px 1px 2px 0px',
									'color'=> "(Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black' ",
									)
								),
							'startAngle'=> -90,
							'endAngle'=> 90,
							'center'=> ['50%', '75%']
							)
						),
					)
				));
			?>
		</div>
	<?php endif; ?>
</div>
<div class="row">
	<?php $this->widget('booster.widgets.TbTabs',array(
     'type' => 'tabs', // 'tabs' or 'pills'
     'justified' => true,
     'tabs' => array(
     	array(
     		'label' => 'Ultimos 30 días',
			'content' => $this->renderPartial('_mes',array('model'=>$model,),true),
     		),
     	array(
     		'label' => '6 meses', 
			'content' => $this->renderPartial('_semestre',array('model'=>$model,),true),
     		'active' => true
     		),
     	array('label' => 'Por estados', 'content' => 'Grafica por estados Venezolanos'),
     	),
     	)); ?>
</div>