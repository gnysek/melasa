<?php

class WeekDay extends CWidget
{

	public $days = 5;
	public $week = 0;
	public $year = 2012;
	public $results = array();

	public function __construct($owner = null)
	{
		parent::__construct($owner);
//		$this->week = date('W');
		$this->year = date('Y');
	}

	public function init()
	{
		if (empty($this->week))
		{
			$this->week = date('W');
		}
	}

	public function run()
	{
		$time = strtotime($this->year . '-W' . sprintf("%02d", $this->week) . '-1');
		$today = -1;
		$dates = array();

		if (empty($this->results))
		{
			$this->results = ASA::model()->findAll('week = :week', array('week' => date($this->week)));
		}

		echo '<div class="row">';
		echo '<div class="ten columns center">';
		echo CHtml::link('&laquo; Prev', array('/report', 'week' => $this->week - 1), array('class' => 'left'));
		echo CHtml::link('Next &raquo;', array('/report', 'week' => $this->week + 1), array('class' => 'right'));
		echo CHtml::link('Current', array('/report'), array('style' => 'text-align: center;'));
		echo '</div>';
		echo '</div>';
		echo '<br />';

		echo '<table style="width: 100%;">';
		echo '<thead>';
		echo '<tr>';
		for ($day = 0; $day < $this->days; $day++)
		{
			$dates[$day] = strtotime('+ ' . $day . ' day', $time);
			$date = date('D d M y', $dates[$day]);

			if ($date == date('D d M y'))
			{
				$date = '<u>' . $date . '</u>';
				$today = $day;
			}
			echo '<th class="center">';
			echo $date;
			echo '</th>';
		}

		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		echo '<tr>';
		for ($day = 0; $day < $this->days; $day++)
		{
			echo '<td class="small" style="padding: 1px;">';
			echo CHtml::link('+ Add', array('report/create', 'day' => date('j', $dates[$day]), 'month' => date('n', $dates[$day]), 'year' => date('Y', $dates[$day])));
			echo '</td>';
		}
		echo '</tr>';
		echo '<tr>';
		for ($day = 0; $day < $this->days; $day++)
		{
			echo '<td class="day-td">';
			echo '<div class="day-relative">';

			if ($today == $day and (date('H') > 7 and date('H') < 20))
			{
				echo '<div class="time-hr" style="top: ' . (((date('H') - 8) * 40) + round(date('i') / 60 * 40)) . 'px"></div>';
			}

			foreach ($this->results as $r)
			{
				/* @var $r ASA */
				if ($r->day == date('j', $dates[$day]) and $r->month == date('n', $dates[$day]) and $r->year == date('Y', $dates[$day]))
				{
					$css = 'top: ' . (($r->from - 8) * 40 + 2) . 'px;';

					echo '<div class="project" style="height: ' . ($r->hours * 40 - 4) . 'px; ' . $css .
					(!empty($r->project0->color) ? ' background-color: ' . $r->project0->color . ';' : '' ) .
					'">';
					echo $r->hours . 'h';
					echo '</div>';

					echo '<div class="project-name" style="' . $css . '">';
					echo CHtml::link($r->project0->name, array('asa/update', 'id' => $r->id));
					echo '</div>';
				}
			}

			for ($h = 8; $h < 20; $h++)
			{
				echo '<div class="hour">';
				echo '<div class="small time">' . $h . ':00</div>';
				echo '</div>';
			}

			echo '</div>';
			echo '</td>';
		}
		echo '</tr>';
		echo '</tbody>';
		echo '</table>';
	}

}
