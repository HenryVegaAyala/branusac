<?php
/* @var $this PresupuestoController */
/* @var $model Presupuesto */

$this->breadcrumbs=array(
	'Presupuestos'=>array('index'),
	$model->COD_PRESU,
);

$this->menu=array(
	array('label'=>'List Presupuesto', 'url'=>array('index')),
	array('label'=>'Create Presupuesto', 'url'=>array('create')),
	array('label'=>'Update Presupuesto', 'url'=>array('update', 'id'=>$model->COD_PRESU)),
	array('label'=>'Delete Presupuesto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->COD_PRESU),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Presupuesto', 'url'=>array('admin')),
);
?>

<h1>View Presupuesto #<?php echo $model->COD_PRESU; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'COD_PRESU',
		'NUM_PRESU',
		'COD_CLIE',
		'MONEDA',
		'FECHA',
		'INICIO',
		'DIRECCION',
		'VIGENCIA',
		'COND_PAGO',
		'NRO_DIAS',
		'COND_PERSONALIZADO',
		'ESTADO',
	),
)); ?>
