<?php

/* @var $this MapController */
/* @var $model Map */

$this->breadcrumbs = array(
    'Projects' => array('index'),
    'Dock',
);

$this->menu = array(
);
?>
<?php

$file_dpf = CHtml::encode($model->file_dpf);
print_r($file_dpf);
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
$ext = $path_details['extension'];
print_r($file_name);
//get data from grid
$file_grid = $file_name . ".zip";
print_r($file_grid);
print_r($ext);
if ($ext == "txt") {
    $jobTvrn = shell_exec(`/bin/bash /home/dida/Downloads/taverna-commandline-core-2.5.0/executeworkflow.sh -inputvalue file $file_dpf /home/dida/Documents/TavernaStage/gridws.t2flow`);
    echo $jobTvrn;
} else if ($ext == "dpf") {
    $jobTvrn = shell_exec(`/bin/bash /home/dida/Downloads/taverna-commandline-core-2.5.0/executeworkflow.sh -inputvalue file $file_name -inputvalue gpf 1OKE.gpf -inputvalue dpf $file_dpf /home/dida/Documents/TavernaStage/jobStatOut.t2flow`);
    echo $jobTvrn;
}
$jobTvrn = shell_exec(`/bin/bash /home/dida/Downloads/taverna-commandline-core-2.5.0/executeworkflow.sh -inputvalue file $file_grid /home/dida/Documents/TavernaStage/getGrid.t2flow`);
print_r($jobTvrn);
$result = shell_exec(`cp /home/dida/glassfish-4.0/glassfish/domains/domain1/config/$file_grid /var/www/yii-framework-php/framework/first_yii/tmp_param`);
print_r($result);
Yii::import('ext.helpers.EDownloadHelper');
EDownloadHelper::download(Yii::getPathOfAlias('webroot.tmp_param') . DIRECTORY_SEPARATOR . $file_grid);
?>

