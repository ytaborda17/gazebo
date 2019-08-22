<?php 

$this->widget('booster.widgets.TbHighCharts',array(
	'options' => array(
		'exporting'=> array('enabled'=> false),
		'credits'=>array('enabled'=>false,),
		'title' => array(
			'text' => 'Visitas de los últimos 6 meses',
          'x' => -20 //center
          ),
		'xAxis' => array(
			'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'	]
			),
		'yAxis' => array(
			'title' => array('text' =>  'Visitas totales',),
			'plotLines' => [
					[
					'value' => 0,
					'width' => 1,
					'color' => '#808080'
					]
				],
			),
		'tooltip' => array('valueSuffix' => '°C'),
		'legend' => array(
			'layout' => 'vertical',
			'align' => 'center',
			'verticalAlign' => 'bottom',
			'borderWidth' => 0
			),
		'series' => array(
			[
			// 'name' => 'Tokyo',
			'data' => [7.0, 6.9, 9.5, 14.5, 18.2, 21.5]
			],
			)
		),
		'htmlOptions' => array('style' => 'width:100%; margin:0 auto; position:relative'),
	));