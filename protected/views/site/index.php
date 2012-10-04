<?php
/* @var $this SiteController */
//$this->pageTitle=Yii::app()->name;
$this->menu = array(
	array('label' => 'Report time', 'url' => array('index')),
	array('label' => 'Request holidays', 'url' => array('index')),
	array('label' => '', 'itemOptions' => array('class' => 'divider')),
	array('label' => 'Check your projects', 'url' => array('index')),
	array('label' => 'Check month', 'url' => array('index')),
	array('label' => 'Profile', 'url' => array('index')),
);
?>

<table style="width: 100%;">
	<thead>
		<tr>
			<?php
			$dt = new CDateFormatter('pl');
			if (date('N') == 1) {
				$time = strtotime('today');
			} else {
				$time = strtotime('last monday');
			}

			for ($i = 0; $i < 5; $i+=1):
				?>
				<th><?= date('D d M y', strtotime('+ ' . $i . ' day', $time)); ?></th>
				<!--<td><?php //ucfirst($dt->format('eee dd MMM yyyy', strtotime('+ ' . $i . ' day', $time)));       ?></td>-->
				<?
			endfor;
			?>
		</tr>
	</thead>
	<tbody>
		<tr>
			<?php for ($i = 0; $i < 5; $i+=1): ?>
				<td class="day-td">
					<div class="project" style="height: 80px; top: 0px;">Croire</div>
					<div class="project" style="height: 120px; top: 80px; background-color: plum;">Croire</div>

					<?php if (date('N') == $i+1): ?>
					<div style="display: block; position: absolute; width: 100%; border-bottom: 2px solid gold; top: <?= ((date('H')-8) * 40) + round(date('i')/60*40) ?>px"></div>
					<?php endif; ?>
					
					<?php for ($h = 8; $h < 20; $h++): ?>
						<div class="hour">
							<div class="small time"><?= $h ?>:00</div>
						</div>
					<?php endfor; ?>
				</td>
			<?php endfor; ?>
		</tr>
	</tbody>
</table>