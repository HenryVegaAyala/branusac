<?php
/* @var $this PresupuestoController */
/* @var $model Presupuesto */

$this->breadcrumbs = array(
    'Presupuestos' => array('index'),
    'Nuevo',
);
?>

<?php $this->renderPartial('_form', array('model' => $model)); ?>