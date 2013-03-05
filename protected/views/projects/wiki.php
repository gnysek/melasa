<?php
/* @var $this ProjectsController */
/* @var $model Projects */

$this->breadcrumbs = array(
    'Projects' => array('index'),
    'Wiki: ' . $model->name,
);

$this->menu = array(
    array('label' => 'List Projects', 'url' => array('index')),
    array('label' => 'Update Wiki', 'url' => array('wikiup', array('id' => $model->id))),
);
?>

<h1><?php echo $model->name; ?> Wiki</h1>

<?php
$md = new CMarkdown();
echo $md->transform($model->wiki)
?>

<?php /*
  $this->beginWidget('CMarkdown', array('purifyOutput'=>true));
  echo $model->wiki;
  $this->endWidget();
 */
?>
