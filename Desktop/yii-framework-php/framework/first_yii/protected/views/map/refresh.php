
<?php
$fileMap= CHtml::encode($model->file_tar_gz);
//print_r($fileLig);
$jobTvrn = shell_exec(`/bin/bash /home/dida/Downloads/taverna-commandline-core-2.5.0/executeworkflow.sh -inputvalue file $fileMap /home/dida/Documents/TavernaStage/addGrid.t2flow`);
//print_r($jobTvrn);
?>       
