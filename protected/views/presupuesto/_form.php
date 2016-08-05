<?php
/* @var $this PresupuestoController */
/* @var $model Presupuesto */
/* @var $form CActiveForm */
?>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Registrar Nuevo Presupuesto</h3>
        </div>

        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'presupuesto-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
        )); ?>

        <br>

        <div class="container">
            <p class="note">Los aspectos con <span class="required letra"> (*) </span> son requeridos.</p>
        </div>

        <?php echo $form->errorSummary($model); ?>

        <div class="container-fluid">

            <div class="fieldset">
                <div class="form-group">
                    <div class="col-sm-3">
                        <?php echo $form->labelEx($model, 'COD_PRESU'); ?>
                        <?php echo $form->textField($model, 'COD_PRESU', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'COD_PRESU'); ?>
                    </div>

                    <div class="col-sm-3">
                        <?php echo $form->labelEx($model, 'NUM_PRESU'); ?>
                        <?php echo $form->textField($model, 'NUM_PRESU', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'NUM_PRESU'); ?>
                    </div>

                    <div class="col-sm-3">
                        <?php echo $form->labelEx($model, 'COD_CLIE'); ?>
                        <?php echo $form->textField($model, 'COD_CLIE', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'COD_CLIE'); ?>
                    </div>

                    <div class="col-sm-3">
                        <?php echo $form->labelEx($model, 'MONEDA'); ?>
                        <?php echo $form->textField($model, 'MONEDA', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'MONEDA'); ?>
                    </div>
                </div>
            </div>

            <div class="fieldset">
                <div class="form-group">
                    <div class="col-sm-3">
                        <?php echo $form->labelEx($model, 'FECHA'); ?>
                        <?php echo $form->textField($model, 'FECHA', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'FECHA'); ?>
                    </div>

                    <div class="col-sm-3">
                        <?php echo $form->labelEx($model, 'INICIO'); ?>
                        <?php echo $form->textField($model, 'INICIO', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'INICIO'); ?>
                    </div>

                    <div class="col-sm-3">
                        <?php echo $form->labelEx($model, 'DIRECCION'); ?>
                        <?php echo $form->textField($model, 'DIRECCION', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'DIRECCION'); ?>
                    </div>

                    <div class="col-sm-3">
                        <?php echo $form->labelEx($model, 'VIGENCIA'); ?>
                        <?php echo $form->textField($model, 'VIGENCIA', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'VIGENCIA'); ?>
                    </div>
                </div>
            </div>

            <div class="fieldset">
                <div class="form-group">
                    <div class="col-sm-3">
                        <?php echo $form->labelEx($model, 'COND_PAGO'); ?>
                        <?php echo $form->textField($model, 'COND_PAGO', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'COND_PAGO'); ?>
                    </div>

                    <div class="col-sm-3">
                        <?php echo $form->labelEx($model, 'NRO_DIAS'); ?>
                        <?php echo $form->textField($model, 'NRO_DIAS', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'NRO_DIAS'); ?>
                    </div>

                    <div class="col-sm-3">
                        <?php echo $form->labelEx($model, 'COND_PERSONALIZADO'); ?>
                        <?php echo $form->textField($model, 'COND_PERSONALIZADO', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'COND_PERSONALIZADO'); ?>
                    </div>

                    <div class="col-sm-3">
                        <?php echo $form->labelEx($model, 'ESTADO'); ?>
                        <?php echo $form->textField($model, 'ESTADO', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'ESTADO'); ?>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="panel-footer " style="overflow:hidden;text-align:right;">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <?php
                    $this->widget(
                        'ext.bootstrap.widgets.TbButton', array(
                        'context' => 'success',
                        'label' => 'Registrarse',
                        'size' => 'md',
                        'icon' => 'fa fa-save fa-lg',
                        'buttonType' => 'submit',
                    ));
                    ?>

                </div>
            </div>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div>
<!-- form -->