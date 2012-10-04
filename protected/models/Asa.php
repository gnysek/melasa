<?php

/**
 * This is the model class for table "asa".
 *
 * The followings are the available columns in table 'asa':
 * @property integer $id
 * @property integer $day
 * @property integer $month
 * @property integer $hours
 * @property integer $project
 * @property integer $user
 *
 * The followings are the available model relations:
 * @property Users $user0
 * @property Projects $project0
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
			array('day, month, hours', 'required'),
			array('day, month, hours, project, user', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, day, month, hours, project, user', 'safe', 'on'=>'search'),
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
			'user0' => array(self::BELONGS_TO, 'Users', 'user'),
			'project0' => array(self::BELONGS_TO, 'Projects', 'project'),
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
			'hours' => 'Hours',
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
		$criteria->compare('hours',$this->hours);
		$criteria->compare('project',$this->project);
		$criteria->compare('user',$this->user);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}