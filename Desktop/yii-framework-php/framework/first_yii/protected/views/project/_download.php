<?php
/* @var $this ProjectController */
/* @var $data Project */
?>

<div class="download">
    <b><?php echo CHtml::encode($data->getAttributeLabel('file_dpf')); ?>:</b>
    <?php echo CHtml::encode($data->file_dpf); ?>
    <br />
</div>