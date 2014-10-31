<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>


<?php
echo CHtml::image(Yii::app()->request->baseUrl . "/css/login_2.png", "login", array('align' => 'right', "width" => "200px", "height" => "500px"));
?>
<style type="text/css">
    .lblLogin {
        font-size: 12px !important;
    }
    .inputLogin{
        width: 300px;
        height: 25px;

    }
    #containLogin
    {
        margin-left: auto;margin-right: auto; width: 321px; border: 2px solid #94C; border-radius: 5px 5px 5px 5px;
        margin-top: 30px;
        padding: 10px 30px;
    }
</style>
<div id="containLogin" style="">

    <div class="form" style="margin-left: auto; margin-right: auto; width: 500px;">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'user-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
        ));
        ?>

        <p class="note"><h2><i><b>User Registration</b></i></h2></p>

        <?php echo $form->errorSummary($model); ?>

        <div class="row">
            <?php echo $form->labelEx($model, 'name', array('label' => 'User name', 'style' => 'margin-bottom:5px; font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
            <?php echo $form->textField($model, 'name', array('size' => 40, 'maxlength' => 100, 'style' => 'width: 300px; height: 20px;', 'placeholder' => "Enter user name here")); ?>
            <?php echo $form->error($model, 'name'); ?>
        </div>
        <br />
        <div class="row">
            <?php echo $form->labelEx($model, 'password', array('style' => 'margin-bottom:5px; font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
            <?php echo $form->passwordField($model, 'password', array('size' => 40, 'maxlength' => 100, 'style' => 'width: 300px; height: 20px;', 'placeholder' => "Enter password here")); ?>
            <?php echo $form->error($model, 'password'); ?>
        </div>
        <br />
        <b>
            <div class="row">
                <?php echo $form->labelEx($model, 'protein_mgr', array('label' => 'Proteiner', 'style' => 'margin-bottom:5px;font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
                <?php echo $form->radioButton($model, 'protein_mgr'); ?>
                <?php echo $form->error($model, 'protein_mgr'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'ligand_mgr', array('label' => 'Ligander', 'style' => 'margin-bottom:5px; font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
                <?php echo $form->radioButton($model, 'ligand_mgr'); ?>
                <?php echo $form->error($model, 'ligand_mgr'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'docking_mgr', array('label' => 'Docker', 'style' => 'margin-bottom:5px; font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
                <?php echo $form->radioButton($model, 'docking_mgr'); ?>
                <?php echo $form->error($model, 'docking_mgr'); ?>
            </div>
            <b/>
            <br />
           
            <div class="row buttons">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Register' : 'Save', array('style' => 'font-size : 14px; font-weight : bold; font-family:Comic Sans MS; color : black; height : 30px; width : 120px; border-radius : 15px;')); ?>
                <?php ?>
                <?php echo CHtml::button('Back', array('onclick' => 'js:history.go(-1); returnFalse;', 'style' => 'font-size : 14px; font-weight : bold; font-family:Comic Sans MS; height : 30px; color : black; width : 120px; border-radius : 15px;'));
                ?>
            </div>

            <?php $this->endWidget(); ?>
    </div><!-- form -->
</div>