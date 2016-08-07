<?php
/* @var $this PresupuestoController */
/* @var $model Presupuesto */

$this->breadcrumbs = array(
    'Presupuestos' => array('index'),
    'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#presupuesto-grid').yiiGridView('update', {
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
                'id' => 'presupuesto-grid',
                'dataProvider' => $model->search(),
                'columns' => array(
                    'COD_PRESU',
                    'NUM_PRESU',
                    'COD_CLIE',
                    'MONEDA',
                    'FECHA',
                    'INICIO',
                    /*
                    'DIRECCION',
                    'VIGENCIA',
                    'COND_PAGO',
                    'NRO_DIAS',
                    'COND_PERSONALIZADO',
                    'ESTADO',
                    */
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