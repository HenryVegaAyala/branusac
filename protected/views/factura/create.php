<?php
/* @var $this FacturaController */
/* @var $model Factura */

$this->breadcrumbs=array(
	'Facturas'=>array('index'),
	'Nuevo',
);

?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>