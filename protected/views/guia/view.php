<?php
/* @var $this GuiaController */
/* @var $model Guia */

$this->breadcrumbs=array(
	'Guias'=>array('index'),
	$model->COD_GUIA,
);

$this->menu=array(
	array('label'=>'List Guia', 'url'=>array('index')),
	array('label'=>'Create Guia', 'url'=>array('create')),
	array('label'=>'Update Guia', 'url'=>array('update', 'id'=>$model->COD_GUIA)),
	array('label'=>'Delete Guia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->COD_GUIA),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Guia', 'url'=>array('admin')),
);
?>

<h1>View Guia #<?php echo $model->COD_GUIA; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'COD_GUIA',
		'COD_FACT',
		'NUM_GUIA',
		'DOMICILIO',
		'RUC',
		'OC',
		'FECHA',
		'TRANS_CODIGO',
	),
)); ?>
