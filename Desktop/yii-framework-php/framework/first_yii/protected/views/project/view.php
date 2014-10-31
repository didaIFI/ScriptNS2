<?php
/* @var $this MapController */
/* @var $model Map */

$this->breadcrumbs = array(
    'projects' => array('index'),
    $model->project_name,
);

$this->menu = array(
//	array('label'=>'List Map', 'url'=>array('index')),
//	array('label'=>'Create Map', 'url'=>array('create')),
//	array('label'=>'Update Map', 'url'=>array('update', 'id'=>$model->map_id)),
//	array('label'=>'Delete Map', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->map_id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage Map', 'url'=>array('admin')),
);
?>
<h1>Project : <?php echo $model->project_name . $model->project_id; ?></h1>
<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'htmlOptions' => array('style' => 'width:300px;'),
    'cssFile' => '/css/view.css',
    'attributes' => array(
        'project_id',
        'project_name',
        array(
            'name' => 'file_dpf',
            'type' => 'raw',
            'value' => CHtml::link(CHtml::encode($model->file_dpf), Yii::app()->baseUrl . "/protected/views/project/fileUpload/" . $model->file_dpf, array('id' => $model->project_id, "target" => "_blank")),
        //CHtml::link(CHtml::encode($model->file_tar_gz), Yii::app()->baseUrl . "/protected/views/map/fileUpload/" . $model->file_tar_gz, array('id' => $model->map_id, "target" => "_blank")
        ),
        array(// related city displayed as a link
            'name' => 'ligand_id',
            'type' => 'raw',
            'value' => CHtml::link(CHtml::encode($model->ligand->file_name), Yii::app()->baseUrl . "/protected/views/ligand/fileUpload/" . $model->ligand->file_name, array('id' => $model->ligand_id, "target" => "_blank")),
        ),
        array(// related city displayed as a link
            'name' => 'protein_id',
            'type' => 'raw',
            'value' => CHtml::link(CHtml::encode($model->protein->file_name), Yii::app()->baseUrl . "/protected/views/protein/fileUpload/" . $model->protein->file_name, array('id' => $model->protein_id, "target" => "_blank")),
        ),
        array(// related city displayed as a link
            'name' => 'map_id',
            'type' => 'raw',
            'value' => CHtml::link(CHtml::encode($model->map->file_tar_gz), Yii::app()->baseUrl . "/protected/views/map/fileUpload/" . $model->map->file_tar_gz, array('id' => $model->map_id, "target" => "_blank")),
        ),
    ),
        )
);
?>

<?php
$this->Widget('ext.highcharts.HighchartsWidget', array(
    'options' => array(
        'title' => array('text' => 'Energy DLG file'),
        'xAxis' => array(
            'categories' => array('14th', '15th', '16th', '17th', '18th', '19th', '20th', '21th', '22th', '23th', '24th', '25th', '26th', '27th', '28th')
        ),
        'yAxis' => array(
            'title' => array('text' => 'DLG file')
        ),
        'credits' => array('enabled' => false),
        'series' => array(
            array('name' => 'Energy', 'data' => array(-8.89, -8.08, -7.95, -7.50)),
            array('name' => 'RMSD', 'data' => array(15, 17, 14, 15, 18, 21, 22, 26, 33, 28, 30, 28, 25, 36, 40)),
        //array('name' => 'Richmond Office', 'data' => array(5, 7, 8,9, 7, 10,11, 12, 13,15, 17, 14,15,16,18)),
        //array('name' => 'Virgina Beach Office', 'data' => array(25, 27, 23, 22, 24,20, 25, 26, 30, 27, 30, 28, 25, 26,28)),
        )
    )
));
?>
<?php
$file_dpf = CHtml::encode($model->file_dpf);
$file_ligand = ($model->ligand->file_name);
$file_prot = ($model->protein->file_name);
$file_map = ($model->map->file_tar_gz);
$fileDck = shell_exec(`/bin/bash /home/dida/Downloads/taverna-commandline-core-2.5.0/executeworkflow.sh -inputvalue file $file_dpf /home/dida/Documents/TavernaStage/addGrid.t2flow`);
print_r($fileDck);
$fileLig = shell_exec(`/bin/bash /home/dida/Downloads/taverna-commandline-core-2.5.0/executeworkflow.sh -inputvalue file $file_ligand /home/dida/Documents/TavernaStage/addGrid.t2flow`);
print_r($fileLig);
$fileProt = shell_exec(`/bin/bash /home/dida/Downloads/taverna-commandline-core-2.5.0/executeworkflow.sh -inputvalue file $file_prot /home/dida/Documents/TavernaStage/addGrid.t2flow`);
print_r($fileProt);
$fileMap = shell_exec(`/bin/bash /home/dida/Downloads/taverna-commandline-core-2.5.0/executeworkflow.sh -inputvalue file $file_map /home/dida/Documents/TavernaStage/addGrid.t2flow`);
print_r($fileMap);
$path_details = pathinfo($file_dpf);
$file_name = $path_details['filename'];
//print_r($file_name);
$file_grid = $file_name . ".zip";
print_r($file_grid);
$jobTvrn = shell_exec(`/bin/bash /home/dida/Downloads/taverna-commandline-core-2.5.0/executeworkflow.sh -inputvalue file $file_grid /home/dida/Documents/TavernaStage/getGrid.t2flow`);
print_r($jobTvrn);
$result = shell_exec(`cp /home/dida/glassfish-4.0/glassfish/domains/domain1/config/$file_grid /var/www/yii-framework-php/framework/first_yii/tmp_param`);
print_r($result);
?>
<?php
echo CHtml::button('<<Back', array('onclick' => 'js:history.go(-1); returnFalse;', 'style' => 'font-size : 14px; font-weight : bold; color : black; height : 30px; width : 120px; border-radius : 15px;'));
?>
