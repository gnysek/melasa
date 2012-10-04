<?php
/* @var $this AsaController */
/* @var $model Asa */

$this->breadcrumbs=array(
	'Asas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Asa', 'url'=>array('index')),
	array('label'=>'Create Asa', 'url'=>array('create')),
	array('label'=>'View Asa', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Asa', 'url'=>array('admin')),
);
?>

<h1>Update Asa <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>