<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class DemoCommand extends CConsoleCommand {

    public function run($args)
    {
        echo "Hello! Param=".Yii::app()->params['testparam']."\n";
    }
}