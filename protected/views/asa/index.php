<?php
/* @var $this AsaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Asas',
);

$this->menu=array(
	array('label'=>'Create Asa', 'url'=>array('create')),
	array('label'=>'Manage Asa', 'url'=>array('admin')),
);
?>

<h1>Asas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
