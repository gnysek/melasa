<?php

class ReportController extends Controller
{

	public function actionIndex()
	{
		$this->layout = '//layouts/column2';
		$this->render('index');
	}

	public function actionCreate($day = null, $month = null, $year = null)
	{
		$model = new Asa;

		$model->day = ($day == null) ? date('j') : $day;
		$model->month = ($month == null) ? date('n') : $month;
		$model->year = ($year == null) ? date('Y') : $year;
		$model->week = date('W');
		$model->user = Yii::app()->user->id;

//		var_dump(Yii::app()->user->name);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Asa']))
		{
			$model->attributes = $_POST['Asa'];
			if ($model->save())
				$this->redirect(array('view', 'id' => $model->id));
		}

		$this->render('create', array(
			'model' => $model,
		));
	}

	/* remove ? */
	public function actionEdit()
	{
		$this->render('edit');
	}

	public function actionHolidays()
	{
		$this->render('holidays');
	}

	public function actionUpdate()
	{
		$this->render('update');
	}

	// Uncomment the following methods and override them if needed
	/*
	  public function filters()
	  {
	  // return the filter configuration for this controller, e.g.:
	  return array(
	  'inlineFilterName',
	  array(
	  'class'=>'path.to.FilterClass',
	  'propertyName'=>'propertyValue',
	  ),
	  );
	  }

	  public function actions()
	  {
	  // return external action classes, e.g.:
	  return array(
	  'action1'=>'path.to.ActionClass',
	  'action2'=>array(
	  'class'=>'path.to.AnotherActionClass',
	  'propertyName'=>'propertyValue',
	  ),
	  );
	  }
	 */
}