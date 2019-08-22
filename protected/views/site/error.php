<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle = 'Error - '.$this->empresa['nombre'];

Yii::app()->getClientScript()->registerCssFile(Yii::app()->theme->baseUrl.'/css/error.css'); 
?>

<h2>Error <?php echo $code; ?></h2>

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>