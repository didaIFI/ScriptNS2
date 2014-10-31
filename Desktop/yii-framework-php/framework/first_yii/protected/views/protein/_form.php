<?php
/* @var $this MapController */
/* @var $model Map */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'protein-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated cont
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>
  
    <p class="note"><h2><i>Protein</i></h2></p>
<?php echo CHtml::beginForm('', 'POST'); ?>
<?php echo $form->errorSummary($model); ?>
<?php
//
    if (isset($_POST['Protein'])) {
        $file = $_POST['file_name'];
        $command = exec('cp /home/dida/DIRAC/*.pdbqt /var/www/yii-framework-php/framework/first_yii/protected/views/protein/fileUpload');
        //$cmdProt = shell_exec('/bin/bash /home/dida/DIRAC/addDirac.sh'. ' ' .$file);
        echo $command;
        print_r($cmdProt);
    }
//   ?>


<div class="row">
    <?php echo $form->labelEx($model, 'name',  array('label'=> 'Protein Name',  'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
    <?php
    echo $form->textField($model, 'name', array('size' => 40, 'maxlength' => 200, 'class' => 'form-control',
        'ajax' =>
        array('type' => 'POST',
            'url' => $this->createUrl('recieveValue'), // write in controller this action
            'update' => '#protein',
            'data' => array('name' => 'js:this.value'),
        )
    ));
    ?>
    <?php echo $form->error($model, 'name'); ?>
</div>
<br />
<div class="row">
    <?php echo $form->labelEx($model, 'file_name', array('label' => 'Protein File', 'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
    <?php //echo $form->textField($model, 'file_name', array('size' => 60, 'maxlength' => 200, 'readonly'=>true, 'style'=>'background-color:#fbfbfb;')); ?>
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
    <input id="Protein_file_name" name="Protein[file_name]" type="hidden" value="">

</div>

<br />
<div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('style' => 'font-size : 14px; font-weight : bold; font-family:Comic Sans MS; color : black; height : 30px; width : 120px; border-radius : 15px;')); ?>
    <?php echo CHtml::resetButton('Reset', array('style' => 'font-size : 14px; font-weight : bold;  font-family:Comic Sans MS; color : black; height : 30px; width : 120px; border-radius : 15px;')); ?>

</div>

<?php $this->endWidget(); ?>

</div><!-- form -->