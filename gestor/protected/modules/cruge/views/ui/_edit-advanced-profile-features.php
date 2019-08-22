<?php 
	/*
		este es un subform, incluido dentro de:	usermanagementupdate.php
		
		se encarga de presentar opciones avanzadas del usuario que solo son realizables
		bajo un ROLE llamado 'admin'
		
		recibe argumentos:
		
		$model: instancia de ICrugeStoredUser, cuyos campos personalizados estan disponibles.
		$form: el formulario mayor
	*/

	Yii::app()->clientScript->registerCoreScript('jquery');

?>

<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
	<?php echo $form->dropDownListGroup( $model, 'state', array( 
		'widgetOptions' => array(
			'data' => Yii::app()->user->um->getUserStateOptions(),
			)
		)); ?>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php if($model->state == CRUGEUSERSTATE_NOTACTIVATED) {

			$this->widget(
				'booster.widgets.TbButton',
				array(
					'label' => ucfirst(CrugeTranslator::t("reenviar correo de activacion")),
					'buttonType' => 'ajaxSubmit',
					'url' => Yii::app()->user->ui->getAjaxResendRegistrationEmailUrl($model->getPrimaryKey()),
					'ajaxOptions' => array(
						'type' => 'POST',
						'success' => 'function(data) { 
							$("#resendStatus").html(data);
							setTimeout(function(){ $("#resendStatus").html(""); },3000);
						}',
						),
					'tooltip' => true,
					'tooltipOptions' => array(
						'animation' => true,
						'title' => ucfirst(CrugeTranslator::t("esta accion creara una nueva clave.")),
						'placement' => 'right',
						),
					)
				);

			echo '<p class="hint" id="resendStatus"></p><br>';

		}?>
	
	</div>
</div>


<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<label class="control-label">Asignar roles</label>
		<?php  
		$rbac = Yii::app()->user->rbac; // consulta la lista de roles asignados al usuario
		$listaRolesAsignados = $rbac->getAuthAssignments($model->getPrimaryKey()); // lista todos los roles y marca aquellos asignados al usuario

		foreach($rbac->roles as $rol) : ?>
			<?php if (Yii::app()->params['showInvitado'] && Yii::app()->user->isSuperAdmin): ?>
			
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
						<?php foreach($listaRolesAsignados as $ra){
							$state = false;
							if($ra->itemName === $rol->name){
								$state = true;
								break;
							}
						}	
						echo $rol->name.' ';
						$this->widget(
							'booster.widgets.TbSwitch',
							array(
								'name' => trim($rol->name),
								'value' => $state,
								'options' => array('size' => 'mini',),
								'events' => array(
									'switchChange' => 'js:function($el, status, e){
										var action = "'.Yii::app()->user->ui->getRbacAjaxAssignmentUrl().'";
										var grantjsondata = "{ \"authitem\": \"'.$rol->name.'\" , "	+"\"userid\": \"'.$model->getPrimaryKey().'\" , \"setflag\": "+status+" }";
										$.post( action, grantjsondata);
									}',
									),
								)
							);

						echo '<br><br>';
					
						?>
					</div>
				</div>

			<?php elseif ($rol->name!='Invitado'): ?>
			
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
						<?php foreach($listaRolesAsignados as $ra){
							$state = false;
							if($ra->itemName === $rol->name){
								$state = true;
								break;
							}
						}	
						echo $rol->name.' ';
						$this->widget(
							'booster.widgets.TbSwitch',
							array(
								'name' => trim($rol->name),
								'value' => $state,
								'options' => array('size' => 'mini',),
								'events' => array(
									'switchChange' => 'js:function($el, status, e){
										var action = "'.Yii::app()->user->ui->getRbacAjaxAssignmentUrl().'";
										var grantjsondata = "{ \"authitem\": \"'.$rol->name.'\" , "	+"\"userid\": \"'.$model->getPrimaryKey().'\" , \"setflag\": "+status+" }";
										$.post( action, grantjsondata);
									}',
									),
								)
							);

						echo '<br><br>';
						
						?>
					</div>
				</div>

			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>
