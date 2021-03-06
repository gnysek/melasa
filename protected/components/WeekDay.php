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
        $totalHours = array();

		if (empty($this->results))
		{
			$this->results = ASA::model()->findAll('week = :week', array('week' => date($this->week)));
		}

        $prevWeek = date('W', strtotime('-1 week', $time));
        $prevYear = ($prevWeek > $this->week) ? $this->year - 1 : $this->year;

        $nextWeek = date('W', strtotime('+1 week', $time));
        $nextYear = ($nextWeek < $this->week) ? $this->year + 1 : $this->year;

		$nav = '';
		$nav .= '<div class="row">';
		$nav .= '<div class="ten columns center">';
		$nav .= CHtml::link('&laquo; Prev', array('/report', 'week' => $prevWeek, 'year' => $prevYear), array('class' => 'left button tiny secondary'));
		$nav .= CHtml::link('Next &raquo;', array('/report', 'week' => $nextWeek, 'year' => $nextYear), array('class' => 'right button tiny secondary'));
		$nav .= CHtml::link('Current', array('/report'), array('style' => 'text-align: center;', 'class' => 'button tiny secondary'));
		$nav .= '</div>';
		$nav .= '</div>';

		echo $nav . '<br/>';

		echo '<table style="width: 100%;">';
		echo '<thead>';
		echo '<tr>';
		for ($day = 0; $day < $this->days; $day++)
		{
			$dates[$day] = strtotime('+ ' . $day . ' day', $time);
			$date = date('D d M y', $dates[$day]);
            $totalHours[$day] = 0;

			if ($date == date('D d M y'))
			{
				$date = '<u>' . $date . '</u>';
				$today = $day;
			}
			echo '<th class="center" style="width: 20%">';
			echo $date;
			echo '</th>';
		}

		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';

		echo '<tr>';
		for ($day = 0; $day < $this->days; $day++)
		{
			echo '<td class="center" style="padding: 1px;">';
			//echo CHtml::link('+ Add', array('report/create', 'day' => date('j', $dates[$day]), 'month' => date('n', $dates[$day]), 'year' => date('Y', $dates[$day])), array('class' => 'button tiny'));
			echo '<a class="button primary tiny" onclick="addWD(' . date('j', $dates[$day]) . ', ' . date('n', $dates[$day]) . ',' . date('Y', $dates[$day]) . ');">+ Add</a>';
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
					echo $r->hours . 'h, ' . $r->from . ':00 - ' . ($r->from + $r->hours) . ':00';
					echo '</div>';

					echo '<div class="project-name" style="' . $css . '">';
					echo CHtml::link($r->project0->name, array('report/update', 'id' => $r->id));
					echo '</div>';

                    $totalHours[$day] += $r->hours;
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
        echo '<tr>';

        for ($day = 0; $day < $this->days; $day++)
        {
            echo '<td class="day-td">';
            echo '=' . $totalHours[$day] . 'h';
            echo '</td>';
        }

        echo '</tr>';
        echo '</tbody>';
		echo '</table>';

		echo $nav . '<br/>';

		echo '<script type="text/javascript">' . PHP_EOL;
		echo 'function addWD(day,month,year) {' . PHP_EOL;
		echo '	$("#Asa_day").val(day);' . PHP_EOL;
		echo '	$("#Asa_month").val(month);' . PHP_EOL;
		echo '	$("#Asa_year").val(year);' . PHP_EOL;
		echo '	$(\'#myModal\').reveal();' . PHP_EOL;
		echo '}' . PHP_EOL;
		echo 'setInterval( function(){' . PHP_EOL;
		echo '	var d = new Date();' . PHP_EOL;
		echo '	if (d.getHours() > 7 && d.getHours() < 20) {' . PHP_EOL;
		echo '		$(".time-hr").css("top",((d.getHours()-8)*40)+Math.round((d.getMinutes()/60)*40)+"px");' . PHP_EOL;
		echo '	}' . PHP_EOL;
		echo '}, 10000);' . PHP_EOL;
		echo '</script>' . PHP_EOL;
	}

}
