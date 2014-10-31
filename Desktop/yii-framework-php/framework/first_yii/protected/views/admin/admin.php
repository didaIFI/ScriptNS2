<?php
/* @var $this AdminController */
/* @var $model Admin */

$this->breadcrumbs = array(
    'Admins' => array('index'),
    'Manage',
);

$this->menu = array(
//    array('label' => 'List Admin', 'url' => array('index')),
//    array('label' => 'Create Admin', 'url' => array('create')),
);

//Yii::app()->clientScript->registerScript('search', "
//$('.search-button').click(function(){
//	$('.search-form').toggle();
//	return false;
//});
//$('.search-form form').submit(function(){
//	$('#admin-grid').yiiGridView('update', {
//		data: $(this).serialize()
//	});
//	return false;
//});
//");
?>

<h1>Manage Admins</h1>

<?php
echo CHtml::link('Create classroom', "", // the link for open the dialog
        array(
    'style' => 'cursor: pointer; text-decoration: underline;',
    'onclick' => "{addClassroom(); $('#dialogClassroom').dialog('open');}"
            ));
?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(// the dialog
    'id' => 'dialogClassroom',
    'options' => array(
        'title' => 'Create classroom',
        'autoOpen' => false,
        'modal' => true,
        'width' => 550,
        'height' => 470,
    ),
));
?>
<div class="divForForm"></div>

<?php $this->endWidget(); ?>



<!--<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php //echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<!--<div class="search-form" style="display:none">
<?php
//    $this->renderPartial('_search', array(
//        'model' => $model,
//    ));
?>
</div>-->
<!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'admin-grid',
    'dataProvider' => $model->search(),
    //'filter' => $model,
    'columns' => array(
        //'id',
        array(
            'header' => 'Index',
            'name' => 'id',
            // an array of class and method wich will be called with call_user_func_array
            'value' => array('MyClass', 'myMethod'),
            'htmlOptions' => array('width' => '40px')
        ),
        array(
            'name' => 'username',
        ),
        'password',
        array(
            'header' => 'Update',
            'class' => 'CButtonColumn',
            'template' => '{update}',
            
            'buttons' => array
                (
                'update' => array(
                                        'click'=>'function(){alert("Going down!");return false;}',
                                ),
                'email' => array
                    (
                    'label' => 'Send e-mail',
//                    'imageUrl' => Yii::app()->request->baseUrl . '/images/email.png',
                    'click' => "function(){
                                    updateClassroom(this); $('#dialogClassroom').dialog('open');
                                    return false;
                              }
                     ",
                    'url' => 'Yii::app()->controller->createUrl("update",array("id"=>$data->primaryKey))',
                ),
            )
        ),
        array(
            'header' => 'Delete',
            'class' => 'CButtonColumn',
            'template' => '{delete}',
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

<script type="text/javascript">
    // here is the magic
    function addClassroom()
    {
<?php
echo CHtml::ajax(array(
    'url' => array('create'),
    'data' => "js:$(this).serialize()",
    'type' => 'post',
    'dataType' => 'json',
    'success' => "function(data)
            {
                if (data.status == 'failure')
                {
                    $('#dialogClassroom div.divForForm').html(data.div);
                          // Here is the trick: on submit-> once again this function!
                    $('#dialogClassroom div.divForForm form').submit(addClassroom);
                }
                else
                {
                    $('#dialogClassroom div.divForForm').html(data.div);
                    $.fn.yiiGridView.update('admin-grid');
                    setTimeout(\"$('#dialogClassroom').dialog('close') \",3000);
                }
 
            } ",
))
?>;
                    return false; 
 
                }
    function updateClassroom(control)
    {

        $.ajax({
            url: $(control).attr('href'),
            type: 'post',
            dataType: 'json',
            data: $(this).serialize(),
            success: function(data){
                if (data.status == 'failure')
                {
                    $('#dialogClassroom div.divForForm').html(data.div);
                    // Here is the trick: on submit-> once again this function!
                    $('#dialogClassroom div.divForForm form').submit(addClassroom);
                }
                else
                {
                    $('#dialogClassroom div.divForForm').html(data.div);
                    $.fn.yiiGridView.update('admin-grid');
                    //setTimeout(\"$('#dialogClassroom').dialog('close') \",3000);
                }
            }
        });
                    return false; 
                }
 
</script>