<?php
/* @var $this AsaController */
/* @var $model Asa */
/* @var $form CActiveForm */
?>
<?php
$form = $this->beginWidget('ActiveForm', array(
	'id' => 'asa-form',
	'enableAjaxValidation' => false,
	'htmlOptions' => array(
		'class' => 'custom'
	),
	'action' => array('report/create'),
		));
?>

<?php echo $form->hiddenField($model, 'day'); ?>
<?php echo $form->hiddenField($model, 'month'); ?>
<?php echo $form->hiddenField($model, 'year'); ?>
<?php echo CHtml::hiddenField('ASA[week]', $week, array('id' => 'Asa_week')); ?>

<?php
$from = array();

for ($i = 8; $i < 17; $i++)
{
	$from[$i] = sprintf('%02d', $i) . ':00';
}
?>

<?php echo $form->labelEx($model, 'from'); ?>
<?php //echo $form->textField($model, 'from'); ?>
<?php echo CHTML::dropDownList('Asa[from]', $model->from, $from); ?>
<?php echo $form->error($model, 'from'); ?>

<?php echo $form->labelEx($model, 'hours'); ?>
<?php //echo $form->textField($model, 'hours');  ?>
<?php echo CHTML::dropDownList('Asa[hours]', $model->hours, array(1 => 1, 2, 3, 4, 5, 6, 7, 8, 9, 10)); ?>
<?php echo $form->error($model, 'hours'); ?>

<?php echo $form->labelEx($model, 'project'); ?>
<?php
echo CHtml::dropDownList(
		'Asa[project]', 0, CHtml::listData(Projects::model()->findAll(), 'id', 'name')
);
?>
<?php echo $form->error($model, 'project'); ?>

<?php echo $form->hiddenField($model, 'user'); ?>

<div class="row buttons">
	<?php echo CHtml::submitButton('Create', array('class' => 'button success')); ?>
	<?php // echo Chtml::link('Cancel', array('/'), array('class' => 'button alert')); ?>
</div>

<?php $this->endWidget(); ?>