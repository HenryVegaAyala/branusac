<?php
/* @var $this FacturaController */
/* @var $data Factura */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('COD_FACT')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->COD_FACT), array('view', 'id'=>$data->COD_FACT)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COD_PRESU')); ?>:</b>
	<?php echo CHtml::encode($data->COD_PRESU); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NUM_FACT')); ?>:</b>
	<?php echo CHtml::encode($data->NUM_FACT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MONEDA')); ?>:</b>
	<?php echo CHtml::encode($data->MONEDA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FECHA')); ?>:</b>
	<?php echo CHtml::encode($data->FECHA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CLIENTE')); ?>:</b>
	<?php echo CHtml::encode($data->CLIENTE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RUC')); ?>:</b>
	<?php echo CHtml::encode($data->RUC); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('OC')); ?>:</b>
	<?php echo CHtml::encode($data->OC); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('TOT_MONT_ORDE')); ?>:</b>
	<?php echo CHtml::encode($data->TOT_MONT_ORDE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TOT_MONT_IGV')); ?>:</b>
	<?php echo CHtml::encode($data->TOT_MONT_IGV); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TOT_FACT')); ?>:</b>
	<?php echo CHtml::encode($data->TOT_FACT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FECHA_CANC')); ?>:</b>
	<?php echo CHtml::encode($data->FECHA_CANC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESTADO')); ?>:</b>
	<?php echo CHtml::encode($data->ESTADO); ?>
	<br />

	*/ ?>

</div>