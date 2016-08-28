<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs = array(
    'Cliente' => array('index'),
    'Lista',
);

$this->menu = array(
    array('label' => 'List Cliente', 'url' => array('index')),
    array('label' => 'Create Cliente', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cliente-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Lista de Clientes</h3>
        </div>

        <div class="container-fluid" style="margin-top: 2%">
            <i class="fa fa-check fa-lg" style="color: #5CB85C"></i>
            <?php echo CHtml::link('Búsqueda Avanzada', '#', array('class' => 'search-button')); ?>
        </div>

        <div class="search-form" style="display:none">
            <?php $this->renderPartial('_search', array(
                'model' => $model,
            )); ?>
        </div>
        <!-- search-form -->

        <div class="table-responsive">
            <?php $this->widget('ext.bootstrap.widgets.TbGridView', array(
                'type' => 'bordered condensed striped',
                'id' => 'cliente-grid',
                'dataProvider' => $model->search(),
                'columns' => array(
                    array(
                        'name' => 'NOMBRE',
                        'header' => 'Nombre',
                        'htmlOptions' => array('style' => 'width: 300px'),
                        'value' => '$data->NOMBRE',
                    ),

                    array(
                        'name' => 'DNI',
                        'header' => 'DNI',
                        'htmlOptions' => array('style' => 'width: 110px'),
                        'value' => '$data->DNI',
                    ),

                    array(
                        'name' => 'RUC',
                        'header' => 'RUC',
                        'htmlOptions' => array('style' => 'width: 120px'),
                        'value' => '$data->RUC',
                    ),

                    array(
                        'name' => 'TELEFONO',
                        'header' => '#. Teléfono 1',
                        'htmlOptions' => array('style' => 'width: 120px'),
                        'value' => '$data->TELEFONO',
                    ),

                    array(
                        'name' => 'TELEFONO2',
                        'header' => '#. Teléfono 2',
                        'htmlOptions' => array('style' => 'width: 120px'),
                        'value' => '$data->TELEFONO2',
                    ),

                    'CORREO_E',
                    array(
                        'header' => 'Opciones',
                        'class' => 'ext.bootstrap.widgets.TbButtonColumn',
                        'htmlOptions' => array('style' => 'width: 60px; text-align: center;'),
                        'template' => '{view} / {update} / {delete} ',
                    ),
                ),
            )); ?>
        </div>

        <div class="panel-footer " style="overflow:hidden;text-align:right;">
            <div class="form-group">
                <div class="col-sm-12">

                    <?php
                    $this->widget(
                        'ext.bootstrap.widgets.TbButton', array(
                        'context' => 'default',
                        'label' => 'Registrar',
                        'size' => 'default',
                        'icon' => 'fa fa-plus fa-lg',
                        'buttonType' => 'link',
                        'url' => array('/cliente/create')
                    ));
                    ?>

                    <?php
                    $this->widget(
                        'ext.bootstrap.widgets.TbButton', array(
                        'context' => 'default',
                        'label' => 'Refrescar Lista',
                        'size' => 'default',
                        'icon' => 'refresh',
                        'buttonType' => 'link',
                        'url' => array('/cliente/index')
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>