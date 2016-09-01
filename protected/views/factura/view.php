<?php
/* @var $this FacturaController */
/* @var $model Factura */

$this->breadcrumbs=array(
	'Facturas'=>array('index'),
	$model->COD_FACT,
);

$this->menu=array(
	array('label'=>'List Factura', 'url'=>array('index')),
	array('label'=>'Create Factura', 'url'=>array('create')),
	array('label'=>'Update Factura', 'url'=>array('update', 'id'=>$model->COD_FACT)),
	array('label'=>'Delete Factura', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->COD_FACT),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Factura', 'url'=>array('admin')),
);
?>

<h1>View Factura #<?php echo $model->COD_FACT; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'COD_FACT',
		'COD_PRESU',
		'NUM_FACT',
		'MONEDA',
		'FECHA',
		'CLIENTE',
		'RUC',
		'OC',
		'COND_PAGO',
		'NRO_DIAS',
		'COND_PERSONALIZADO',
		'TOT_MONT_ORDE',
		'TOT_MONT_IGV',
		'TOT_FACT',
		'FECHA_CANC',
		'ESTADO',
	),
)); ?>
