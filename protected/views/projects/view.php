<?php
/* @var $this ProjectsController */
/* @var $model Projects */

$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Projects', 'url'=>array('index')),
	array('label'=>'Create Projects', 'url'=>array('create')),
	array('label'=>'Update Projects', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Projects', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Projects', 'url'=>array('admin')),
);
?>

<h1>View Projects #<?= $model->id ?>. <?php echo $model->name; ?></h1>

<?php
	$md = new CMarkdown();
	$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		array(
			'label' => 'wiki',
			'type' => 'raw',
			'value' => $md->transform($model->wiki)
		)
	),
)); ?>

<?php /*
$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
echo $model->wiki;
$this->endWidget();
*/ ?>
