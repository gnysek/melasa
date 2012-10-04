<?php
/* @var $this AsaController */
/* @var $model Asa */

$this->breadcrumbs=array(
	'Asas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Asa', 'url'=>array('index')),
	array('label'=>'Create Asa', 'url'=>array('create')),
	array('label'=>'Update Asa', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Asa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Asa', 'url'=>array('admin')),
);
?>

<h1>View Asa #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'day',
		'month',
		'year',
		'hours',
		'from',
		'project',
		'user',
	),
)); ?>
