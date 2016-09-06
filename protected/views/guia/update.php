<?php
/* @var $this GuiaController */
/* @var $model Guia */

$this->breadcrumbs=array(
	'Guias'=>array('index'),
	$model->COD_GUIA=>array('view','id'=>$model->COD_GUIA),
	'Update',
);
?>

<?php $this->renderPartial('_update', array('model'=>$model)); ?>