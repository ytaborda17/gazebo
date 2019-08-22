<?php  

$this->pageTitle = 'Editar permisos - ' . Yii::app()->name ;

// permite al usuario seleccionar los AuthItems que conforman a ROLE o TASK
// las OPERATIONS no tienen childs.
//
// argumentos recibidos:
//
// $model: instancia de CAuthItem
//

$rbac = Yii::app()->user->rbac;
$roles = $rbac->getRoles();
$tareas = $rbac->getTasks();
$operaciones = $rbac->getOperations();
// items asignados a la instancia de CAuthItem seleccionado ($model)
$childrens = $rbac->getItemChildren($model->name);

// ROLES
$treeDataRoles = array();	
// TASKS
$treeDataMenu = array();
$treeDataError = array();
$treeDataRegular = array();
// OPERATIONS
$treeDataOps = array();

// titulos
echo "<h1>".ucfirst($model->name)." (".CrugeTranslator::t($rbac->getAuthItemTypeName($model->type)).") <small>".$model->description."</small></h1>";


echo CHtml::openTag('div', array('class' => 'bs-navbar-top'));
$this->widget('booster.widgets.TbNavbar',array(
	'brand' => 'Opciones',
	'brandUrl' => '#',
	'fixed' => 'top',
	'fluid' => true,
	'htmlOptions' => array('style' => 'position:absolute; top:70px;'),
	'items' => array(
		array(
			'class' => 'booster.widgets.TbMenu',
			'type' => 'navbar',
			'items' => array(
				array('label' => 'Lista', 'url' => $this->createAbsoluteUrl('ui/rbaclistroles'), 'icon'=>'th-list'),
				array('label' => 'Nuevo', 'url' => Yii::app()->user->ui->getRbacAuthItemCreateUrl(CAuthItem::TYPE_ROLE), 'icon'=>'plus'),
				array('label' => 'Editar permisos', 'url' => '#', 'icon'=>'hand-up', 'active' => true),
				)
			)
		)
	));
echo CHtml::closeTag('div');

echo "<p class='text-muted'>".ucfirst(CrugeTranslator::t("haga click en un item para activarlo o desactivarlo"))."</p>";

//  LISTA DE ROLES 
//		si hay roles definidos y la vista no es para un TASK.
//
if((count($roles) > 0) && ($model->type != CAuthItem::TYPE_TASK)){
	
	foreach($roles as $item){
		$asignado = isset($childrens[$item->name]) ? 'checked' : '';
		$loop = $rbac->detectLoop($model->name,$item->name) ? "loop" : "" ;
		$treeDataRoles[] = array(
			'id'=>$item->name,
			// 'text'=>"<span class='switch {$asignado} {$loop}'>".$item->name."</span>".$imgPin,
			'text'=>"<span class='switch {$asignado} {$loop}'>".$item->name."</span>",
			'htmlOptions'=>array('class'=>'authitem',
				'alt'=>$item->name),
		);
	}
}

