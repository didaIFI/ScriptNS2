<?php
/* @var $this LigandController */
/* @var $model Ligand */

$this->breadcrumbs=array(
	'Ligands'=>array('index'),
	$model->ligand_id=>array('view','id'=>$model->ligand_id),
	'Update',
);

$this->menu=array(
//	array('label'=>'List Map', 'url'=>array('index')),
//	array('label'=>'Create Map', 'url'=>array('create')),
//	array('label'=>'View Map', 'url'=>array('view', 'id'=>$model->map_id)),
//	array('label'=>'Manage Map', 'url'=>array('admin')),
);
?>

<h1>Update Ligand <?php echo $model->ligand_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>