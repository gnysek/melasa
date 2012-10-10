<?php
/* @var $this ProjectsController */
/* @var $data Projects */
//$md = new CMarkdown();
?>

<div class="row">
	<div class="seven columns" style="padding-left: 10px; border-left: 20px solid <?= (!empty($data->color)) ? $data->color : 'black' ?>;">

		<div class="right">
			<?php if (!empty($data->wiki)): ?>
				<?php echo CHtml::link('Wiki', array('view', 'id' => $data->id), array('class' => 'button secondary tiny')); ?>
			<?php endif; ?>
			<?php echo CHtml::link('Edit', array('update', 'id' => $data->id), array('class' => 'button secondary tiny')); ?>
			<?php echo CHtml::link('Delete', array('delete', 'id' => $data->id), array('class' => 'button secondary tiny')); ?>
		</div>

		<p>#<?= $data->id ?>. <strong><?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id' => $data->id)); ?></strong></p>

		<?php if (!empty($data->wiki)): ?>
			<p>Check wiki entry &raquo;</p>
		<?php endif; ?>
		<?php /*
		  <b><?php echo CHtml::encode($data->getAttributeLabel('wiki')); ?>:</b>
		  <?php echo $md->transform($data->wiki); ?>
		 */ ?>
	</div>
	<hr />
</div>
<div class="clearfix"></div>