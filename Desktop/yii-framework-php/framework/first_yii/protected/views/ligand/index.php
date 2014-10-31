<?php
/* @var $this MapController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ligands',
);

$this->menu=array(
//	array('label'=>'Create Map', 'url'=>array('create')),
//	array('label'=>'Manage Map', 'url'=>array('admin')),
);
?>

<h1>Ligands</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
