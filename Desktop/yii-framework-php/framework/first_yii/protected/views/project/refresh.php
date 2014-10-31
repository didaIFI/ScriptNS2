<?php
$file = CHtml::encode($model->file_dpf);
print_r($file);
$path_details = pathinfo($file);
$file_name = $path_details['filename'];
//print_r($file_name);
$file_dpf = CHtml::encode($model->file_dpf);
//print_r($file_dpf);
$path_details = pathinfo($file);
$file_name = $path_details['filename'];
$ext = $path_details['extension'];
print_r($ext);
$file_name = $path_details['filename'];
if ($ext == "txt") {
    print_r($ext);
    $jobTvrn = shell_exec(`/bin/bash /home/dida/Downloads/taverna-commandline-core-2.5.0/executeworkflow.sh -inputvalue file $file_dpf /home/dida/Documents/TavernaStage/gridws.t2flow`);
    echo $jobTvrn;
}
//print_r($file_name);
//$file_grid=$file_name.".zip";
//print_r($file_grid);
//$jobTvrn = shell_exec(`/bin/bash /home/dida/Downloads/taverna-commandline-core-2.5.0/executeworkflow.sh -inputvalue file $file_grid /home/dida/Documents/TavernaStage/getGrid.t2flow`);
//print_r($jobTvrn);
?>       
