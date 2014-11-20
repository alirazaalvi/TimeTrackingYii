<?php
/* @var $this LoggedTimeController */
/* @var $model LoggedTime */

//$this->breadcrumbs=array(
//	'Logged Times'=>array('index'),
//	'Create',
//);

//$this->menu=array(
//	array('label'=>'List LoggedTime', 'url'=>array('index')),
//	array('label'=>'Manage LoggedTime', 'url'=>array('admin')),
//);
$this->menu=array();
?>

<h1>Create LoggedTime</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>