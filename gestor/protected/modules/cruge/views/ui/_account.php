<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php echo $form->textFieldGroup( $model, 'username', array( 'prepend' => '<i class="glyphicon glyphicon-user"></i>' ) ); ?>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php echo $form->textFieldGroup( $model, 'email', array( 'prepend' => '<i class="glyphicon glyphicon-envelope"></i>' ) ); ?>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php 

			echo $form->passwordFieldGroup( $model, 'newPassword', array( 'prepend' => '<i class="glyphicon glyphicon-lock"></i>' ) ); 
			
			$this->widget(
				'booster.widgets.TbButton',
				array(
					// 'context' => 'primary',
					'label' => CrugeTranslator::t("Generar una nueva clave"),
					'buttonType' => 'ajaxSubmit',
					'url' => Yii::app()->user->ui->ajaxGenerateNewPasswordUrl,
					'ajaxOptions' => array(
						'type' => 'POST',
						'success' => 'function(data) { 
							$("#CrugeStoredUser_newPassword").val(data)
						}',
						'error' => 'function(e) { 
							alert("error: "+e.responseText);
						}',
						)
					)
				);

		?>
		<br>
		<br>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
		<?php $this->widget('booster.widgets.TbPanel',array(
			'title' => 'Uso de la cuenta',
			'headerIcon' => 'calendar',
			'content' => 
				$form->labelEx($model,'regdate').': '.Yii::app()->user->ui->formatDate($model->regdate). '<br>'.
				$form->labelEx($model,'actdate').': '.Yii::app()->user->ui->formatDate($model->actdate). '<br>'.
				$form->labelEx($model,'logondate').': '.Yii::app()->user->ui->formatDate($model->logondate). '<br>'
			));?>
	</div>
</div>