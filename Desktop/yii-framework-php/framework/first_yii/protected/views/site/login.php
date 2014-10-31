<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>
<?php
echo CHtml::image(Yii::app()->request->baseUrl . "/css/login_2.png", "login", array('align' => 'right', "width" => "200px", "height" => "500px"));
?>
<style type="text/css">
    .lblLogin {
        font-size: 14px !important;
    }
    .inputLogin{
        width: 250px;
        height: 25px;

    }
    #containLogin
    {
        margin-left: auto;margin-right: auto; width: 310px; border: 2px solid #94C; border-radius: 5px 5px 5px 5px;
        margin-top: 100px;
        padding: 10px 0px;
    }
</style>

<div id="containLogin" style="">

    <div class="form" style="margin-left: auto; margin-right: auto; width: 280px;">
        <?php
       // echo CHtml::image(Yii::app()->request->baseUrl . "/css/login.jpeg", "login", array('align' => 'center', "width" => "80px", "height" => "80px"));
        ?>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'login-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        ));
        ?>
        <p class="note">Please fill out the form with your credentials:</br>Fields with <span class="required">*</span> are required.</p>
        
        <div class="row">
            <?php echo $form->labelEx($model, 'username', array('class' => 'lblLogin', 'placeholder'=>'Enter unsername', 'label'=> 'User name', 'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
            <?php echo $form->textField($model, 'username', array('class' => 'inputLogin')); ?>
            <?php echo $form->error($model, 'username'); ?>
        </div>
        <br />
        <div class="row">
            <?php echo $form->labelEx($model, 'password', array('class' => 'lblLogin', 'placeholder'=>'Enter password', 'label'=> 'Password', 'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
            <?php echo $form->passwordField($model, 'password', array('class' => 'inputLogin')); ?>
            <?php echo $form->error($model, 'password'); ?>
        </div>
        
        <div class="row rememberMe">
            <?php echo $form->checkBox($model, 'rememberMe', array('style'=>'font-family:Comic Sans MS;  color : black;')); ?>
            <?php echo $form->label($model, 'rememberMe', array('style' => 'font-size : 10px; font-weight : bold; color : black;')); ?>
            <?php echo $form->error($model, 'rememberMe'); ?>
        </div>

        <div class="row buttons" style="margin-top: 10px; text-align: right;">
            <?php echo CHtml::submitButton('Login', array('style' => 'font-size : 14px; font-weight : bold; font-family:Comic Sans MS;  color : black; height : 30px; width : 120px; border-radius : 15px;')); ?>
        </div>
        <?php
        echo CHtml::link('Register', // the link for open the dialog
                array(
            '/user/register',
            'style' => 'cursor: pointer; text-decoration: underline;',
                //'onclick' => "{addClassroom(); $('#dialogClassroom').dialog('open');}"
        ));
        ?>
        <?php $this->endWidget(); ?>
    </div><!-- form -->
</div>
