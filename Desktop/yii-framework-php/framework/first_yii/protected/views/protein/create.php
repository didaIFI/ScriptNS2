<?php
/* @var $this MapController */
/* @var $model Map */

$this->breadcrumbs=array(
	'Proteins'=>array('index'),
	'Create',
);

$this->menu=array(
//	array('label'=>'List Map', 'url'=>array('index')),
//	array('label'=>'Manage Map', 'url'=>array('admin')),
);
?>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>