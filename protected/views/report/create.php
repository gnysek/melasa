<?php
/* @var $this ReportController */
/* @var $model Asa */

$this->breadcrumbs = array(
	'Report' => array('/report'),
	'Create',
);

/* $this->menu = array(
  array('label' => 'List Asa', 'url' => array('index')),
  array('label' => 'Manage Asa', 'url' => array('admin')),
  ); */
?>

<h1>Report time</h1>

<div class="four columns">
	<?php echo $this->renderPartial('_form', array('model' => $model)); ?>
</div>
