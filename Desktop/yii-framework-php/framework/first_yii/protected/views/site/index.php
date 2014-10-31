<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<?php
//echo CHtml::image(Yii::app()->request->baseUrl . "/css/dock12.jpg", "dock", array('align' => 'right', "width" => "300px", "height" => "500px")
//);
//?>
<div style="text-align: justify; font-family:Comic Sans MS; font-size:12px; color:#0000dd;" >
<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1
<p><h2>Protein-ligand docking is a computational method for drug discovery.
    IVS, is a web plateform for virtual screening on grid computing, it help user to submit and monitor docking jobs on the grid.
    It is a user-friendly interface, especially for end-users who are not the informatic and gird experts like chemists, biologists and medecines. This plateform could indeed save enormous amount of money and time, 
    by getting the result of docking protein-ligand very rapidely.
</h2></p>
</div>
<?php
 
$this->widget('ext.Yiippod-master.Yiippod', array(
'video'=>"https://www.youtube.com/watch?v=H_ChiGTpZd4",
'id' => 'yiippodplayer',
'width'=>600,
'height'=>350,
'bgcolor'=>'#000'
));
?>

