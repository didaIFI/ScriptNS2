<?php
/* @var $this MapController */
/* @var $model Map */

$this->breadcrumbs=array(
	'projects'=>array('index'),
	$model->project_id=>array('view','id'=>$model->project_id),
	'Update',
);

$this->menu=array(
//	array('label'=>'List Map', 'url'=>array('index')),
//	array('label'=>'Create Map', 'url'=>array('create')),
//	array('label'=>'View Map', 'url'=>array('view', 'id'=>$model->map_id)),
//	array('label'=>'Manage Map', 'url'=>array('admin')),
);
?>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>