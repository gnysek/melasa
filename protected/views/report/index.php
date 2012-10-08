<!--<a data-reveal-id="myModal" class="button primary">tes</a>-->
<?php
/* @var $this ReportController */
//$this->pageTitle=Yii::app()->name;
$this->menu = array(
	array('label' => 'Report typical 8h', 'url' => array('index')),
	array('label' => 'Report time', 'url' => array('report/create')),
	array('label' => 'Request holidays', 'url' => array('index')),
	array('label' => '', 'itemOptions' => array('class' => 'divider')),
	array('label' => 'Check your projects', 'url' => array('index')),
	array('label' => 'Check month', 'url' => array('index')),
	array('label' => 'Profile', 'url' => array('index')),
	array('label' => '', 'itemOptions' => array('class' => 'divider')),
);

$this->breadcrumbs = array(
	'Week view for week ' . $week,
);
?>

<div class="center">
	<h5>Week <?= $week ?></h5>
</div>

<?php
$this->widget('WeekDay', array('week' => $week));
?>

<div id="myModal" class="reveal-modal expand">
	<p><?php echo $this->renderPartial('_fastform', array('model' => $model, 'week' => $week)); ?></p>
	<a class="close-reveal-modal">&times;</a>
</div>