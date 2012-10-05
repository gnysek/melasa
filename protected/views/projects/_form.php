<?php
/* @var $this ProjectsController */
/* @var $model Projects */
/* @var $form CActiveForm */
?>

<div class="four columns">

	<?php
	$form = $this->beginWidget('ActiveForm', array(
		'id' => 'projects-form',
		'enableAjaxValidation' => false,
			));
	?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model, 'name'); ?>
		<?php echo $form->textField($model, 'name', array('size' => 10, 'maxlength' => 10)); ?>
		<?php echo $form->error($model, 'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'color'); ?>
		<?php echo $form->textField($model, 'color', array('size' => 32, 'maxlength' => 32)); ?>
		<?php echo $form->error($model, 'color'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'wiki'); ?>
		<?php echo $form->textArea($model, 'wiki', array('rows' => 6, 'cols' => 50)); ?>
		<?php echo $form->error($model, 'wiki'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'button success')); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->