<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';

?>

<h1>Error <?php echo $code; ?></h1>

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


<?php if(Yii::app()->user->isSuperAdmin){
    echo $message;
	echo "<pre>";
		print_r($error);
	echo "</pre>"; 
}?>