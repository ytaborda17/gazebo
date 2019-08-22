<?php 
	/*
		esta es una subvista referenciada por: 
				_listauthitems.php
		quien a su vez es renderizada por:
				rbaclisttasks.php
				rbaclistroles.php
				rbaclistops.php
			
		$data es una instancia de CAuthItem
	*/

	$rbac = Yii::app()->user->rbac;


	$asignaciones = $rbac->getCountUsersAssigned($data->name);
	
	$referencias =  $rbac->getParents($data->name);
	$count_ref = count($referencias);

	// da un color especial a aquellos TASK que son marcadas como
	// MENUES o SUBMENUES usando la sintaxis de la descripcion del CAuthItem
	//
	$colorEspecialBkTaskTipoMenuitem='';
	if($data->type == CAuthItem::TYPE_TASK){
		$extra='';
		if($rbac->isTaskTopMenuItem($data))
			$extra = 'border: 2px solid gray;';
		if($rbac->isTaskMenuItem($data))	
			$colorEspecialBkTaskTipoMenuitem="style='background-color: #ffffe0;{$extra}'";
		if($rbac->isTaskSubMenuItem($data)){	
			$colorEspecialBkTaskTipoMenuitem="style='background-color: #e0ffff;{$extra}'";
			if(!$rbac->getParentMenuAuthItem($data))
				$colorEspecialBkTaskTipoMenuitem="style='background-color: #ffaaaa;{$extra}'";
		}
	}

	
	// crea un DropDownList con las operaciones de la tarea
	// pre seleccionando aquella que esta marcada en la sintaxis de la tarea
	//
	//	el evento 'onchange' del dropdown sera manejado en la vista maestra:
	//		_listaauthitems.php
	//
	$oplist = '';
	if($data->type == CAuthItem::TYPE_TASK){
		if($rbac->isTaskSubMenuItem($data)){
			// enumera las operaciones bajo esta tarea	
			$oplistitems = array();
			foreach($rbac->getItemChildren($data->name) as $item)
				if($item->type == CAuthItem::TYPE_OPERATION)
					if(strtolower(substr($item->name,0,7))=='action_')
						$oplistitems[] = $item;

			if(!empty($oplistitems)){
				// tiene operaciones hijas
				$current_action = $rbac->getTaskActionItemName($data);
				$oplist = CHtml::dropDownList('crugeavailableops_'.$data->name
						,$current_action
						,array(''=>'--'.CrugeTranslator::t('seleccione action')
							.'--')+CHtml::listData($oplistitems,'name','name')
						,array('alt'=>$data->name)
					);
			}
		}	
	}

	//  a las TAREAS que son menues de 1er nivel les crea un link ajax
	//	para que el usuario cree una nueva tarea hija (sub menu) con 
	//  la sintaxis de enlace lista.
	$newChildTask='';
	if($data->type == CAuthItem::TYPE_TASK){
		if($rbac->isTaskTopMenuItem($data)){

			$url = Yii::app()->user->ui->getRbacAuthItemCreateUrl(
				CAuthItem::TYPE_TASK, $data->name);

			$newChildTask = CHtml::link(
				 CrugeTranslator::t("Nuevo sub menu"),$url);
		}
	} 


?>



<?php if (Yii::app()->params['showInvitado'] && Yii::app()->user->isSuperAdmin): ?>
	<?php 

	$box = $this->beginWidget('booster.widgets.TbPanel',array(
			'title' => $data->name,
			// 'headerIcon' => 'th-list',
			'padContent' => true,
			'htmlOptions' => array('class' => 'bootstrap-widget-table'),
			'headerButtons' => array(
				array(
					'class' => 'booster.widgets.TbButtonGroup',
					'buttons' => array(
						array(
							'buttonType' => 'link', 
							'icon' => 'edit', 
							'htmlOptions' => array('title' => 'Editar'), 
							'url' => Yii::app()->user->ui->getRbacAuthItemUpdateUrl($data->name)),
						array(
							'buttonType' => 'link', 
							'icon' => 'trash', 
							'disabled' => ($asignaciones > 0) ? true : false,
							'htmlOptions' => array('title' => 'Borrar'),
							'url' => Yii::app()->user->ui->getRbacAuthItemDeleteUrl($data->name))
						),
					),
				)
			)
		);

	?>
		<?php echo $data->description ;?>.<br>
		<?php if ($asignaciones > 0): ?>
			Asignado a <b><?php echo $asignaciones ;?> usuarios.</b>
			<br>
		<?php endif; ?>

		<?php 
			if($count_ref > 0) {
				echo "<a class='referencias' title='".CrugeTranslator::t("muestra aquellos objetos que hacen referencia a ")." ".$data->name.""."' href='#'>".$count_ref." refs.</a>";
				echo "<ul class='detallar-referencias'>";
				foreach($referencias as $ref)
					echo "<li>".CHtml::link(
						$ref->name
						,Yii::app()->user->ui->getRbacAuthItemChildItemsUrl($ref->name)
						,array('target'=>'_blank')
						)."</li>";
				echo "</ul>";
			}
			echo "<br>";
			
			if($data->type != CAuthItem::TYPE_OPERATION) {
				$this->widget('booster.widgets.TbButton',array(
					'label' => ucfirst(CrugeTranslator::t("editar permisos")),
					'buttonType' => 'link',
					'icon'=>'hand-up',
					'size' => 'small',
					'url' => Yii::app()->user->ui->getRbacAuthItemChildItemsUrl($data->name),
					)
				);
				echo ' ';
			}

		?>
		<br>

		<div class='row' <?php echo $colorEspecialBkTaskTipoMenuitem;?> >
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
				<?php if($oplist != '') { ?>
				<div style='float: right;' title='<?php echo CrugeTranslator::t("action que sera tomado como url del menuitem") ?>' >
					<?php 
						echo CrugeTranslator::t("Action Maestro")." : ".$oplist;
					?>
				</div>
				<?php } ?>

				<?php if($newChildTask != '') { ?>
				<div style='float: right;' title='<?php echo CrugeTranslator::t("Creara un sub menu item enlazado a esta tarea.") ?>' >
					<?php 
						echo $newChildTask;
					?>
				</div>
				<?php } ?>
			</div>
		</div>
	
	<?php $this->endWidget(); ?>

