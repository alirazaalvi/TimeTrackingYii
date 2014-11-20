<?php

class ReportController extends Controller
{
    
        /**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl'
		);
	}
    
	public function actionIndex()
	{
           // print_r($_POST);exit;
                $report_data=array();
                $months_arr=array(1=>'January',2=>'February',3=>'March',4=>'April',5=>'May',6=>'June',7=>'July',8=>'August',9=>'September',10=>'October',11=>'November',12=>'December');
                
                $model=new Report;
                //if(isset($_POST['Client']['id']) && isset($_POST['Project']['id']) && isset($_POST['Report']['years']) )
                if(Yii::app()->request->getPost('client_id')!='' && Yii::app()->request->getPost('project_id')!='' && Yii::app()->request->getPost('years')!='' )
                {
                    
                    //$report_raw_data=$model->generate_report($_POST['Client']['id'],$_POST['Report']['years'],$_POST['Project']['id']);
                    $report_raw_data=$model->generate_report(Yii::app()->request->getPost('client_id'),Yii::app()->request->getPost('years'),Yii::app()->request->getPost('project_id'));
                    if(!empty($report_raw_data))
                    {
                        $report_data=$this->formatReportData($report_raw_data);
                    }
                }
                $client_model=new Client;
                $project_model=new Project;
                
               
                $data=array(
                            'client_model'=>$client_model,
                            'project_model'=>$project_model,
                            'report_data'=>$report_data,
                            'months_arr'=>$months_arr,
                            'model'=>$model);
                
		$this->render('view',$data);
//                $this->render('view',
//                        array('model'=>$model,'client_model'=>$client_model,'project_model'=>$project_model,"report_data"=>$report_data,'months_arr'=>$months_arr));
	}
        
        
        function formatReportData($raw_data=array())
        {
            
            $return_arr=array();
            if(!empty($raw_data))
            {
                foreach($raw_data as $val)
                {   
                    if(!empty($val['month_id']))
                    {
                        $return_arr[$val['month_id']]=$val;
                        //$return_arr[$val['month_id']]['minutes']=(int)$return_arr[$val['month_id']]['minutes']/60;
                    }
                }
            }
            return $return_arr;
        }

		
}