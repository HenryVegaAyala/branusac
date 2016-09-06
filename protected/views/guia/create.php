<?php
/* @var $this GuiaController */
/* @var $model Guia */

$this->breadcrumbs=array(
	'Guias'=>array('index'),
	'Create',
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>