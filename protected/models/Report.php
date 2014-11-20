<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class Report extends CFormModel
{
	
    public $years;
    public $client_id;
    public $project_id;
    
    
    
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
            
		return array(
			// username and password are required
			array('client_id, years', 'required'),
		);
	}
        
        public function generate_report($client_id='',$year='',$project_id='')
        {
            if(!empty($client_id) && !empty($year) && !empty($project_id))
            {
                $sql_arr=array();
                for($i=1;$i<=12;$i++)
                {
                    //$sql_arr[]="SELECT MONTHNAME(logged_day) as month_name,MONTH(logged_day) as month_id,SUM(hours) as hours FROM logged_time WHERE MONTH(logged_day)='".$i."' AND YEAR(logged_day)='".$year."' AND client_id='".$client_id."' AND project_id='".$project_id."'";
                    $sql_arr[]="SELECT MONTH(logged_day) as month_id,SUM(hours) as hours FROM logged_time WHERE MONTH(logged_day)='".$i."' AND YEAR(logged_day)='".$year."' AND client_id='".$client_id."' AND project_id='".$project_id."'";
                }
                if(!empty($sql_arr))
                {
                    $sql=implode(" UNION ",$sql_arr);
                    return Yii::app()->db->createCommand($sql)->queryAll();
                }
                
            }
            return array();
        }
    
}
