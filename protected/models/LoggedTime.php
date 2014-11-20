<?php

/**
 * This is the model class for table "logged_time".
 *
 * The followings are the available columns in table 'logged_time':
 * @property integer $id
 * @property integer $user_id
 * @property integer $project_id
 * @property integer $client_id
 * @property string $logged_day
 * @property integer $hours
 */
class LoggedTime extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LoggedTime the static model class
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
		return 'logged_time';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
                        array('project_id, client_id, hours', 'numerical', 'integerOnly'=>true),
                        array('project_id, client_id,hours,logged_day','required'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array('project' => array(self::BELONGS_TO, 'Project', 'project_id'),
                    'client' => array(self::BELONGS_TO, 'Client', 'client_id') );
		
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			//'user_id' => 'User',
			'project_id' => 'Project',
			'client_id' => 'Client',
			'logged_day' => 'Logged Day',
			'hours' => 'Hours'
                        
		);
	}
        
        /*
         * @return bool Formatting date according to mysql accepted format to store in the database
         */
        protected function beforeSave()
        {
            if(parent::beforeSave()){
                $this->user_id=Yii::app()->user->id;
                $this->logged_day=date('Y-m-d', strtotime(str_replace(",", "", $this->logged_day)));
                return TRUE;
            }
            else return false;
        }

      
}