<?php
/* @var $this LoggedTimeController */
/* @var $model LoggedTime */
/* @var $form CActiveForm */
?>
<?php 
    if(Yii::app()->request->getQuery('id')!='')
    {
        ?>
        <div class="flash-success">Time Logged successfully</div>
        <?php
    }
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'logged-time-form',
	'enableAjaxValidation'=>true,
        'clientOptions'=>array(
		'validateOnSubmit'=>true,
            ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        <?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>
        */ ?>

	<div class="row">
		<?php echo $form->labelEx($model,'project_id'); ?>
		<?php //echo $form->textField($model,'project_id'); ?>
                <?php echo $form->dropDownList($model,'project_id', array(''=>'Select Project') + CHtml::listData(Project::model()->findAll(), 'id', 'project_title')); ?>
		<?php echo $form->error($model,'project_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_id'); ?>
		<?php //echo $form->textField($model,'client_id'); ?>
                <?php echo $form->dropDownList($model,'client_id', array(''=>'Select Client') + CHtml::listData(Client::model()->findAll(), 'id', 'client_name')); ?>
		<?php echo $form->error($model,'client_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logged_day'); ?>
		<?php //echo $form->textField($model,'logged_day'); 
                $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                    //'name'=>'logged_day',
                    'model'=>$model,
                    'attribute'=>'logged_day',
                    // additional javascript options for the date picker plugin
                    'options'=>array(
                        'showAnim'=>'fold',
                        'dateFormat'=>'dd-mm-yy',
                    ),
                    'htmlOptions'=>array(
                        'style'=>'height:20px;'
                    ),
                ));
                
                ?>
		<?php echo $form->error($model,'logged_day'); ?>
	</div>
        
            <div class="row">
                    <?php echo $form->labelEx($model,'hours'); ?>
                    <?php //echo $form->textField($model,'hours'); ?>
                    <?php 
                    $arr_hours=array();
                    for($i=1;$i<=24;$i++)
                    {$arr_hours[$i]=$i;}

                    echo $form->dropDownList($model,'hours', $arr_hours); ?>
                    <?php echo $form->error($model,'hours'); ?>
            </div>

            
        <div style="clear:both" />

	<div class="row buttons">
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save');
                echo CHtml::submitButton('Save');
                ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->