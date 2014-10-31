<?php
/* @var $this LigandController */
/* @var $model Ligand */
/* @var $form CActiveForm */
?>
<style type="text/css">
    .divFormFloatLeft
    {
        float: left;
    }
    .divFormFloatRight
    {
        float: left;
        margin-left: 70px;
    }

</style>
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'ligand-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <p class="note"><h2><i>Ligand Molecul</i></h2></p>
        <!--<p class="note">Fields with <span class="required">*</span> are required.</p>-->

    <?php echo $form->errorSummary($model); ?>
    <?php
    if (isset($_POST['btnLig'])){
        $file = $_POST['Ligand']['file_name'];
        print_r($file);
        $cmd = shell_exec('/bin/bash /home/dida/DIRAC/addDirac.sh' . ' ' . $file);
        print_r($cmd);
    }
    
    ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'name', array('label'=> 'Ligand Name',  'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
        <?php echo $form->textField($model, 'name', array('size' => 55, 'maxlength' => 200)); ?>
        <?php // echo $form->error($model,'name');  ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'file_name', array('label'=> 'Ligand File',  'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
        <?php //echo $form->textField($model, 'file_tar_gz', array('size' => 60, 'maxlength' => 200, 'readonly'=>true, 'style'=>'background-color:#fbfbfb;'));  ?>
        <?php echo $form->error($model, 'file_name'); ?>
    </div>
    <div class="row">
        <input id="fileToUpload" type="file" name="fileToUpload" size="40" onchange="mapFileOnchange()" style="" />
        <div id="successRepoft" style="float: left; display: none;">
            <img src="../first_yii/assets/icon-archive/success-icon.png" >
        </div>
        <div id="unsuccessRepoft" style="float: left; display: none;">
            <img src="../first_yii/assets/icon-archive/unsuccess-icon.png" >
        </div>
        <input id="Ligand_file_name" name="Ligand[file_name]" type="hidden" value="">
    </div>

    <div class="row divFormFloatLeft">
        <?php echo $form->labelEx($model, 'mw', array('label'=> 'MW',  'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
        <?php echo $form->textField($model, 'mw'); ?>
        <?php // echo $form->error($model,'mw');  ?>
    </div>

    <div class="row divFormFloatRight">
        <?php echo $form->labelEx($model, 'hd',array('label'=> 'HD',  'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
        <?php echo $form->textField($model, 'hd'); ?>
        <?php // echo $form->error($model,'hd');  ?>
    </div>

    <div style="clear: both;"></div>

    <div class="row divFormFloatLeft">
        <?php echo $form->labelEx($model, 'ha', array('label'=> 'HA',  'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
        <?php echo $form->textField($model, 'ha'); ?>
        <?php // echo $form->error($model,'ha');  ?>
    </div>

    <div class="row divFormFloatRight">
        <?php echo $form->labelEx($model, 'log_p', array('label'=> 'Log_p',  'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
        <?php echo $form->textField($model, 'log_p'); ?>
        <?php // echo $form->error($model,'log_p');  ?>
    </div>

    <div style="clear: both;"></div>

    <div class="row divFormFloatLeft">
        <?php echo $form->labelEx($model, 'psa',array('label'=> 'PSA',  'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
        <?php echo $form->textField($model, 'psa'); ?>
        <?php // echo $form->error($model,'psa');  ?>
    </div>

    <div class="row divFormFloatRight">
        <?php echo $form->labelEx($model, 'ic50_hep', array('label'=> 'IC50_HEP',  'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
        <?php echo $form->textField($model, 'ic50_hep'); ?>
        <?php // echo $form->error($model,'ic50_hep');  ?>
    </div>

    <div style="clear: both;"></div>

    <div class="row divFormFloatLeft">
        <?php echo $form->labelEx($model, 'ic50_rd',array('label'=> 'IC50_RD',  'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
        <?php echo $form->textField($model, 'ic50_rd'); ?>
        <?php // echo $form->error($model,'ic50_rd');  ?>
    </div>

    <div class="row divFormFloatRight">
        <?php echo $form->labelEx($model, 'ic50_fi',array('label'=> 'IC50_FI',  'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
        <?php echo $form->textField($model, 'ic50_fi'); ?>
        <?php // echo $form->error($model,'ic50_fi');  ?>
    </div>

    <div style="clear: both;"></div>


    <div class="row">
        <?php echo $form->labelEx($model, 'plant_specie', array('label'=> 'Plant Specie',  'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
        <?php echo $form->textField($model, 'plant_specie', array('size' => 55, 'maxlength' => 200)); ?>
        <?php // echo $form->error($model,'plant_specie');  ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'plant_part', array('label'=> 'Plant Part',  'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
        <?php echo $form->textField($model, 'plant_part', array('size' => 55, 'maxlength' => 200)); ?>
        <?php // echo $form->error($model,'plant_part');  ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'reference', array('label'=> 'Reference',  'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
        <?php echo $form->textField($model, 'reference', array('size' => 55, 'maxlength' => 200)); ?>
        <?php // echo $form->error($model,'reference');  ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'classification', array('label'=> 'Classification',  'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
        <?php echo $form->textField($model, 'classification', array('size' => 55, 'maxlength' => 200)); ?>
        <?php // echo $form->error($model,'classification');  ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'bioactivity', array('label'=> 'Bioactivity',  'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
        <?php echo $form->textField($model, 'bioactivity', array('size' => 55, 'maxlength' => 200)); ?>
        <?php // echo $form->error($model,'bioactivity');  ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'remark', array('label'=> 'Remark',  'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
        <?php echo $form->textField($model, 'remark', array('size' => 55, 'maxlength' => 200)); ?>
        <?php // echo $form->error($model,'remark');  ?>
    </div>
    <br />
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('name' => 'btnLig', 'style' => 'font-size : 14px; font-weight : bold; font-family:Comic Sans MS; color : black; height : 30px; width : 120px; border-radius : 15px;')); ?>
        <?php echo CHtml::resetButton('Reset', array('style' => 'font-size : 14px; font-weight : bold; font-family:Comic Sans MS; color : black; height : 30px; width : 120px; border-radius : 15px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
