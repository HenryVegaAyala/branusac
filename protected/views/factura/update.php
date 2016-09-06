<?php
/* @var $this FacturaController */
/* @var $model Factura */

$this->breadcrumbs = array(
    'Facturas' => array('index'),
    'Actualizar',
);
?>

<?php $this->renderPartial('_update', array('model' => $model)); ?>