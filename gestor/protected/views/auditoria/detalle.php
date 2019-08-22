<?php
/* @var $this AuditoriaController */
/* @var $model AppAuditoria */

$city = $geoLocation['city']." ".($geoLocation['city']!=="" ? '<a href="https://www.google.co.ve/maps/@'.$geoLocation['latitude'].','.$geoLocation['longitude'].',11z?hl=es" class="txt-hover" target="_blank"><span class="iconCore16 iconLocation"></span> Buscar</a>' : '' );
$country = $geoLocation['countryName'].($geoLocation['countryName']!==""? " (".$geoLocation['countryCode'].")" : "");
$this->menu=array(
	array('label'=>'<span class="iconCore iconList"></span>Lista', 'url'=>array('Lista')),
);



?>
<div class="row">
   <div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">Datos</div>
			<div class="panel-body">
				<?php $this->widget('booster.widgets.TbDetailView', array(
					'type' => 'condensed',
					'data'=>$model,
					'attributes'=>array(
						'description',
						'action',
						'model',
						'model_id',
						'field',
						'time_stamp'=> array(
							'name' =>'time_stamp',
							'type' => 'raw',
							'value'=> Auditoria::model()->getTime($model), 
						),
						'user_id'=>array(
							'name'   => 'user_id',
							'type'   => 'raw',
							'value'  => Auditoria::model()->getUser($model), 
				      ),
					),
				)); ?>
			</div>
		</div>
	</div>
   <div class="col-md-4">
		<?php if ($geoLocation['geoLocStatus']!="" && $geoLocation['city']!="" && $geoLocation['region']!="" && $geoLocation['countryName']!="" ): ?>
			<div class="panel panel-default">
		  		<div class="panel-heading">Ubicación</div>
				<div class="panel-body">
					<?php $this->widget('booster.widgets.TbDetailView', array(
					'type' => 'condensed',
					'data'=>$model,
						'attributes'=>array(
							'ipAddress',
							array(
								'name'=> 'Ciudad',
								'type'=> 'raw',
								'value'=>$city,
							),
							array(
								'name'=> 'Estado/Región',
								'type'=> 'raw',
								'value'=>$geoLocation['region'],
							),
							array(
								'name'=> 'País',
								'type'=> 'raw',
								'value'=>$country,
							),
						),
					)); ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>

<br>