<?php
/* @var $this ReportController */
//$this->breadcrumbs=array(
//	'Report'=>array('/report'),
//	'View',
//);
?>
<h1>Report</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'report-form',
	'enableAjaxValidation'=>false,
)); ?>

	
	<?php echo $form->errorSummary($model); ?>
        <?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>
        */ ?>
        <div>
            <div class="row float_left margin_2">
                    <?php echo $form->labelEx($client_model,'client_id'); ?>
                    <?php //echo $form->textField($model,'client_id'); ?>
                    <?php echo $form->dropDownList($client_model,'id', CHtml::listData(Client::model()->findAll(), 'id', 'client_name'),array('name'=>'client_id','options' => array(Yii::app()->request->getPost('client_id')=>array('selected'=>true)))); ?>
                    <?php echo $form->error($client_model,'client_id'); ?>
            </div>

            <div class="row float_left margin_2" >
                    <?php echo $form->labelEx($model,'project_id'); ?>
                    <?php //echo $form->textField($model,'project_id'); ?>
                    <?php echo $form->dropDownList($project_model,'id', CHtml::listData(Project::model()->findAll(), 'id', 'project_title'), array('name'=>'project_id','options' => array(Yii::app()->request->getPost('project_id')=>array('selected'=>true))) ); ?>
                    <?php echo $form->error($model,'project_id'); ?>
            </div>


            <div class="row float_left margin_2" >
                    <?php echo $form->labelEx($model,'years'); ?>
                    <?php //echo $form->textField($model,'hours'); ?>
                    <?php 
                    $arr_years=array();
                    for($i=2013;$i<=2020;$i++)
                    {$arr_years[$i]=$i;}

                    echo $form->dropDownList($model,'years', $arr_years, array('name'=>'years','options' => array(Yii::app()->request->getPost('years')=>array('selected'=>true))) ); ?>
                    <?php echo $form->error($model,'years'); ?>
            </div>
        </div>
        <div style="clear:both" />

	<div class="row buttons">
		<?php echo CHtml::submitButton('Generate Report'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php if(isset($report_data) && !empty($report_data)) {?>
<div id="report_container">
    <table id="tbl_report" >
        <tr class="table_header">
            <?php
                for($i=1;$i<=12;$i++)
                {
                    echo "<td>".$months_arr[$i]."</td>";
                }
            ?>
            <td>Total</td>
        </tr>
        <tr>
            <?php
                $total_hours=0;
                for($i=1;$i<=12;$i++)
                {
                    if(isset($report_data[$i]['hours']))
                    {
                        echo "<td>".$report_data[$i]['hours'].":"."00"."</td>";
                        $total_hours+=$report_data[$i]['hours'];
                    }
                    else
                        echo "<td>0:00</td>";
                }
            ?>
            <td><?php echo $total_hours?>:00</td>
        </tr>
    </table>
</div>
<?php } ?>