// LISTA DE TAREAS - organizadas segun el uso de sintaxis en descripcion
//	(leer acerca de la sintaxis en la clase CrugeAuthManager)
if(count($tareas) > 0){
	$taskinfo = $rbac->explodeTaskArray($tareas);

	// despliega las tareas que son MENU y SUBMENU pero usando
	// un TreeView
	//
	if(count($taskinfo['topmenu']) > 0)
	{
		foreach($taskinfo['topmenu'] as $topTask){
			$text = $rbac->getTaskText($topTask);
			$hasChildren = false;
			$children = array();
			if(isset($taskinfo['childmenu'][$topTask->name]))
			foreach($taskinfo['childmenu'][$topTask->name] as $child){
				$asignado = isset($childrens[$child->name]) ? 
					'checked' : '';
				$loop = $rbac->detectLoop($model->name,$child->name) ? 
					"loop" : "" ;
				$hasChildren = true;
				$children[] = array(
					'id'=>$child->name,
					'text'=>"<span class='switch itemchildtext authitemsub {$asignado} {$loop}'>".$rbac->getTaskText($child)."</span>",
					'htmlOptions'=>array('class'=>'authitemchild'
						,'alt'=>$child->name
						,'title'=>$child->name),
				);
			}
			$asignado = isset($childrens[$topTask->name]) ? 'checked' : '';
			$loop = $rbac->detectLoop($model->name,$topTask->name) ? 
					"loop" : "" ;
			$treeDataMenu[] = array(
				'id'=>$topTask->name,
				'text'=>"<span class='switch itemtext authitemtop {$asignado} {$loop}'>".$text."</span>",
				'expanded'=>false,
				'hasChildren'=>$hasChildren,
				'children'=>$children,
				'htmlOptions'=>array('class'=>'authitem',
						'alt'=>$topTask->name, 'title'=>$topTask->name),
			);
		}
	}

	// Muestra las tareas que fueron consideradas menues pero sus
	// nodos padre no existen. (tienen su sintaxis de descripcion errada).
	if(count($taskinfo['orphan'])>0)
		foreach($taskinfo['orphan'] as $orpTask){
			$asignado = isset($childrens[$orpTask->name]) ? 'checked' : '';
			$loop = $rbac->detectLoop($model->name,$orpTask->name) ? 
					"loop" : "" ;
			$treeDataError[] = array(
				'id'=>$orpTask->name,
				'text'=>"<span class='switch {$asignado} {$loop}'>".$rbac->getTaskText($orpTask)."</span>",
				'expanded'=>false,
				'hasChildren'=>false,
				'htmlOptions'=>array('class'=>'authitem'
					, 'alt'=>$orpTask->name),
			);
		}

	// Muestra las tareas regulares, aquellas no marcadas con sintaxis.
	// en otras palabras las tareas comunes y silvestres!
	if(count($taskinfo['regular'])>0)
		foreach($taskinfo['regular'] as $task){
			$asignado = isset($childrens[$task->name]) ? 'checked' : '';
			$loop = $rbac->detectLoop($model->name,$task->name) ? 
					"loop" : "" ;
			$treeDataRegular[] = array(
				'id'=>$task->name,
				'text'=>"<span class='switch {$asignado} {$loop}'>".$task->name."</span>",
				'expanded'=>false,
				'hasChildren'=>false,
				'htmlOptions'=>array('class'=>'authitem',
					'alt'=>$task->name),
			);
		}
}

// LISTA DE OPERACIONES	- organizadas con un filtro
//
if(count($operaciones) > 0){

	// arma una lista de categorias en conjunto con el dato 'filter'
	// usado para agrupar las operaciones con el metodo:
	//	$rbac->getOperationsFiltered(...)
	//
	$listacatg = array();
	/**/
	if (Yii::app()->user->isSuperAdmin) {
		$listacatg['1'] = CrugeTranslator::t('Variadas');
		$listacatg['3'] = CrugeTranslator::t('Controladores'); 
	}
	foreach($rbac->enumControllers() as $controllerName) {
		if (!in_array($controllerName, Yii::app()->params['controllerNotAllowed'])) 
			$listacatg[$controllerName] = $controllerName;
		elseif (in_array($controllerName, Yii::app()->params['controllerNotAllowed']) && Yii::app()->user->isSuperAdmin) 
			$listacatg[$controllerName] = $controllerName;
		
	}
	if (Yii::app()->user->isSuperAdmin) {
		$listacatg['2'] = 'Sistema'; // CrugeTranslator::t('Cruge (super-admin)');
	}

	// cada categoria es un sub nodo del arbol CTreeView::operations
	//
	foreach($listacatg as $catg_filter => $catg_name){
		$childs = array();
		foreach($rbac->getOperationsFiltered($catg_filter, $operaciones) 
			as $item){
			// por cada operacion filtrada por $filter la agrega

			$asignado = isset($childrens[$item->name]) ? 'checked' : '';
			$loop = $rbac->detectLoop($model->name,$item->name) ? 
					"loop" : "" ;

			$childs[] = array(
				'id'=>$item->name,
				'text'=>"<span class='switch {$asignado} {$loop}'>".$item->description."</span>",
				'htmlOptions'=>array('class'=>'authitem',
					'alt'=>$item->name),
			);
		}

		$treeDataOps[] = array(
			'text'=>$catg_name,
			'hasChildren'=>(count($childs)>0) ? true:false,
			'expanded'=>false,
			'children'=>$childs,
		);
	}

}

