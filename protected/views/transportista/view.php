<?php
/* @var $this TransportistaController */
/* @var $model Transportista */

$this->breadcrumbs = array(
    'Datos del Transportista' => array('index'),
);
?>

<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <center>
                <h3 class="panel-title">Vista Detallada del Cliente</h3>
            </center>
        </div>

        <?php $this->widget('ext.bootstrap.widgets.TbDetailView', array(
            'data' => $model,
            'type' => 'bordered condensed striped raw',
            'attributes' => array(
                'NOMBRE',
                'DIRECCION',
                'RUC',
                'DNI',
                'NRO_LICENCIA',
                'TELEFONO',
                'PLACA',
                'MARCA',
            ),
        )); ?>
        <div class="panel-footer " style="overflow:hidden;text-align:right;">
            <div class="form-group">
                <div class="col-sm-12">
                    <?php
                    $this->widget(
                        'ext.bootstrap.widgets.TbButton', array(
                        'context' => 'success',
                        'label' => 'Regresar',
                        'size' => 'small',
                        'buttonType' => 'link',
                        'icon' => 'chevron-left',
                        'url' => array('index')
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>