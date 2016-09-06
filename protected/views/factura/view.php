<?php
/* @var $this FacturaController */
/* @var $model Factura */

$this->breadcrumbs = array(
    'Facturas' => array('index'),
    'Vista Detalle'
);
?>

<?php

$Moneda = "";
switch ($model->MONEDA) {
    case '0':
        $Moneda = 'PE – Nuevo Soles';
        break;
    case '1':
        $Moneda = 'US – Dólares Americanos';
        break;
    default :
        $Moneda = "";
}

$CondPago = "";
switch ($model->COND_PAGO) {
    case '0':
        $CondPago = 'Contra Entrega';
        break;
    case '1':
        $CondPago = 'Contado';
        break;
    case '2':
        $CondPago = '30 días';
        break;
    case '3':
        $CondPago = '45 días';
        break;
    case '4':
        $CondPago = '60 días';
        break;
    case '5':
        $CondPago = 'Personalizado';
        break;
    default :
        $CondPago = "";
}

$estado = "";
switch ($model->ESTADO) {
    case '1':
        $estado = 'En Proceso';
        break;
    case '2':
        $estado = 'Despachadado/Atendido';
        break;
    case '9':
        $estado = 'Anulado';
        break;
    case '0':
        $estado = 'Creado';
        break;
    default :
        $estado = "";
}

$FECHA = Yii::app()->dateFormatter->format("dd MMMM y", strtotime($model->FECHA));

$FECHACANC = Yii::app()->dateFormatter->format("dd MMMM y", strtotime($model->FECHA_CANC));

?>

<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <center>
                <h3 class="panel-title">Vista Detallada del N° de la Factura:
                    <big><strong><?php echo $model->NUM_FACT; ?></strong></big></h3>
            </center>
        </div>

        <?php $this->widget('ext.bootstrap.widgets.TbDetailView', array(
            'data' => $model,
            'type' => 'bordered condensed striped raw',
            'attributes' => array(
                'COD_PRESU',
                array(
                    'name' => 'CLIENTE',
                    'value' => $model->Cliente($model->CLIENTE)),
                'RUC',
                array(
                    'name' => 'FECHA',
                    'value' => $FECHA),
                array(
                    'name' => 'MONEDA',
                    'value' => $Moneda),
                'OC',
                array(
                    'name' => 'COND_PAGO',
                    'value' => $CondPago),
                'NRO_DIAS',
                'COND_PERSONALIZADO',
                array(
                    'name' => 'FECHA_CANC',
                    'value' => function ($data) {

                        $variable = $data->__GET('FECHA_CANC');

                        if ($variable != "0000-00-00") {
                            return Yii::app()->dateFormatter->format("dd MMMM y", strtotime($variable));
                        }else{
                            return " ";
                        }
                    },
                ),
                array(
                    'name' => 'ESTADO',
                    'value' => $estado),
                'TOT_MONT_ORDE',
                'TOT_MONT_IGV',
                'TOT_FACT',
            ),
        )); ?>
    </div>

    <?php
    echo '<table class="table table-hover table-bordered table-condensed table-striped">';
    echo '<tr>';
    echo '<th style="text-align: center;" >Descripción</th>';
    echo '<th style="text-align: center;" class="col-md-1">Precio</th>';
    echo '<th style="text-align: center;" class="col-md-1">Cantidad</th>';
    echo '<th style="text-align: center;" class="col-md-1">Total</th>';
    echo '</tr>';
    $sqlStatement = "SELECT x.DESCRIPCION,x.PRECIO,x.CANTIDAD,x.TOTAL FROM detalle_factura x
                     where COD_FACT =  '" . $model->COD_FACT . "';";
    $connection = Yii::app()->db;
    $command = $connection->createCommand($sqlStatement);
    $reader = $command->query();
    while ($row1 = $reader->read()) {
        echo '<tr>';
        echo '<td>' . $row1['DESCRIPCION'] . '</td>';
        echo '<td>' . $row1['PRECIO'] . '</td>';
        echo '<td>' . $row1['CANTIDAD'] . '</td>';
        echo '<td>' . $row1['TOTAL'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
    ?>

</div>
<br>

<div class="container-fluid" align="right">
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
