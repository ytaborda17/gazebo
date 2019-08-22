<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="contentBottom">
	<div id="content">
		<div class="contentTop">
			<?php
				$this->widget('zii.widgets.CMenu', array(
					'encodeLabel' => false,
					'items'=>$this->menu,
					'htmlOptions'=>array('class'=>'operations'),
				));
			?>
		</div>
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<?php $this->endContent(); ?>