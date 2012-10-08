<?php

/**
 * This is the model class for table "asa".
 *
 * The followings are the available columns in table 'asa':
 * @property integer $id
 * @property integer $day
 * @property integer $month
 * @property integer $year
 * @property integer $week
 * @property integer $hours
 * @property integer $from
 * @property integer $project
 * @property integer $user
 *
 * The followings are the available model relations:
 * @property Projects $project0
 * @property User $user0
 */
class Asa extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Asa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'asa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('day, month, year, week, hours, from', 'required'),
			array('day, month, year, week, hours, from, project, user', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, day, month, year, week, hours, from, project, user', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'project0' => array(self::BELONGS_TO, 'Projects', 'project'),
			'user0' => array(self::BELONGS_TO, 'User', 'user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'day' => 'Day',
			'month' => 'Month',
			'year' => 'Year',
			'week' => 'Week',
			'hours' => 'Hours',
			'from' => 'From',
			'project' => 'Project',
			'user' => 'User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('day',$this->day);
		$criteria->compare('month',$this->month);
		$criteria->compare('year',$this->year);
		$criteria->compare('week',$this->week);
		$criteria->compare('hours',$this->hours);
		$criteria->compare('from',$this->from);
		$criteria->compare('project',$this->project);
		$criteria->compare('user',$this->user);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function init() {
		$this->day = date('j');
		$this->month = date('n');
		$this->year = date('Y');
		$this->week = date('W');
		$this->user = Yii::app()->user->id;
		$this->hours = 8;
		$this->from = 9;
	}
}