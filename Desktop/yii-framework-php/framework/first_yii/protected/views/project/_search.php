<?php
/* @var $this MapController */
/* @var $model Map */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>



	<div class="row">
		<?php echo $form->label($model,'project_name'); ?>
		<?php echo $form->textField($model,'project_name',array('size'=>40,'maxlength'=>100)); ?>
	</div>
        
       <div class="row">
		<?php echo $form->label($model,'file_dpf'); ?>
		<?php echo $form->dropDownList($model, 'file_dpf', CHtml::listData(Project::model()->findAll(), 'project_id', 'file_dpf'));?>
	</div>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->