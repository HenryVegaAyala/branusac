<?php
/* @var $this PresupuestoController */
/* @var $model Presupuesto */

$this->breadcrumbs=array(
	'Presupuestos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Presupuesto', 'url'=>array('index')),
	array('label'=>'Create Presupuesto', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#presupuesto-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Presupuestos</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
		'model'=>$model,
	)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'presupuesto-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'COD_PRESU',
		'NUM_PRESU',
		'COD_CLIE',
		'MONEDA',
		'FECHA',
		'INICIO',
		/*
		'DIRECCION',
		'VIGENCIA',
		'COND_PAGO',
		'NRO_DIAS',
		'COND_PERSONALIZADO',
		'ESTADO',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
