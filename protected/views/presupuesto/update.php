<?php
/* @var $this PresupuestoController */
/* @var $model Presupuesto */

$this->breadcrumbs=array(
	'Presupuestos'=>array('index'),
	'Actualizar',
);

?>

<?php $this->renderPartial('_update', array('model'=>$model)); ?>