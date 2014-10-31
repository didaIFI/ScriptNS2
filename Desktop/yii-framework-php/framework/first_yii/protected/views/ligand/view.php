<?php
/* @var $this LigandController */
/* @var $model Ligand */

$this->breadcrumbs = array(
    'Ligands' => array('index'),
    $model->ligand_id,
);

$this->menu = array(
//	array('label'=>'List Map', 'url'=>array('index')),
//	array('label'=>'Create Map', 'url'=>array('create')),
//	array('label'=>'Update Map', 'url'=>array('update', 'id'=>$model->map_id)),
//	array('label'=>'Delete Map', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->map_id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage Map', 'url'=>array('admin')),
);
?>

<h1>Ligand : <?php echo $model->ligand_id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
'data' => $model,
 'htmlOptions' => array('style' => 'width:300px;'),
 'cssFile' => '/css/view.css',
 'attributes' => array(
//'ligand_id',
'name',
 array(
'name' => 'file_name',
 'type' => 'raw',
 'value' => CHtml::link(CHtml::encode($model->file_name), Yii::app()->baseUrl. "/protected/views/ligand/fileUpload/". $model->file_name,
 array('id' => $model->ligand_id, "target" => "_blank")
 ),
 ),
 'mw',
 'hd',
 'ha',
 'log_p',
 'psa',
 'ic50_hep',
 'ic50_rd',
 'ic50_fi',
 'plant_specie',
 'plant_part',
 'reference',
 'classification',
 'bioactivity',
//  array(
//    'name'=> 'user_id',
//    'value'=>isset($model->user)?CHtml::encode($model->user->name):"unknown",
//),
 ),
));
?>
<?php
echo CHtml::button('Back', array('onclick' => 'js:history.go(-1); returnFalse;', 'style' => 'font-size : 14px; font-weight : bold; color : black; height : 30px; width : 120px; border-radius : 15px;'));
?>
