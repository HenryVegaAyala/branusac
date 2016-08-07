<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs=array(
	'Cliente'=>array('index'),
	'Actualización de datos',
);
?>

<?php $this->renderPartial('_update', array('model'=>$model)); ?>