<?php
/* @var $this FacturaController */
/* @var $model Factura */

$this->breadcrumbs = array(
    'Facturas' => array('index'),
    'Lista',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#factura-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Lista de Facturas</h3>
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
                'id' => 'factura-grid',
                'dataProvider' => $model->search(),
                'columns' => array(
                    array(
                        'id' => 'COD_FACT',
                        'class' => 'CCheckBoxColumn',
                        'selectableRows' => '50',
                    ),
                    array(
                        'name' => 'FECHA',
                        'header' => 'Fecha Creada',
                        'htmlOptions' => array('style' => 'width: 30px'),
                        'value' => 'Yii::app()->dateFormatter->format("dd/MM/y",strtotime($data->FECHA))'
                    ),
                    array(
                        'name' => 'NUM_FACT',
                        'header' => 'N° Fact.',
                        'htmlOptions' => array('style' => 'width: 50px'),
                        'value' => '$data->NUM_FACT'
                    ),
                    array(
                        'name' => 'CLIENTE',
                        'header' => 'Cliente',
                        'htmlOptions' => array('style' => 'width: 295px'),
                        'value' => function ($data) {

                            $model = new Factura();

                            $variable = $data->__GET('CLIENTE');

                            if ($variable == null) {
                                echo 'No Asociado';
                            } else {
                                echo $model->Cliente($variable);
                            }

                        },
                    ),

                    array(
                        'name' => 'OC',
                        'header' => 'Ord. Compra',
                        'htmlOptions' => array('style' => 'width: 75px'),
                        'value' => '$data->OC'
                    ),
                    array(
                        'name' => 'COD_PRESU',
                        'header' => 'N° Presupuesto',
                        'htmlOptions' => array('style' => 'width: 10px'),
                        'value' => function ($data) {

                            $model = new Factura();

                            $variable = $data->__GET('COD_PRESU');

                            if ($variable == null) {
                                echo 'No Asociado';
                            } else {
                                echo $model->ValorNFact($variable);
                            }

                        },
                    ),
                    array(
                        'name' => 'ESTADO',
                        'header' => 'Estado',
                        'htmlOptions' => array('style' => 'width: 90px'),
                        'value' => function ($data) {

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
                        'htmlOptions' => array('style' => 'width: 90px; text-align: center;'),
                        'template' => '{view} / {update} / {delete}',
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
                        'url' => array('/factura/create')
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
                        'url' => array('/factura/index')
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>