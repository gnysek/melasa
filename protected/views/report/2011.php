<?php
$this->breadcrumbs = array(
    'Week view for week ' . $week . ' / ' . $year,
);
?>
<h1>Sorry...</h1>
Only years after 2011 are available.<br/>
<br/>
<?= CHtml::link('Go to 1st week of 2012',array('/report','year'=>'2012','week'=>1)) ?>
