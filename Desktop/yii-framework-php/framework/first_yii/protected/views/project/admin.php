<?php
/* @var $this MapController */
/* @var $model Map */

$this->breadcrumbs = array(
    'Projects' => array('index'),
    'Manage',
);

$this->menu = array(
        //array('label'=>'List Map', 'url'=>array('index')),
        //array('label'=>'Create Map', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#project-grid').yiiGridView('update', {
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
        'title' => 'Project',
        'autoOpen' => false,
        'modal' => true,
        'width' => 500,
        'height' => 760,
    ),
));
?>
<div class="divForForm"></div>
<?php $this->endWidget(); ?>
<h1> <i></i></h1>
<br />
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
    'id' => 'project-grid',
    'htmlOptions' => array('style' => 'width:950px;'),
    'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css'),
    //'cssFile'=>false,
    'cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css',
    'htmlOptions' => array('class' => 'grid-view rounded'),
    'dataProvider' => $model->search(),
    'filter' => $model,
    //'rowCssClassExpression'=>'($data->cancel_status == "Y")? "cancel" : "row_id_" . $row . " " . ($row%2?"even":"odd")',
    'columns' => array(
        array(
            'class' => 'CCheckBoxColumn',
            'id' => 'selectedItems'
        ),
        'project_id',
        'project_name',
        'file_dpf',
        array(
            'name' => 'ligand_id',
            'header' => 'Ligand',
            'value' => '$data->ligand->file_name',
            'filter' => CHtml::listData(Ligand::model()->findAll(), 'ligand_id', 'file_name'),
        ),
        array(
            'name' => 'protein_id',
            'header' => 'Protein',
            'value' => '$data->protein->file_name',
            'filter' => CHtml::listData(Protein::model()->findAll(), 'protein_id', 'file_name'),
        ),
        array(
            'name' => 'map_id',
            'header' => 'Map',
            'value' => '$data->map->file_tar_gz',
            'filter' => CHtml::listData(Map::model()->findAll(), 'map_id', 'file_tar_gz'),
        ),
//        array(
//            'name' => 'job_stat',
//            'header' => 'Job ID',
//            'value' => '(string)mt_rand(182000, 200000).$data->project_id',
//        ),
//        array(
//            'name' => 'job_rslt',
//            'type' => 'raw',
//            'value' => 'CHtml::link("Dock-File$data->project_id", Yii::app()->baseUrl. "/protected/views/project/fileUpload/fileDock1.tar.bz2". $data->job_rslt, '
//            . 'array("target"=>"_blank"))',
//        //  'value' => 'CHtml::link("Download!", Yii::app()->createAbsoluteUrl("project/download",array("id"=>$data->job_rslt)))'
//        //'value' => 'CHtml::link($data->job_rslt, Yii::app()->createUrl("project/view",array("id"=>$data->primaryKey)))',
//        ),
        array(
            'header' => 'Operations',
            'class' => 'CButtonColumn',
            'template' => '{update} {delete} {view}',
            'buttons' => array
                (
                'update' => array(
                    'visible' => '(isset(Yii::app()->user->docking_mgr) && Yii::app()->user->docking_mgr)',
                    //'visible'=> 'Yii::app()-user->protein_login',
                    //'visible'=> (isset(Yii::app()->user->ligand_login) && Yii::app()->user->ligand_login),
                    'click' => 'function(){updateClassroom(this); $("#dialogClassroom").dialog("open");return false;}',
                ),
                'delete' => array(
                    'visible' => '(isset(Yii::app()->user->docking_mgr) && Yii::app()->user->docking_mgr)',
                    'afterDelete' => 'function(link,success,data){window.location.reload();}'
                )
            )
        ),
        array(
            'header' => 'Download',
            'class' => 'CButtonColumn',
            'template' => '{download}',
            'buttons' => array
                (
                'download' => array(
                    'label' => 'save result',
                    'imageUrl' => Yii::app()->request->baseUrl . "/assets/icon-archive/dest.png",
                    'visible' => '(isset(Yii::app()->user->docking_mgr) && Yii::app()->user->docking_mgr)',
                      'url' => 'Yii::app()->createAbsoluteUrl(
	                                      "project/download",
	                                      array("id"=>$data->project_id))',
                //'url' => 'project/download',
                // 'click' => Yii::app()->createAbsoluteUrl("project/download"),
                ),
            )
        ),
        
//              array(
//            'class' => 'CButtonColumn',
//            'template' => '{refresh} ',
//            'header' => 'Refresh',
//            'buttons' => array(
//                'refresh' => array(
//                    'label' => 'Refresh',
//                    'imageUrl' => Yii::app()->request->baseUrl . '/assets/icon-archive/l.png',
//                    'url' => 'Yii::app()->createAbsoluteUrl(
//	                                      "project/refresh",
//	                                      array("id"=>$data->project_id))',
//                ),
//            ),
//        //'htmlOptions' => array('width' => 100),
//        ),
        array(
            'header' => 'Submit',
            'class' => 'CButtonColumn',
            'template' => '{submit}',
            'buttons' => array
                (
                'submit' => array(
                    'label' => 'submit docking',
                    'imageUrl' => Yii::app()->request->baseUrl . "/assets/icon-archive/g.png",    
                    'url' => 'Yii::app()->createAbsoluteUrl(
	                                      "project/dock",
	                                      array("id"=>$data->project_id))',
                //'url' => 'protected/views/project/dock'
                ),
            )
        ),
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
    ),
));

