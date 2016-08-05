<?php
/* @var $this ClienteController */
/* @var $model Cliente */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cliente-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'COD_CLIE'); ?>
		<?php echo $form->textField($model,'COD_CLIE'); ?>
		<?php echo $form->error($model,'COD_CLIE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NOMBRE'); ?>
		<?php echo $form->textField($model,'NOMBRE',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'NOMBRE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'APELLIDO'); ?>
		<?php echo $form->textField($model,'APELLIDO',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'APELLIDO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RUC'); ?>
		<?php echo $form->textField($model,'RUC',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'RUC'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DIRECCION'); ?>
		<?php echo $form->textField($model,'DIRECCION',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'DIRECCION'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TELEFONO'); ?>
		<?php echo $form->textField($model,'TELEFONO',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'TELEFONO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FAX'); ?>
		<?php echo $form->textField($model,'FAX',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'FAX'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CORREO_E'); ?>
		<?php echo $form->textField($model,'CORREO_E',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'CORREO_E'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ESTADO'); ?>
		<?php echo $form->textField($model,'ESTADO',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'ESTADO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->