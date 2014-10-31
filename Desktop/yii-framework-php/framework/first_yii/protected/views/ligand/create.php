<?php
/* @var $this LigandController */
/* @var $model Ligand */

$this->breadcrumbs=array(
	'Ligands'=>array('index'),
	'Create',
);

$this->menu=array(
//	array('label'=>'List Map', 'url'=>array('index')),
//	array('label'=>'Manage Map', 'url'=>array('admin')),
);
?>

<h1>Create Ligand</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>