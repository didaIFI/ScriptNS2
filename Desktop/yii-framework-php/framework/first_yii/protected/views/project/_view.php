<?php
/* @var $this ProjectController */
/* @var $data Project */
?>

<div class="view">


    <b><?php echo CHtml::encode($data->getAttributeLabel('project_name')); ?>:</b>
    <?php echo CHtml::encode($data->project_name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('file_dpf')); ?>:</b>
    <?php echo CHtml::encode($data->file_dpf); ?>
    <br />
     
     <b><?php echo CHtml::encode($data->getAttributeLabel('ligand_id')); ?>:</b>
    <?php echo CHtml::encode($data->ligand->file_name); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('protein_id')); ?>:</b>
    <?php echo CHtml::encode($data->protein->file_name); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('map_id')); ?>:</b>
    <?php echo CHtml::encode($data->map->file_tar_gz); ?>
    <br />

</div>

<?php
$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
      'title' => array('text' => 'Energy DLG file'),
      'xAxis' => array(
         'categories' => array('14th','15th','16th','17th','18th','19th','20th','21th','22th','23th','24th','25th','26th','27th','28th')
      ),
      'yAxis' => array(
         'title' => array('text' => 'DLG file')
      ),
      'credits' => array('enabled' => false),
      'series' => array(
         array('name' => 'Energy', 'data' => array(-8.89, -8.08, -7.95,-7.50)),
         array('name' => 'RMSD', 'data' => array(15, 17, 14, 15, 18,21, 22, 26, 33, 28, 30, 28, 25, 36,40)),
         //array('name' => 'Richmond Office', 'data' => array(5, 7, 8,9, 7, 10,11, 12, 13,15, 17, 14,15,16,18)),
         //array('name' => 'Virgina Beach Office', 'data' => array(25, 27, 23, 22, 24,20, 25, 26, 30, 27, 30, 28, 25, 26,28)),
      )
   )
));   
?>
