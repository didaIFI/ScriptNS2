<?php
/* @var $this MapController */
/* @var $model Map */

$this->breadcrumbs = array(
    'Maps' => array('index'),
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
	$('#map-grid').yiiGridView('update', {
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
        'title' => 'Map Parameter',
        'autoOpen' => false,
        'modal' => true,
        'width' => 460,
        'height' => 500,
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
    'id' => 'map-grid',
    'htmlOptions' => array('style' => 'width:950px;'),
    'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css'),
    //'cssFile'=>false,
    'cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css',
    'htmlOptions' => array('class' => 'grid-view rounded'),
    'dataProvider' => $model->search(),
    'filter' => $model,
    //'rowCssClassExpression'=>'($data->cancel_status == "Y")? "cancel" : "row_id_" . $row . " " . ($row%2?"even":"odd")',
    'columns' => array(
        'map_id',
        'map_file_name',
        'file_tar_gz',
        array(
            'name' => 'protein_id',
            'header' => 'Protein',
            'value' => '$data->protein->name',
            'filter' => CHtml::listData(Protein::model()->findAll(), 'protein_id', 'name'),
        ),
        array(
            'header' => 'Operations',
            'class' => 'CButtonColumn',
            'template' => '{update} {delete} {view}',
            'buttons' => array
                (
                'update' => array(
                    'visible' => '(isset(Yii::app()->user->protein_mgr) && Yii::app()->user->protein_mgr)',
                    //'visible'=> 'Yii::app()-user->protein_login',
                    //'visible'=> (isset(Yii::app()->user->ligand_login) && Yii::app()->user->ligand_login),
                    'click' => 'function(){updateClassroom(this); $("#dialogClassroom").dialog("open");return false;}',
                ),
                'delete' => array(
                    'visible' => '(isset(Yii::app()->user->protein_mgr) && Yii::app()->user->protein_mgr)',
                    'afterDelete' => 'function(link,success,data){window.location.reload();}'
                )
            )
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{refresh} ',
            'header' => 'Refresh',
            'buttons' => array(
                'refresh' => array(
                    'label' => 'Refresh',
                    'imageUrl' => Yii::app()->request->baseUrl . '/assets/icon-archive/l.png',
                    'url' => 'Yii::app()->createAbsoluteUrl(
	                                      "map/refresh",
	                                      array("id"=>$data->map_id))',
                ),
            ),
        //'htmlOptions' => array('width' => 100),
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
if (isset(Yii::app()->user->protein_mgr) && Yii::app()->user->protein_mgr) {
    echo CHtml::button('Add Map ', // the link for open the dialog
            array(
        //'style' => 'cursor: pointer; text-decoration: underline;',
        'style' => 'font-size : 14px; font-weight : bold; font-family : Comic Sans MS; color : black; height : 30px; width : 120px; border-radius : 15px;',
        'visible' => '(isset(Yii::app()->user->protein_mgr) && Yii::app()->user->protein_mgr)',
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
                            url: 'protected/views/map/doajaxfileupload.php',
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
                                                $('#Map_file_name').val(data.msg);
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
            url: 'index.php?r=map/create',
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
                    $.fn.yiiGridView.update('map-grid');
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
                    $.fn.yiiGridView.update('map-grid');
                    setTimeout("$('#dialogClassroom').dialog('close')", 3000);
                }
            }
        });
        return false;
    }

    function _updateClassroom()
    {
        $.ajax({
            url: 'index.php?r=map/update&id=0',
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
                    $.fn.yiiGridView.update('map-grid');
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

</script>