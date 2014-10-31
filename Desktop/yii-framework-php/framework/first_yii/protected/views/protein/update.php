<?php
/* @var $this MapController */
/* @var $model Map */

$this->breadcrumbs=array(
	'Proteins'=>array('index'),
	$model->protein_id=>array('view','id'=>$model->protein_id),
	'Update',
);

$this->menu=array(
//	array('label'=>'List Map', 'url'=>array('index')),
//	array('label'=>'Create Map', 'url'=>array('create')),
//	array('label'=>'View Map', 'url'=>array('view', 'id'=>$model->map_id)),
//	array('label'=>'Manage Map', 'url'=>array('admin')),
);
?>

<h1>Update  <?php echo $model->protein_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>