class MyClass {

    public static function myMethod($data, $row, $component) {
        //the $data is the ActiveRecord Model collection from the dataProvider
        //the $row is the data row
        //the $component is the CGridColumn object for each columns
        // return the result you want
        return $row + 1;
    }

}
?>
<br/>

<?php
if (isset(Yii::app()->user->docking_mgr) && Yii::app()->user->docking_mgr) {
    echo CHtml::button('Add Project ', // the link for open the dialog
            array(
        //'style' => 'cursor: pointer; text-decoration: underline;',
        'style' => 'font-size : 14px; font-weight : bold; font-family : Comic Sans MS; color : black; height : 30px; width : 120px; border-radius : 15px;',
        'visible' => '(isset(Yii::app()->user->docking_mgr) && Yii::app()->user->docking_mgr)',
        'onclick' => "{addClassroom(); $('#dialogClassroom').dialog('open');}"
    ));
} else {
    echo "You have to login if you want to manage map parameter!!!";
}
?>


<script type="text/javascript" src="../first_yii/assets/js_uploadfile/ajaxfileupload.js"></script>
<script type="text/javascript">
    // ajax upload image to server
    function ajaxFileUpload()
    {
        // add code validate here...
        $fileUp = $('input[name=fileToUpload]').val();
        if ($fileUp == '')
            return;

        $.ajaxFileUpload
                (
                        {
                            url: 'protected/views/project/doajaxfileupload.php',
                            secureuri: false,
                            fileElementId: 'fileToUpload',
                            async: false,
                            dataType: 'json',
                            //data:{
                            //    name:'logan', 
                            //    id:'id'
                            //},
                            success:
                                    function(data, status)
                                    {
                                        if (typeof (data.error) != 'undefined')
                                        {
                                            if (data.error != '')
                                            {
                                                $("#unsuccessRepoft").show();
                                            }
                                            else
                                            {
                                                $('#Dpf_file_name').val(data.msg);
                                                $("#successRepoft").show();
                                            }
                                        }
                                    }
                            ,
                            error: function(data, status, e)
                            {
                                $("#unsuccessRepoft").show();
                            }
                        }
                )

        return;

    }

    // here is the magic
    function addClassroom()
    {
        $.ajax({
            url: 'index.php?r=project/create',
            type: 'post',
            dataType: 'json',
            data: $(this).serialize(),
            success: function(data) {
                if (data.status == 'failure')
                {
                    $('#dialogClassroom div.divForForm').html(data.div);
                    // Here is the trick: on submit-> once again this function!
                    $('#dialogClassroom div.divForForm form').submit(
                            addClassroom
                            );
                }
                else
                {
                    //$('#dialogClassroom div.divForForm').html(data.div);
                    $.fn.yiiGridView.update('project-grid');
                    //setTimeout("$('#dialogClassroom').dialog('close')",3000);

                    $('#dialogClassroom').dialog('close');
                    alert('insert success');
                }
            }
        });
        return false;
    }
    function updateClassroom(control)
    {
        $.ajax({
            url: $(control).attr('href'),
            type: 'post',
            dataType: 'json',
            data: $(this).serialize(),
            success: function(data) {
                if (data.status == 'failure')
                {
                    $('#dialogClassroom div.divForForm').html(data.div);
                    //Here is the trick: on submit-> once again this function!
                    $('#dialogClassroom div.divForForm form').submit(_updateClassroom);
                }
                else
                {
                    $('#dialogClassroom div.divForForm').html(data.div);
                    $.fn.yiiGridView.update('project-grid');
                    setTimeout("$('#dialogClassroom').dialog('close')", 3000);
                }
            }
        });
        return false;
    }

    function _updateClassroom()
    {
        $.ajax({
            url: 'index.php?r=project/update&id=0',
            type: 'post',
            dataType: 'json',
            data: $(this).serialize(),
            success: function(data) {
                if (data.status == 'failure')
                {
                    $('#dialogClassroom div.divForForm').html(data.div);
                    $('#dialogClassroom div.divForForm form').submit(_updateClassroom);
                    //Here is the trick: on submit-> once again this function!
                }
                else
                {
                    //$('#dialogClassroom div.divForForm').html(data.div);
                    $.fn.yiiGridView.update('project-grid');
                    //setTimeout("$('#dialogClassroom').dialog('close')",3000);

                    $('#dialogClassroom').dialog('close');
                    alert('update success');
                }
            }
        });
        return false;

    }

    function mapFileOnchange()
    {
        ajaxFileUpload();
        //$("#successRepoft").show();
    }
    
    //download
    

</script>