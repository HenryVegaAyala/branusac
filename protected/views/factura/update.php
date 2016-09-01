<?php
/* @var $this FacturaController */
/* @var $model Factura */

$this->breadcrumbs=array(
	'Facturas'=>array('index'),
	$model->COD_FACT=>array('view','id'=>$model->COD_FACT),
	'Update',
);

$this->menu=array(
	array('label'=>'List Factura', 'url'=>array('index')),
	array('label'=>'Create Factura', 'url'=>array('create')),
	array('label'=>'View Factura', 'url'=>array('view', 'id'=>$model->COD_FACT)),
	array('label'=>'Manage Factura', 'url'=>array('admin')),
);
?>

<h1>Update Factura <?php echo $model->COD_FACT; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>