<?php
/* @var $this MapController */
/* @var $model Map */

$this->breadcrumbs = array(
    'Proteins' => array('index'),
    $model->name,
);

$this->menu = array(
);
?>

<h1>Protein : <?php echo $model->name . $model->protein_id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'htmlOptions' => array('style' => 'width:300px;'),
    'cssFile' => '/css/view.css',
    'attributes' => array(
        
        'protein_id',
        'name', array(
            'name' => 'file_name',
            'style' => 'font-size : 14p; font-weight : bold; color : black;',
            //'style' => 'font-size : 14px; font-weight : bold; color : black; height : 30px; width : 120px; border-radius : 15px;',
            'type' => 'raw',
            'value' => CHtml::link(CHtml::encode($model->file_name), Yii::app()->baseUrl . "/protected/views/protein/fileUpload/" . $model->file_name, array('id' => $model->protein_id, "target" => "_blank")
            ),
        ),
       
    ),
));
?>
<?php
//$fileProt = CHtml::encode($model->file_name);
////print_r($fileLig);
//$jobTvrn = shell_exec(`/bin/bash /home/dida/Downloads/taverna-commandline-core-2.5.0/executeworkflow.sh -inputvalue file $fileProt /home/dida/Documents/TavernaStage/addGrid.t2flow`);
//echo $jobTvrn;
?>
<?php
echo CHtml::button('Back', array('onclick' => 'js:history.go(-1); returnFalse;', 'style' => 'font-size : 14px; font-weight : bold; color : black; height : 30px; width : 120px; border-radius : 15px;'));
?>

