<?php

class WeekDay extends CWidget
{

	public $days = 5;
	public $week = 1;
	public $year = 2012;
	public $results = array();

	public function __construct($owner = null)
	{
		parent::__construct($owner);
		$this->week = date('W');
		$this->year = date('Y');
	}

	public function run()
	{
		$time = strtotime($this->year . '-W' . sprintf("%02d", $this->week) . '-1');
		$today = -1;
		$dates = array();

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
			echo '<th>';
			echo $date;
			echo '</th>';
		}

		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		echo '<tr>';
		for ($day = 0; $day < $this->days; $day++)
		{
			echo '<td class="day-td">';
			echo '<div class="day-relative">';

			if ($today == $day and (date('H') > 7 and date('H') < 20))
			{
				echo '<div style="z-index: 1; display: block; position: absolute; width: 100%; border-bottom: 2px solid gold; top: ' . (((date('H') - 8) * 40) + round(date('i') / 60 * 40)) . 'px"></div>';
			}

			foreach ($this->results as $r)
			{
				/* @var $r ASA */
				if ($r->day == date('j', $dates[$day]) and $r->month == date('n', $dates[$day]) and $r->year == date('Y', $dates[$day]))
				{
					echo '<div class="project" style="' .
					(!empty($r->project0->color) ? 'background-color: ' . $r->project0->color . ';' : '' ) .
					' height: ' . ($r->hours * 40) . 'px;' .
					' top: ' . (($r->from - 8) * 40) . 'px">' .
					CHtml::link($r->project0->name, array('asa/update', 'id' => $r->id)) .
					'</div>';
				}
			}

			for ($h = 8; $h < 20; $h++)
			{
				echo '<div class="hour">';
				echo '<div class="small time">' . $h . ':00</div>';
				echo '</div>';
			}

			echo CHtml::link('+ Add', array('report/create', 'day' => date('j', $dates[$day]), 'month' => date('n', $dates[$day]), 'year' => date('Y', $dates[$day])));

			echo '</div>';
			echo '</td>';
		}
		echo '</tr>';
		echo '</tbody>';
		echo '</table>';
	}

}
