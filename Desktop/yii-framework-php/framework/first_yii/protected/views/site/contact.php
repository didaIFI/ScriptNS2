<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Contact Us';
$this->breadcrumbs = array(
    'Contact',
);
?>

<h1><i>Contact US</i></h1>

<?php if (Yii::app()->user->hasFlash('contact')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('contact'); ?>
    </div>

<?php else: ?>


    <div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'contact-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        ));
        ?>

            <!--<p class="note">Fields with <span class="required">*</span> are required.</p>-->

    <?php echo $form->errorSummary($model); ?>

        <div class="row">
            <?php echo $form->labelEx($model, 'name', array('label' => 'Name', 'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
            <?php echo $form->textField($model, 'name', array('size' => 40, 'maxlength' => 100, 'style' => 'width: 300px; height: 20px;', 'placeholder' => "Enter your name here")); ?>
    <?php echo $form->error($model, 'name'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'email', array('label' => 'Email', 'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
            <?php echo $form->textField($model, 'email', array('size' => 40, 'maxlength' => 100, 'style' => 'width: 300px; height: 20px;', 'placeholder' => "Enter your mail here")); ?>
    <?php echo $form->error($model, 'email'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'subject', array('label' => 'Subject', 'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
            <?php echo $form->textField($model, 'subject', array('size' => 40, 'maxlength' => 100, 'style' => 'width: 300px; height: 20px;', 'placeholder' => "Enter the subject here")); ?>
    <?php echo $form->error($model, 'subject'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'body', array('label' => 'Body', 'style' => 'font-size : 14px; font-family:Comic Sans MS;  color : black;')); ?>
            <?php echo "  "; ?>
            <?php echo $form->textArea($model, 'body', array('rows' => 6, 'cols' => 50)); ?>
    <?php echo $form->error($model, 'body'); ?>
        </div>

            <?php if (CCaptcha::checkRequirements()): ?>
            <div class="row">
                    <?php echo $form->labelEx($model, 'verifyCode'); ?>
                <div>
                    <?php $this->widget('CCaptcha'); ?>
        <?php echo $form->textField($model, 'verifyCode'); ?>
                </div>
                <div class="hint">Please enter the letters as they are shown in the image above.
                    <br/>Letters are not case-sensitive.</div>
            <?php echo $form->error($model, 'verifyCode'); ?>
            </div>
    <?php endif; ?>
        </br>
        <div class="row buttons">
    <?php echo CHtml::submitButton('Submit', array('style' => 'font-size : 14px; font-weight : bold; font-family : Comic Sans MS; color : black; height : 30px; width : 120px; border-radius : 15px;')); ?>
        </div>
        </br>

    <?php $this->endWidget(); ?>

    </div><!-- form -->

<?php endif; ?>

<?php
Yii::import('ext.EGMap.*');
$gMap = new EGMap();

$gMap->setWidth(600);
// it can also be called $gMap->height = 400;
$gMap->setHeight(400);
$gMap->zoom = 13;

// set center to inca
$gMap->setCenter(21.036792, 105.782129);
$marker = new EGMapMarker(21.036792, 105.782129, array('title' => '"IFI"'));
$gMap->addMarker($marker);
// my house when i was a kid
$home = new EGMapCoord(21.036792, 105.782129);
$gMap->renderMap();
?>
<div id="direction_pane"></div>

<?php
//Yii::import('application.extensions.PHPMailer_v5.1.*');
//
//class Mailer {
//
//    private $mail;
//
//    pubYii::import('application.extensions.PHPMailer_v5.1.*');
//
//class Mailer {
//
//    private $mail;
//
//    public function initialise() {
//        try {
//            require Yii::getPathOfAlias('application.extensions') . '/PHPMailer_v5.1/class.phpmailer.php';
//            $this->mail = new PHPMailer(TRUE);
//            $this->mail->IsSMTP();                           // tell the class to use SMTP
//            $this->mail->SMTPDebug = 0;
//            $this->mail->SMTPAuth = true;                  // enable SMTP authentication
//            $this->mail->Port = 25;                    // set the SMTP server port
//            $this->mail->Host = "smtp.test.net"; // SMTP server
//            $this->mail->Username = "test.com";      // SMTP server username
//            $this->mail->Password = "test";            // SMTP server password
//            $this->mail->Mailer = "smtp";
//            $this->mail->From = 'info@test.com';
//            $this->mail->FromName = 'test@net.com';
//        } catch (Exception $e) {
//            echo $e->getTraceAsString();
//        }
//    }
//
//    public function email($message, $sendTo, $subject) {
//        try {
//            $this->mail->AddAddress($sendTo);
//            $this->mail->Subject = $subject;
//            $body = $message;
//            $this->mail->MsgHTML($body);//}
//            $this->mail->IsHTML(true); // send as HTML
//            $this->mail->Send();
//            $this->mail->ClearAllRecipients();
//        } catch (Exception $e) {
//            echo $e->getTraceAsString();
//        }
//    }
//
//}lic function initialise() {
//        try {
//            require Yii::getPathOfAlias('application.extensions') . '/PHPMailer_v5.1/class.phpmailer.php';
//            $this->mail = new PHPMailer(TRUE);
//            $this->mail->IsSMTP();                           // tell the class to use SMTP
//            $this->mail->SMTPDebug = 0;
//            $this->mail->SMTPAuth = true;                  // enable SMTP authentication
//            $this->mail->Port = 25;                    // set the SMTP server port
//            $this->mail->Host = "smtp.test.net"; // SMTP server
//            $this->mail->Username = "test.com";      // SMTP server username
//            $this->mail->Password = "test";            // SMTP server password
//            $this->mail->Mailer = "smtp";
//            $this->mail->From = 'info@test.com';
//            $this->mail->FromName = 'test@net.com';
//        } catch (Exception $e) {
//            echo $e->getTraceAsString();
//        }
//    }
//
//    public function email($message, $sendTo, $subject) {
//        try {
//            $this->mail->AddAddress($sendTo);
//            $this->mail->Subject = $subject;
//            $body = $message;
//            $this->mail->MsgHTML($body);
//            $this->mail->IsHTML(true); // send as HTML
//            $this->mail->Send();
//            $this->mail->ClearAllRecipients();
//        } catch (Exception $e) {
//            echo $e->getTraceAsString();
//        }
//    }
//
//}
?>