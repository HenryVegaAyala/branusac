<?php
/* @var $this PresupuestoController */
/* @var $model Presupuesto */

$this->breadcrumbs = array(
    'Presupuestos' => array('index'),
    'Lista',
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
                        'htmlOptions' => array('style' => 'width: 140px'),
                        'value' => '$data->NUM_PRESU'
                    ),
                    array(
                        'name' => 'COD_CLIE',
                        'header' => 'Cliente',
                        'value' => '$data->cODCLIE->NOMBRE'
                    ),
                    array(
                        'name' => 'FECHA',
                        'header' => 'Fecha',
                        'htmlOptions' => array('style' => 'width: 90px'),
                        'value' => 'Yii::app()->dateFormatter->format("dd/MM/y",strtotime($data->FECHA))'
                    ),
                    array(
                        'name' => 'VIGENCIA',
                        'header' => 'Vigencia',
                        'htmlOptions' => array('style' => 'width: 75px'),
                        'value' => $model->VIGENCIA,
                    ),
                    array(
                        'name' => 'COND_PAGO',
                        'header' => 'Cond. de Pago',
                        'htmlOptions' => array('style' => 'width: 145px'),
                        'value' => function ($data) {

                            $variable = $data->__GET('COND_PAGO');
                            switch ($variable) {
                                case 0:
                                    echo 'Contra Entrega';
                                    break;
                                case 1:
                                    echo 'Contado';
                                    break;
                                case 2:
                                    echo '30 días';
                                    break;
                                case 3:
                                    echo '45 días';
                                    break;
                                case 4:
                                    echo '60 días';
                                    break;
                                case 5:
                                    echo 'Personalizado';
                                    break;
                            }
                        },
                    ),
                    array(
                        'name' => 'ESTADO',
                        'htmlOptions' => array('style' => 'width: 120px'),
                        'header' => 'Estado',
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
                        'htmlOptions' => array('style' => 'width: 130px; text-align: center;'),
                        'template' => '{view} / {update} / {delete} / {Reporte}',
                        'buttons' => array(
                            'Reporte' => array(
                                'icon' => 'file',
                                'label' => 'Generar PDF',
                                'htmlOptions' => array('style' => 'width: 50px'),
                                'options' => array('target' => '_blank'),
                                'url' => 'CHtml::normalizeUrl(array("Reporte", "id"=>$data->COD_PRESU))',
                            ),
                        ),
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