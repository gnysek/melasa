<?php

#Yii::import('web.widgets.CActiveForm');

class ActiveForm extends CActiveForm
{

	public function error($model, $attribute, $htmlOptions = array(), $enableAjaxValidation = true, $enableClientValidation = true)
	{
		$html = parent::error($model, $attribute, array_merge($htmlOptions, array('class' => 'error')), $enableAjaxValidation, $enableClientValidation);
		return preg_replace('#div#i', 'small', $html);
	}

}
