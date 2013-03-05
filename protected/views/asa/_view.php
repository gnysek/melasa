<?php
/* @var $this AsaController */
/* @var $data Asa */
?>

<div class="row">

	<p><b>#<?= $data->id ?></b>
		Week <?= CHtml::encode($data->week); ?>:
		<?php echo CHtml::link(CHtml::encode(sprintf('%02d', $data->day) . '.' . sprintf('%02d', $data->month) . '.' . $data->year), array('view', 'id' => $data->id)); ?>
		/
		<b>Time:</b>
		<?php echo CHtml::encode($data->from); ?>:00 - <?php echo CHtml::encode($data->from + $data->hours); ?>:00
		<b>Project:</b>
		<?= $data->project0->name ?>
		<b>User:</b>
		<?= $data->user0->username ?>
	</p>

	<?php /*
	  <b><?php echo CHtml::encode($data->getAttributeLabel('project')); ?>:</b>
	  <?php echo CHtml::encode($data->project); ?>
	  <br />

	  <b><?php echo CHtml::encode($data->getAttributeLabel('user')); ?>:</b>
	  <?php echo CHtml::encode($data->user); ?>
	  <br />

	 */ ?>
	<hr />
</div>