// por razones de generar orden, no le da al usuario la posibilidad
// de que a una tarea tipo subitem la componga de otros subitems
// si se va a generar un enredo (para el).
//
if($model->type == CAuthItem::TYPE_ROLE){
	$arrayTareas = array(
		array(
			'text'=>"<b>".CrugeTranslator::t(
				"Tareas Regulares")."</b>", 
			'expanded'=>true, 
			'hasChildren'=>(count($treeDataRegular)>0) ? true : false,
			'children'=>$treeDataRegular,
		),
		array(
			'text'=>"<b>".CrugeTranslator::t(
				"Tareas de tipo Menu")."</b>", 
			'expanded'=>true, 
			'hasChildren'=>(count($treeDataMenu)>0) ? true : false,
			'children'=>$treeDataMenu,
		),
		array(
			'text'=>"<b>".CrugeTranslator::t(
				"Tareas Huerfanas")."</b>", 
			'expanded'=>true, 
			'hasChildren'=>(count($treeDataError)>0) ? true : false,
			'children'=>$treeDataError,
		),
	);
}else{
	$arrayTareas = array(
		array(
			'text'=>"<b>".CrugeTranslator::t(
				"Tareas Regulares")."</b>", 
			'expanded'=>true, 
			'hasChildren'=>(count($treeDataRegular)>0) ? true : false,
			'children'=>$treeDataRegular,
		),
		array(
			'text'=>"<b>".CrugeTranslator::t(
				"Tareas Huerfanas")."</b>", 
			'expanded'=>true, 
			'hasChildren'=>(count($treeDataError)>0) ? true : false,
			'children'=>$treeDataError,
		),
	);
}

$this->widget('CTreeView',array(
	'id'=>'auth-item-tree',
	'persist'=>'cookie',
	'data'=>
	array(

		/**/
		/*
		// ROLES  TREENODE
		array(
			'text'=>"<b>".CrugeTranslator::t("Roles")."</b>", 
			'expanded'=>true, 
			'children'=>$treeDataRoles,
		),//end roles treenode

		// TAREAS TREENODE
		array(
			'text'=>"<b>".CrugeTranslator::t("Tareas")."</b>", 
			'expanded'=>true, 
			'children'=>$arrayTareas,
		),//end tareas treenode*/

		// OPERATIONS  TREENODE
		array(
			'text'=>"<b>".CrugeTranslator::t(
				"Operaciones organizadas por tipo")."</b>", 
			'expanded'=>true, 
			'children'=>$treeDataOps,
		),//end operations treenode
		
	)
));
?>


<script>
	$('span.switch').each(function(){

		$(this).click(function(){

			var _li = $(this).parent('li');
			var thisItemName = _li.attr('alt');
			var span = _li.find('span');

			var setFlag = span.hasClass('checked') ? false : true; 

			var action = '<?php echo Yii::app()->user->ui->getRbacAjaxSetChildItemUrl()?>';
			var jsondata = "{ \"parent\": \"<?php echo $model->name;?>\" , \"child\": "+"\""+thisItemName+"\" , \"setflag\": "+setFlag+" }";	
			var loadingUrl = '<?php echo Yii::app()->theme->baseUrl."/img/loading.gif"; ?>';

			$('#_errorResult').html("");
			jQuery.ajax({
				url: action,
				type: 'post',
				async: true,
				cached: false,
				data: jsondata,
				success: function(data, textStatus, jqXHR){
					if(data.result == true){
						span.addClass("checked");
					}else{
						span.removeClass("checked");
					}
				},
			});
		});
	});

	
</script>

<div id='_errorResult'></div>
<div id='_log'></div>

<?php 
/*Yii::app()->clientScript->registerScript('', "

$('span.switch').each(function(){

	$(this).click(function(){

		var _li = $(this).parent('li');
		var thisItemName = _li.attr('alt');
		var span = _li.find('span');

		var setFlag = span.hasClass('checked') ? false : true; 

		var action = '".Yii::app()->user->ui->getRbacAjaxSetChildItemUrl()."';
		var jsondata = { 'parent': '".$model->name."' , 'child': +thisItemName , 'setflag': +setFlag };	
		var loadingUrl = '".Yii::app()->theme->baseUrl."/img/loading.gif';

		$('#_errorResult').html('');
		jQuery.ajax({
			url: action,
			type: 'post',
			async: true,
			cached: false,
			data: jsondata,
			success: function(data, textStatus, jqXHR){
				if(data.result == true){
					span.addClass('checked');
				}else{
					span.removeClass('checked');
				}
			},
			error: function(jqXHR, textStatus, errorThrown){
				console.log('no se pudo agregar => '+jqXHR.responseText+');

				/*$('#_errorResult').html('<p class=\"auth-item-error-msg\">'+'no se pudo agregar<br/>'+jqXHR.responseText+'</p>');
				$('#_errorResult').show('slow');
				setTimeout(function(){
					$('#_errorResult').hide('slow');
					$('#_errorResult').html('');
				},3000);
			},
		});
	});
});

");
*/
?>