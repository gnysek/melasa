<?php
/* @var $this AsaController */
/* @var $model Asa */
/* @var $form CActiveForm */
?>

<div>

	<?php
	$form = $this->beginWidget('ActiveForm', array(
		'id' => 'asa-form',
		'enableAjaxValidation' => false,
		'htmlOptions' => array(
			'class' => 'custom'
		)
			));
	?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<div class="three columns">
			<?php if (empty($model->day)): ?>
				<?php echo $form->labelEx($model, 'day'); ?>
				<?php echo $form->textField($model, 'day'); ?>
				<?php echo $form->error($model, 'day'); ?>
			<?php else: ?>
				<?= $model->day ?>
			<?php endif; ?>
		</div>

		<div class="three columns">
			<?php if (empty($model->month)): ?>
				<?php echo $form->labelEx($model, 'month'); ?>
				<?php echo $form->textField($model, 'month'); ?>
				<?php echo $form->error($model, 'month'); ?>
			<?php else: ?>
				<?= $model->month ?>
			<?php endif; ?>
		</div>

		<div class="four columns">
			<?php if (empty($model->year)): ?>
				<?php echo $form->labelEx($model, 'year'); ?>
				<?php echo $form->textField($model, 'year'); ?>
				<?php echo $form->error($model, 'year'); ?>
			<?php else: ?>
				<?= $model->year ?>
			<?php endif; ?>
		</div>
	</div>

	<?php
	$date = new DateTime;
	$date->setISODate(date('Y'), 53);
	$weeks = array();
	for ($i = 1; $i <= ($date->format("W") === "53" ? 53 : 52); $i++)
	{
		$weeks[$i] = $i;
	}
	?>

	<?php if (empty($model->week)): ?>
		<?php echo $form->labelEx($model, 'week'); ?>
		<?php echo $form->textField($model, 'week', array('class' => 'ten')); ?>
		<?php //echo CHTML::dropDownList('Asa[week]', $model->week, $weeks); ?>
		<?php echo $form->error($model, 'week'); ?>
	<?php else: ?>
		<p>Week <?= $model->week ?></p>
	<?php endif; ?>

	<?php echo $form->labelEx($model, 'hours'); ?>
	<?php //echo $form->textField($model, 'hours'); ?>
	<?php echo CHTML::dropDownList('Asa[hours]', $model->hours, array(1 => 1, 2, 3, 4, 5, 6, 7, 8, 9, 10)); ?>
	<?php echo $form->error($model, 'hours'); ?>

	<?php echo $form->labelEx($model, 'from'); ?>
	<?php //echo $form->textField($model, 'from'); ?>
	<?php echo CHTML::dropDownList('Asa[from]', $model->from, array(8 => 8, 9, 10, 11, 12, 13, 14, 15, 16, 17)); ?>
	<?php echo $form->error($model, 'from'); ?>

	<?php echo $form->labelEx($model, 'project'); ?>
	<?php
	echo CHtml::dropDownList('Asa[project]', (!empty($model->project)) ? $model->project : 0, /* array_merge(
			  array('(None)'), */ CHtml::listData(Projects::model()->findAll(), 'id', 'name')
	/* ) */);
	?>
	<?php echo $form->error($model, 'project'); ?>

	<?php echo $form->labelEx($model, 'user'); ?>
	<?php if ($model->isNewRecord): ?>
		<?php echo $form->textField($model, 'user'); ?>
	<?php else: ?>
		<?php echo $form->hiddenField($model, 'user'); ?>
	<?php endif; ?>
	<?php echo $form->error($model, 'user'); ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'button success')); ?>
		<?php echo Chtml::link('Cancel', array('/'), array('class' => 'button alert')); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->