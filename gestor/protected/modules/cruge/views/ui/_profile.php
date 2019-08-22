<?php  // inicio de campos extra definidos por el administrador del sistema 
if(count($model->getFields()) > 0){ ?>
	<?php foreach ($model->getFields() as $f): ?>
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
				<div class="form-group<?php echo ($form->error($model,$f->fieldname) != "" ? ' has-error' : '' ); ?>">
					<?php 
					if ($f->fieldname == "pic") {
						echo Yii::app()->user->um->getLabelField($f);
						echo $form->fileField($model,'pic',array('size'=>5,'maxlength'=>5));
						// echo Yii::app()->user->um->getFileField($model,$f);
					} 
					else {
						echo Yii::app()->user->um->getLabelField($f, $form->error($model,$f->fieldname) != "" ? ' control-label error' : ' control-label');
						echo Yii::app()->user->um->getInputField($model,$f, array('class' => $form->error($model,$f->fieldname) != "" ? 'form-control error' : 'form-control'));
						echo $form->error($model,$f->fieldname);
					}
					?>
				</div>		
			</div>
		</div>
	<?php endforeach; ?>
<?php } // fin de campos extra definidos por el administrador del sistema ?>