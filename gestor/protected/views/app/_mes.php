<?php 
$this->widget('booster.widgets.TbHighCharts',array(
	'options' => array(
		'exporting'=> array('enabled'=> false),
		'credits'=>array('enabled'=>false,),
		'title' => array(
			'text' => 'Visitas de los últimos 30 días',
          'x' => -20 //center
          ),
		'legend' => array(
			'layout' => 'vertical',
			'align' => 'center',
			'verticalAlign' => 'bottom',
			'borderWidth' => 0
			),
		'series' => array(
			[
			'data' => [1, 2, 3, 4, 5, 1, 2, 1, 4, 3, 1, 5,20]
			]
			)
		),
		'htmlOptions' => array(
			'class' => 'col-xs-12 col-md-12',
			'style' => 'position:static',
			),
		// 'htmlOptions' => array('style' => 'min-width:100%; margin:0 auto'),
	));