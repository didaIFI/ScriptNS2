<?php
/* @var $this MapController */
/* @var $model Map */

$this->breadcrumbs = array(
    'Maps' => array('index'),
    $model->map_file_name,
);

$this->menu = array(
//    array('label' => 'List Map', 'url' => array('index')),
//    array('label' => 'Create Map', 'url' => array('create')),
//    array('label' => 'Update Map', 'url' => array('update', 'id' => $model->map_id)),
//    array('label' => 'Delete Map', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->map_id), 'confirm' => 'Are you sure you want to delete this item?')),
//    array('label' => 'Manage Map', 'url' => array('admin')),
);
?>

<h1>Map : <?php echo $model->map_file_name . $model->map_id; ?></h1>
<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'htmlOptions' => array('style' => 'width:300px;'),
    'cssFile' => '/css/view.css',
    'attributes' => array(
        'name' => 'map_id',
        'map_file_name',
        array(
            'name' => 'file_tar_gz',
            'type' => 'raw',
            'value' => CHtml::link(CHtml::encode($model->file_tar_gz), Yii::app()->baseUrl . "/protected/views/project/fileUpload/" . $model->file_tar_gz, array('id' => $model->map_id, "target" => "_blank")),
        ),
    ),
        )
);
?>




<!--
$route = 'agent/update/';
 
$params = array('id' => $agent->agent_id);
 
echo CHtml::link('Edit',$this->createUrl($route,$params));-->
<?php
//$fileMap = CHtml::encode($model->file_tar_gz);
//print_r($fileMap);
//$jobTvrn = shell_exec(`/bin/bash /home/dida/Downloads/taverna-commandline-core-2.5.0/executeworkflow.sh -inputvalue file $fileMap /home/dida/Documents/TavernaStage/addGrid.t2flow`);
//echo $jobTvrn;
//$path_details = pathinfo($fileMap);
//$file_name = $path_details['filename'];
?>
<?php
echo CHtml::button('<<Back', array('onclick' => 'js:history.go(-1); returnFalse;', 'style' => 'font-size : 14px; font-weight : bold; color : black; height : 30px; width : 120px; border-radius : 15px;'));
?>


