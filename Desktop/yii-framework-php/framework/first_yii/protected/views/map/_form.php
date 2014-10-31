<?php
/* @var $this MapController */
/* @var $model Map */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'map-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'method' => 'POST',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note"><h2><i>Map Parameter</i></h2></p>

<?php echo $form->errorSummary($model); ?>


<div class="row">
    <?php echo $form->labelEx($model, 'map_file_name', array('label' => 'Map Parameter', 'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
    <?php echo $form->textField($model, 'map_file_name', array('size' => 40, 'maxlength' => 200)); ?>
    <?php echo $form->error($model, 'map_file_name'); ?>
</div>
<br />
<div class="row">
    <?php echo $form->labelEx($model, 'file_tar_gz', array('label' => 'Map Parameter File', 'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
    <?php //echo $form->textField($model, 'file_tar_gz', array('size' => 60, 'maxlength' => 200, 'readonly'=>true, 'style'=>'background-color:#fbfbfb;')); ?>
    <?php echo $form->error($model, 'file_tar_gz'); ?>
</div>
<div class="row">
    <input id="fileToUpload" type="file" name="fileToUpload" size="40" onchange="mapFileOnchange()" style="" />
    <div id="successRepoft" style="float: left; display: none;">
        <img src="../first_yii/assets/icon-archive/success-icon.png" >
    </div>
    <div id="unsuccessRepoft" style="float: left; display: none;">
        <img src="../first_yii/assets/icon-archive/unsuccess-icon.png" >
    </div>
    <input id="Map_file_name" name="Map[file_tar_gz]" type="hidden" value="">
</div>
<br />
<div class="row">
    <?php echo $form->labelEx($model, 'protein_id', array('label' => 'Choose Protein', 'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
    <?php echo $form->listBox($model, 'protein_id', CHtml::listData(Protein::model()->findAll(), 'protein_id', 'name'), array('style' => 'width:350px;', 'size' => '7', 'prompt' => '--please select--')); ?>
    <?php echo $form->error($model, 'protein_id'); ?>
</div>
<br />
<div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('style' => 'font-size : 14px; font-weight : bold; font-family:Comic Sans MS; color : black; height : 30px; width : 120px; border-radius : 15px;')); ?>
    <?php echo CHtml::resetButton('Reset', array('style' => 'font-size : 14px; font-weight : bold; color : black; font-family:Comic Sans MS; height : 30px; width : 120px; border-radius : 15px;')); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->