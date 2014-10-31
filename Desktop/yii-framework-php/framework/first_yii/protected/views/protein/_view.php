<?php
/* @var $this MapController */
/* @var $data Map */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('protein_id')); ?>:</b>
	<?php echo CHtml::encode($data->protein_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file_name')); ?>:</b>
	<?php echo CHtml::encode($data->file_name); ?>
	<br />


</div>