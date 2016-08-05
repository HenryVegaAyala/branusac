<?php
/* @var $this PresupuestoController */
/* @var $model Presupuesto */

$this->breadcrumbs=array(
	'Presupuestos'=>array('index'),
	$model->COD_PRESU=>array('view','id'=>$model->COD_PRESU),
	'Update',
);

$this->menu=array(
	array('label'=>'List Presupuesto', 'url'=>array('index')),
	array('label'=>'Create Presupuesto', 'url'=>array('create')),
	array('label'=>'View Presupuesto', 'url'=>array('view', 'id'=>$model->COD_PRESU)),
	array('label'=>'Manage Presupuesto', 'url'=>array('admin')),
);
?>

<h1>Update Presupuesto <?php echo $model->COD_PRESU; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>