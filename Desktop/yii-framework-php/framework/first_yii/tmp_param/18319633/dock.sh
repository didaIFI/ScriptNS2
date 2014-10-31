#!/bin/bash
tar -xvzf fileVS.tar.gz
/bin/bash autodock.sh autodocksuite-4.2.5.1-i86Linux2.tar.gz /var/www/yii-framework-php/framework/first_yii/protected/views/project/fileUpload/1OKE.gpf /var/www/yii-framework-php/framework/first_yii/protected/views/project/fileUpload/ZINC12663493_01_1OKE.dpf
zip file_dock *.*
