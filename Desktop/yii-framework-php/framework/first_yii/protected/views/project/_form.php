<?php
/* @var $this MapController */
/* @var $model Map */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'project-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note"><h2><i>Project Docking</i></h2></p>

<?php echo $form->errorSummary($model); ?>

<?php
if (isset($_POST['btnAdd']) && isset($_POST['Ligand'])) {
    $fileDpf = $_POST['Ligand']['file_dpf'];
    $fileDck = shell_exec(`/bin/bash /home/dida/Downloads/taverna-commandline-core-2.5.0/executeworkflow.sh -inputvalue file $fileDpf /home/dida/Documents/TavernaStage/addGrid.t2flow`);
    print_r($fileDck);
}
?>

<div class="row">
<?php echo $form->labelEx($model, 'project_name', array('label' => 'Project Name', 'style' => 'font-size : 14px; font-family:Comic Sans MS; color : black;')); ?>
    <?php echo $form->textField($model, 'project_name', array('size' => 40, 'maxlength' => 200)); ?>
    <?php echo $form->error($model, 'project_name'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model, 'file_dpf', array('label' => 'DPF File', 'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
    <?php //echo $form->textField($model, 'file_dpf', array('size' => 60, 'maxlength' => 200, 'readonly'=>true, 'style'=>'background-color:#fbfbfb;'));  ?>
    <?php echo $form->error($model, 'file_dpf'); ?>
</div>

<div class="row">
    <input id="fileToUpload" type="file" name="fileToUpload" size="40" onchange="mapFileOnchange()" style="" />
    <div id="successRepoft" style="float: left; display: none;">
        <img src="../first_yii/assets/icon-archive/success-icon.png" >
    </div>
    <div id="unsuccessRepoft" style="float: left; display: none;">
        <img src="../first_yii/assets/icon-archive/unsuccess-icon.png" >
    </div>
    <input id="Dpf_file_name" name="Project[file_dpf]" type="hidden" value="">

</div>

<div class="row">
<?php echo $form->labelEx($model, 'ligand_id', array('label' => 'Choose Ligand', 'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
    <?php echo $form->listBox($model, 'ligand_id', CHtml::listData(Ligand::model()->findAll(), 'ligand_id', 'file_name'), array('style' => 'width:400px;', 'size' => '7', 'prompt' => '--please select--')); ?>
    <?php echo $form->error($model, 'ligand_id'); ?>
</div>
</br>
<div class="row">
<?php echo $form->labelEx($model, 'protein_id', array('label' => 'Choose Protein', 'style' => 'font-size : 14px; font-family:Comic Sans MS; color : black;')); ?>
    <?php echo $form->listBox($model, 'protein_id', CHtml::listData(Protein::model()->findAll(), 'protein_id', 'file_name'), array('style' => 'width:400px;', 'size' => '7', 'prompt' => '--please select--')); ?>
    <?php echo $form->error($model, 'protein_id'); ?>
</div>
</br>
<div class="row">
<?php echo $form->labelEx($model, 'map_id', array('label' => 'Choose Map Parameter', 'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
    <?php echo $form->listBox($model, 'map_id', CHtml::listData(Map::model()->findAll(), 'map_id', 'file_tar_gz'), array('style' => 'width:400px;', 'size' => '7', 'prompt' => '--please select--')); ?>
    <?php echo $form->error($model, 'map_id'); ?>
</div>
<br />
<div class="row buttons">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create Project' : 'Save', array('name' => 'btnAdd', 'style' => 'font-size : 14px; font-weight : bold; font-family:Comic Sans MS; color : black; height : 30px; width : 120px; border-radius : 15px;')); ?>

    <?php echo CHtml::resetButton('Reset', array('style' => 'font-size : 14px; font-weight : bold; font-family:Comic Sans MS; color : black; height : 30px; width : 120px; border-radius : 15px;')); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->