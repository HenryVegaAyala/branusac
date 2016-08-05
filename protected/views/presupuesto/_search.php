<?php
/* @var $this PresupuestoController */
/* @var $model Presupuesto */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'COD_PRESU'); ?>
		<?php echo $form->textField($model,'COD_PRESU'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NUM_PRESU'); ?>
		<?php echo $form->textField($model,'NUM_PRESU',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COD_CLIE'); ?>
		<?php echo $form->textField($model,'COD_CLIE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MONEDA'); ?>
		<?php echo $form->textField($model,'MONEDA',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FECHA'); ?>
		<?php echo $form->textField($model,'FECHA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'INICIO'); ?>
		<?php echo $form->textField($model,'INICIO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DIRECCION'); ?>
		<?php echo $form->textField($model,'DIRECCION',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VIGENCIA'); ?>
		<?php echo $form->textField($model,'VIGENCIA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COND_PAGO'); ?>
		<?php echo $form->textField($model,'COND_PAGO',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NRO_DIAS'); ?>
		<?php echo $form->textField($model,'NRO_DIAS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COND_PERSONALIZADO'); ?>
		<?php echo $form->textField($model,'COND_PERSONALIZADO',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ESTADO'); ?>
		<?php echo $form->textField($model,'ESTADO',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->