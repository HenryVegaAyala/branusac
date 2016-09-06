<?php
/* @var $this GuiaController */
/* @var $model Guia */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'guia-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'COD_GUIA'); ?>
		<?php echo $form->textField($model,'COD_GUIA'); ?>
		<?php echo $form->error($model,'COD_GUIA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'COD_FACT'); ?>
		<?php echo $form->textField($model,'COD_FACT'); ?>
		<?php echo $form->error($model,'COD_FACT'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NUM_GUIA'); ?>
		<?php echo $form->textField($model,'NUM_GUIA',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'NUM_GUIA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DOMICILIO'); ?>
		<?php echo $form->textField($model,'DOMICILIO',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'DOMICILIO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RUC'); ?>
		<?php echo $form->textField($model,'RUC',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'RUC'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'OC'); ?>
		<?php echo $form->textField($model,'OC',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'OC'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FECHA'); ?>
		<?php echo $form->textField($model,'FECHA'); ?>
		<?php echo $form->error($model,'FECHA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TRANS_CODIGO'); ?>
		<?php echo $form->textField($model,'TRANS_CODIGO'); ?>
		<?php echo $form->error($model,'TRANS_CODIGO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->