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
                    array(
                        'id' => 'COD_PRESU',
                        'class' => 'CCheckBoxColumn',
                        'selectableRows' => '50',
                    ),
                    array(
                        'name' => 'NUM_PRESU',
                        'header' => 'N° de Presupuesto',
                        'value' => '$data->NUM_PRESU'
                    ),
                    array(
                        'name' => 'COD_CLIE',
                        'header' => 'Cliente',
                        'value' => '$data->cODCLIE->NOMBRE'
                    ),
                    array(
                        'name' => 'MONEDA',
                        'header' => 'Moneda',
                        'value' => function($data) {

                            $variable = $data->__GET('MONEDA');
                            switch ($variable) {
                                case 0:
                                    echo 'Nuevo Soles';
                                    break;
                                case 1:
                                    echo 'Dólares Americanos';
                                    break;
                            }
                        },
                    ),

                    array(
                        'name' => 'FECHA',
                        'header' => 'Fecha',
                        'value' => 'Yii::app()->dateFormatter->format("dd/MM/y",strtotime($data->FECHA))'
                    ),
                    array(
                        'name' => 'VIGENCIA',
                        'header' => 'Vigencia',
                        'value' => 'Yii::app()->dateFormatter->format("dd/MM/y",strtotime($data->VIGENCIA))'
                    ),
                    'COND_PAGO',
                    array(
                        'name' => 'ESTADO',
                        'header' => 'Estado',
                        'value' => function($data) {

                            $variable = $data->__GET('ESTADO');
                            switch ($variable) {
                                case 1:
                                    echo 'En Proceso';
                                    break;
                                case 2:
                                    echo 'Despacho/Atendido';
                                    break;
                                case 9:
                                    echo 'Anulado';
                                    break;
                                case 0:
                                    echo 'Creado';
                                    break;
                            }
                        },
                    ),

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
                        'url' => array('/Presupuesto/create')
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
                        'url' => array('/Presupuesto/index')
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>