<?php 


// Yii::app()->clientScript->registerScript('', "
// 	crugeListAuthItemFunctions = function(){
// 	$('#list-auth-items .referencias').each(function(){
// 		$(this).click(function(){
// 			$(this).parent().find('ul').toggle('slow');
// 		});
// 	});
// 	crugeListAuthItemFunctions();
// ");


$this->widget('zii.widgets.CListView', array(
	'id'=>'list-auth-items',
	'dataProvider'=>$dataProvider,
	'template' => "{items}\n{pager}",
	// 'afterAjaxUpdate'=>'crugeListAuthItemFunctions',
	'itemView'=>'_authitem',
	'sortableAttributes'=>array(
		'name',
		),
	));	
?>
