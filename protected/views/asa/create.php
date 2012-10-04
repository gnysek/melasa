<?php
/* @var $this AsaController */
/* @var $model Asa */

$this->breadcrumbs=array(
	'Asas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Asa', 'url'=>array('index')),
	array('label'=>'Manage Asa', 'url'=>array('admin')),
);
?>

<h1>Create Asa</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>