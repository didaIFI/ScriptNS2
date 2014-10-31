<?php
$file = CHtml::encode($model->file_dpf);
print_r($file);
$path_details = pathinfo($file);
$file_name = $path_details['filename'];
print_r($file_name);
//get data from grid
$file_grid = $file_name . ".zip";
print_r($file_grid);
$jobTvrn = shell_exec(`/bin/bash /home/dida/Downloads/taverna-commandline-core-2.5.0/executeworkflow.sh -inputvalue file $file_grid /home/dida/Documents/TavernaStage/getGrid.t2flow`);
print_r($jobTvrn);
$result = shell_exec(`cp /home/dida/glassfish-4.0/glassfish/domains/domain1/config/$file_grid /var/www/yii-framework-php/framework/first_yii/tmp_param`);
print_r($result);
Yii::import('ext.helpers.EDownloadHelper');
EDownloadHelper::download(Yii::getPathOfAlias('webroot.tmp_param') . DIRECTORY_SEPARATOR . $file_grid);
?>  
