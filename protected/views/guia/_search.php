<?php
/* @var $this GuiaController */
/* @var $model Guia */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'COD_GUIA'); ?>
		<?php echo $form->textField($model,'COD_GUIA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COD_FACT'); ?>
		<?php echo $form->textField($model,'COD_FACT'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NUM_GUIA'); ?>
		<?php echo $form->textField($model,'NUM_GUIA',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DOMICILIO'); ?>
		<?php echo $form->textField($model,'DOMICILIO',array('size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RUC'); ?>
		<?php echo $form->textField($model,'RUC',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'OC'); ?>
		<?php echo $form->textField($model,'OC',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FECHA'); ?>
		<?php echo $form->textField($model,'FECHA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TRANS_CODIGO'); ?>
		<?php echo $form->textField($model,'TRANS_CODIGO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->