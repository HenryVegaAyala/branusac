<?php
/* @var $this PresupuestoController */
/* @var $model Presupuesto */

$this->breadcrumbs=array(
	'Presupuestos'=>array('index'),
	$model->COD_PRESU=>array('view','id'=>$model->COD_PRESU),
	'Update',
);

?>

<?php $this->renderPartial('_update', array('model'=>$model)); ?>