<?php elseif ($data->name != "Invitado" ): ?>
	
	<?php 
	if ($data->type == CAuthItem::TYPE_OPERATION) {
		$counter_tag = '<span class="alert-'.( $count_ref>0 ? "success" : "").' badge" data-toggle="tooltip" data-title="Muestra aquellos roles con acceso o permiso a ['.$data->name.']">'.$count_ref.'</span>';
	} else {
		$counter_tag = '<span class="alert-'.( $asignaciones>0 ? "success" : "").' badge" data-toggle="tooltip" data-title="Usuarios asignados al rol ['.$data->name.']">'.$asignaciones.'</span>';
	}
	$box = $this->beginWidget('booster.widgets.TbPanel',array(
		'title' => $data->description." (".$data->name.") ".$counter_tag,
		// 'headerIcon' => 'th-list',
		'padContent' => true,
		'htmlOptions' => array('class' => 'bootstrap-widget-table'),
		'headerButtons' => array(
			array(
				'class' => 'booster.widgets.TbButtonGroup',
				'buttons' => array(
					array(
						'buttonType' => 'link', 
						'icon' => 'edit', 
						'htmlOptions' => array('title' => 'Editar'), 
						'url' => Yii::app()->user->ui->getRbacAuthItemUpdateUrl($data->name)),
					array(
						'buttonType' => 'link', 
						'icon' => 'trash', 
						'disabled' => ($asignaciones > 0) ? true : false,
						'htmlOptions' => array('title' => 'Borrar'),
						'url' => Yii::app()->user->ui->getRbacAuthItemDeleteUrl($data->name))
					),
				),
			)
		)); ?>

		<?php if ($asignaciones > 0): ?>
			Asignado a <b><?php echo $asignaciones ;?> usuarios.</b>
			<br>
		<?php endif; ?>

		<?php 
			if($count_ref > 0) {
				// echo "<a class='referencias' title='".CrugeTranslator::t("muestra aquellos objetos que hacen referencia a ")." ".$data->name.""."' href='#'><span class=\"badge alert-success\">".$count_ref."</span> refs.</a>";
				echo "<ul class='detallar-referencias'>";
				foreach($referencias as $ref)
					echo "<li>".CHtml::link(
						$ref->name
						,Yii::app()->user->ui->getRbacAuthItemChildItemsUrl($ref->name)
						,array('target'=>'_blank')
						)."</li>";
				echo "</ul>";
			} elseif($data->type == CAuthItem::TYPE_OPERATION) {
				echo 'Solo es accesible por el <span class="label label-warning">Super-Administrador</span>';
			}
			echo "<br>";
			
			if($data->type != CAuthItem::TYPE_OPERATION) {
				$this->widget('booster.widgets.TbButton',array(
					'label' => ucfirst(CrugeTranslator::t("editar permisos")),
					'buttonType' => 'link',
					'icon'=>'hand-up',
					'size' => 'small',
					'url' => Yii::app()->user->ui->getRbacAuthItemChildItemsUrl($data->name),
					)
				);
				echo ' ';
			}

		?>
		<br>

		<div class='row' <?php echo $colorEspecialBkTaskTipoMenuitem;?> >
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
				<?php if($oplist != '') { ?>
				<div style='float: right;' title='<?php echo CrugeTranslator::t("action que sera tomado como url del menuitem") ?>' >
					<?php 
						echo CrugeTranslator::t("Action Maestro")." : ".$oplist;
					?>
				</div>
				<?php } ?>

				<?php if($newChildTask != '') { ?>
				<div style='float: right;' title='<?php echo CrugeTranslator::t("Creara un sub menu item enlazado a esta tarea.") ?>' >
					<?php 
						echo $newChildTask;
					?>
				</div>
				<?php } ?>
			</div>
		</div>
	
	<?php $this->endWidget(); ?>
		
<?php endif; ?>




