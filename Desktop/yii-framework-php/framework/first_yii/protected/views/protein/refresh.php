
<?php
$fileProt= CHtml::encode($model->file_name);
//print_r($fileLig);
$jobTvrn = shell_exec(`/bin/bash /home/dida/Downloads/taverna-commandline-core-2.5.0/executeworkflow.sh -inputvalue file $fileProt /home/dida/Documents/TavernaStage/addGrid.t2flow`);
//print_r($jobTvrn);
?>       
