<?php
/* @var $this FacturaController */
/* @var $model Factura */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'post',
    )); ?>

    <div class="fieldset">

        <div class="container-fluid">
            <div class="form-group ">

                <div class="col-sm-4 control-label">
                    <?php echo $form->label($model, 'NUM_FACT'); ?>
                    <?php echo $form->textField($model, 'NUM_FACT', array('class' => 'form-control')); ?>
                </div>

                <div class="col-sm-4 control-label">
                    <?php echo $form->label($model, 'COD_PRESU'); ?>
                    <?php echo $form->textField($model, 'COD_PRESU', array('class' => 'form-control')); ?>
                </div>

                <div class="col-sm-4 control-label">
                    <?php echo $form->label($model, 'FECHA'); ?>
                    <?php echo $form->textField($model, 'FECHA', array('class' => 'form-control')); ?>
                </div>

                <div class="col-sm-4 control-label">
                    <?php echo $form->label($model, 'CLIENTE'); ?>
                    <?php echo $form->textField($model, 'CLIENTE', array('class' => 'form-control')); ?>
                </div>
            </div>

            <div class="form-group ">
                <div class="col-sm-4 control-label">
                    <?php echo $form->label($model, 'RUC'); ?>
                    <?php echo $form->textField($model, 'RUC', array('class' => 'form-control')); ?>
                </div>

                <div class="col-sm-4 control-label">
                    <?php echo $form->label($model, 'OC'); ?>
                    <?php echo $form->textField($model, 'OC', array('class' => 'form-control')); ?>
                </div>

                <div class="col-sm-4 control-label">
                    <?php echo $form->label($model, 'COND_PAGO'); ?>
                    <?php echo $form->textField($model, 'COND_PAGO', array('class' => 'form-control')); ?>
                </div>

                <div class="col-sm-4 control-label">
                    <?php echo $form->label($model, 'FECHA_CANC'); ?>
                    <?php echo $form->textField($model, 'FECHA_CANC', array('class' => 'form-control')); ?>
                </div>
            </div>

            <div class="col-sm-4 control-label">
                <?php echo $form->label($model, 'ESTADO'); ?>
                <?php echo $form->textField($model, 'ESTADO', array('class' => 'form-control')); ?>
            </div>

        </div>

        <br>

        <div class="panel-footer " style="overflow:hidden;text-align:right;">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <?php echo CHtml::submitButton('Buscar', array('class' => 'btn btn-success btn-md')); ?>
                    <?php echo CHtml::resetButton('Limpiar', array('class' => 'btn btn-default btn-md')); ?>
                    <?php echo CHtml::link('Cerrar Búsqueda', '#', array('class' => 'search-button btn btn-default btn-md')); ?>
                </div>
            </div>
        </div>

    </div>

    <?php $this->endWidget(); ?>

</div>
<!-- search-form -->