<?php
/* @var $this AsaController */
/* @var $model Asa */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php
	$form = $this->beginWidget('CActiveForm', array(
		'id' => 'asa-form',
		'enableAjaxValidation' => false,
		));
	?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model, 'day'); ?>
		<?php echo $form->textField($model, 'day'); ?>
		<?php echo $form->error($model, 'day'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'month'); ?>
		<?php echo $form->textField($model, 'month'); ?>
		<?php echo $form->error($model, 'month'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'year'); ?>
		<?php echo $form->textField($model, 'year'); ?>
		<?php echo $form->error($model, 'year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'week'); ?>
		<?php echo $form->textField($model, 'week'); ?>
		<?php echo $form->error($model, 'week'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'hours'); ?>
		<?php echo $form->textField($model, 'hours'); ?>
		<?php echo $form->error($model, 'hours'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'from'); ?>
		<?php //echo $form->textField($model, 'from'); ?>
		<?php echo CHTML::dropDownList('Asa[from]', $model->from, array(8 => 8, 9, 10, 11, 12, 13, 14, 15, 16, 17)); ?>
		<?php echo $form->error($model, 'from'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'project'); ?>
		<?php
		echo CHtml::dropDownList('Asa[project]', (!empty($model->project)) ? $model->project : 0, array_merge(
				array('(None)'), CHtml::listData(
					Projects::model()->findAll(), 'id', 'name'
				)
			));
		?>
		<?php echo $form->error($model, 'project'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'user'); ?>
		<?php echo $form->textField($model, 'user'); ?>
		<?php echo $form->error($model, 'user'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->