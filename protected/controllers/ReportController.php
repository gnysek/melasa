<?php

class ReportController extends Controller
{

	public function actionIndex($week = 0)
	{
		if (empty($week))
		{
			$week = date('W');
		}
		$model = new Asa();

//		$model->day = date('j');
//		$model->month = date('n');
//		$model->year = date('Y');
//		$model->week = date('W');
//		$model->user = Yii::app()->user->id;
//		$model->hours = 8;

		$this->layout = '//layouts/column2';
		$this->render('index', array('week' => $week % 53, 'model' => $model));
	}

	public function actionCreate($day = null, $month = null, $year = null)
	{
		$model = new Asa;

		$model->day = ($day == null) ? $model->day : $day;
		$model->month = ($month == null) ? $model->month : $month;
		$model->year = ($year == null) ? $model->year : $year;
//		$model->week = date('W');
//		$model->user = Yii::app()->user->id;
//		var_dump(Yii::app()->user->name);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Asa']))
		{
			$model->attributes = $_POST['Asa'];
			if ($model->save())
//				$this->redirect(array('view', 'id' => $model->id));
				$this->redirect(array('index'));
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

	public function actionUpdate($id)
	{
		$model = $this->loadAsaModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Asa']))
		{
			$model->attributes = $_POST['Asa'];
			if ($model->save())
//				$this->redirect(array('view','id'=>$model->id));
				$this->redirect(array('index'));
		}

		$this->render('//asa/update', array(
			'model' => $model,
		));
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

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadAsaModel($id)
	{
		$model = Asa::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

}