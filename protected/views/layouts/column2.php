<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row">
	<div class="eight columns">
		<?php echo $content; ?>
	</div>
	<div class="two columns">
		<h5>Operations</h5>
		<hr/>
		<!--<div class="panel radius">-->
		<?php
		/* $this->beginWidget('zii.widgets.CPortlet', array(
		  'title' => 'Operations',
		  )); */
		$this->widget('zii.widgets.CMenu', array(
			'items' => $this->menu,
			'htmlOptions' => array('class' => 'side-nav'),
		));
		//$this->endWidget();
		?>
		<!--</div>-->
	</div>
	<?php $this->endContent(); ?>
</div>