<?php
/* @var $this ProjectsController */
/* @var $data Projects */
$md = new CMarkdown();
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wiki')); ?>:</b>
	<?php echo $md->transform($data->wiki); ?>
	<hr />


</div>