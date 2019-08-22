<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-19 contentLeft">
	<div id="content">
		<?php echo $content; ?>
	</div>
</div>
<div class="span-5 last contentRight">
	<div id="sidebar">
	<?php
		// $this->beginWidget('zii.widgets.CPortlet', array(
		// 	'title'=>'Operations',
		// ));

		$this->widget('zii.widgets.CMenu', array(
			'encodeLabel' => false,
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		// $this->endWidget();
	?>
	</div>
</div>
<?php $this->endContent(); ?>