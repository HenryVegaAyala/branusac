<?php
/* @var $this ClienteController */
/* @var $model Cliente */
/* @var $form CActiveForm */
?>

<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Actualizar Datos del Cliente</h3>
        </div>

        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'cliente-form',
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

                    <div class="col-sm-3" style="display: none">
                        <?php echo $form->labelEx($model, 'COD_CLIE'); ?>
                        <?php echo $form->textField($model, 'COD_CLIE', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'COD_CLIE'); ?>
                    </div>

                    <div class="col-sm-6">
                        <?php echo $form->labelEx($model, 'NOMBRE'); ?>
                        <?php echo $form->textField($model, 'NOMBRE', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'NOMBRE'); ?>
                    </div>

                    <div class="col-sm-3" style="display: none">
                        <?php echo $form->labelEx($model, 'APELLIDO'); ?>
                        <?php echo $form->textField($model, 'APELLIDO', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'APELLIDO'); ?>
                    </div>

                    <div class="col-sm-3">
                        <?php echo $form->labelEx($model, 'DNI'); ?>
                        <?php echo $form->textField($model, 'DNI', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'DNI'); ?>
                    </div>

                    <div class="col-sm-3">
                        <?php echo $form->labelEx($model, 'RUC'); ?>
                        <?php echo $form->textField($model, 'RUC', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'RUC'); ?>
                    </div>

                    <div class="col-sm-6">
                        <?php echo $form->labelEx($model, 'DIRECCION'); ?>
                        <?php echo $form->textField($model, 'DIRECCION', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'DIRECCION'); ?>
                    </div>

                </div>
            </div>

            <div class="fieldset">
                <div class="form-group">

                    <div class="col-sm-3">
                        <?php echo $form->labelEx($model, 'TELEFONO'); ?>
                        <?php echo $form->textField($model, 'TELEFONO', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'TELEFONO'); ?>
                    </div>

                    <div class="col-sm-3">
                        <?php echo $form->labelEx($model, 'FAX'); ?>
                        <?php echo $form->textField($model, 'FAX', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'FAX'); ?>
                    </div>

                    <div class="col-sm-6">
                        <?php echo $form->labelEx($model, 'CORREO_E'); ?>
                        <?php echo $form->textField($model, 'CORREO_E', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'CORREO_E'); ?>
                    </div>

                </div>
            </div>

            <div class="fieldset">
                <div class="form-group">
                    <div class="col-sm-3" style="display: none">
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
                <div class="col-sm-12">
                    <?php
                    $this->widget(
                        'ext.bootstrap.widgets.TbButton', array(
                        'context' => 'success',
                        'label' => 'Guardar',
                        'size' => 'md',
                        'icon' => 'fa fa-save fa-lg',
                        'buttonType' => 'submit',
                    ));
                    ?>
                    <?php
                    $this->widget(
                        'ext.bootstrap.widgets.TbButton', array(
                        'context' => 'default',
                        'label' => 'Cancelar',
                        'size' => 'default',
                        'buttonType' => 'link',
                        'icon' => 'fa fa-times fa-lg',
                        'url' => array('index')
                    ));
                    ?>

                </div>
            </div>
        </div>


        <?php $this->endWidget(); ?>

    </div>
</div>
<!-- form -->