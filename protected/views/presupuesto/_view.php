<?php
/* @var $this PresupuestoController */
/* @var $data Presupuesto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('COD_PRESU')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->COD_PRESU), array('view', 'id'=>$data->COD_PRESU)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NUM_PRESU')); ?>:</b>
	<?php echo CHtml::encode($data->NUM_PRESU); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COD_CLIE')); ?>:</b>
	<?php echo CHtml::encode($data->COD_CLIE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MONEDA')); ?>:</b>
	<?php echo CHtml::encode($data->MONEDA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FECHA')); ?>:</b>
	<?php echo CHtml::encode($data->FECHA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('INICIO')); ?>:</b>
	<?php echo CHtml::encode($data->INICIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DIRECCION')); ?>:</b>
	<?php echo CHtml::encode($data->DIRECCION); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('VIGENCIA')); ?>:</b>
	<?php echo CHtml::encode($data->VIGENCIA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COND_PAGO')); ?>:</b>
	<?php echo CHtml::encode($data->COND_PAGO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NRO_DIAS')); ?>:</b>
	<?php echo CHtml::encode($data->NRO_DIAS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COND_PERSONALIZADO')); ?>:</b>
	<?php echo CHtml::encode($data->COND_PERSONALIZADO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESTADO')); ?>:</b>
	<?php echo CHtml::encode($data->ESTADO); ?>
	<br />

	*/ ?>

</div>