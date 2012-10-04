<?php
/* @var $this SiteController */
//$this->pageTitle=Yii::app()->name;
$this->menu = array(
	array('label' => 'Report time', 'url' => array('asa/create')),
	array('label' => 'Request holidays', 'url' => array('index')),
	array('label' => '', 'itemOptions' => array('class' => 'divider')),
	array('label' => 'Check your projects', 'url' => array('index')),
	array('label' => 'Check month', 'url' => array('index')),
	array('label' => 'Profile', 'url' => array('index')),
);
?>

<?php $this->widget('WeekDay', array(
//	'week' => 1,
//	'days' => 7,
	'results' => $asa
)); ?>