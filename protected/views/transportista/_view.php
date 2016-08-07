<?php
/* @var $this TransportistaController */
/* @var $data Transportista */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('COD_TRANSP')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->COD_TRANSP), array('view', 'id'=>$data->COD_TRANSP)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COD_VEHI')); ?>:</b>
	<?php echo CHtml::encode($data->COD_VEHI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('APELLIDO')); ?>:</b>
	<?php echo CHtml::encode($data->APELLIDO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DIRECCION')); ?>:</b>
	<?php echo CHtml::encode($data->DIRECCION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RUC')); ?>:</b>
	<?php echo CHtml::encode($data->RUC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DNI')); ?>:</b>
	<?php echo CHtml::encode($data->DNI); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('NRO_LICENCIA')); ?>:</b>
	<?php echo CHtml::encode($data->NRO_LICENCIA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TELEFONO')); ?>:</b>
	<?php echo CHtml::encode($data->TELEFONO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PLACA')); ?>:</b>
	<?php echo CHtml::encode($data->PLACA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MARCA')); ?>:</b>
	<?php echo CHtml::encode($data->MARCA); ?>
	<br />

	*/ ?>

</div>