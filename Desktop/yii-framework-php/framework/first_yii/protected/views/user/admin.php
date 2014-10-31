<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Users' => array('index'),
    'Manage',
);

$this->menu = array(
   
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});

");
?>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(// the dialog
    'id' => 'dialogClassroom',
    'options' => array(
        'title' => 'Protein',
        'autoOpen' => false,
        'modal' => true,
        'width' => 470,
        'height' => 320,
    ),
));
?>
<div class="divForForm"></div>
<?php $this->endWidget(); ?>
<h1><i>Manage Users</i></h1>
<br />

<?php
echo CHtml::button('Advanced Search', array(
    'style' => 'font-size : 14px; font-weight : bold; font-family : Comic Sans MS; color : black; height : 30px; width : 140px; border-radius : 15px;',
    'class' => 'search-button'));
?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div>
<br/>
<br/>
<br/>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'user-grid',
    'htmlOptions' => array('style' => 'width:950px;'),
    'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css'),
    //'cssFile'=>false,
    'cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css',
    'htmlOptions' => array('class' => 'grid-view rounded'),
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'user_id',
        'name',
        'password',
        'protein_mgr',
        'ligand_mgr',
        'docking_mgr',
       array(
            'header' => 'Operations',
            'class' => 'CButtonColumn',
            'template' => '{update} {delete} {view}',
            'buttons' => array
                (
                'update' => array(
                    //'visible' => '(isset(Yii::app()->user->protein_mgr) && Yii::app()->user->protein_mgr)',
                    //'visible'=> 'Yii::app()-user->protein_login',
                    //'visible' => 'Yii::app()->user->name == "admin"',
                    //'click' => 'function(){updateClassroom(this); $("#dialogClassroom").dialog("open");return false;}',
                ),
                'delete' => array(
                    //'visible' => '(isset(Yii::app()->user->protein_mgr) && Yii::app()->user->protein_mgr)',
                )
            )
        )
    ),
));
?>
