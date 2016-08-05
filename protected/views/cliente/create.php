<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs = array(
    'Cliente' => array('index'),
    'Nuevo',
);
?>

<?php $this->renderPartial('_form', array('model' => $model)); ?>