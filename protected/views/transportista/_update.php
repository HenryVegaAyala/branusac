<?php
/* @var $this TransportistaController */
/* @var $model Transportista */
/* @var $form CActiveForm */
?>

<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Actualizar Datos del Transportista</h3>
        </div>

        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'transportista-form',
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

                    <div class="col-sm-3" style="display:none ">
                        <?php echo $form->labelEx($model, 'COD_TRANSP'); ?>
                        <?php echo $form->textField($model, 'COD_TRANSP', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'COD_TRANSP'); ?>
                    </div>

                    <div class="col-sm-3" style="display: none">
                        <?php echo $form->labelEx($model, 'COD_VEHI'); ?>
                        <?php echo $form->textField($model, 'COD_VEHI', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'COD_VEHI'); ?>
                    </div>

                    <div class="col-sm-6">
                        <?php echo $form->labelEx($model, 'NOMBRE'); ?>
                        <?php echo $form->textField($model, 'NOMBRE', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'NOMBRE'); ?>
                    </div>

                    <div class="col-sm-3 " style="display: none">
                        <?php echo $form->labelEx($model, 'APELLIDO'); ?>
                        <?php echo $form->textField($model, 'APELLIDO', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'APELLIDO'); ?>
                    </div>
                </div>

                <div class="form-group">

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

                    <div class="col-sm-3">
                        <?php echo $form->labelEx($model, 'NRO_LICENCIA'); ?>
                        <?php echo $form->textField($model, 'NRO_LICENCIA', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'NRO_LICENCIA'); ?>
                    </div>
                </div>

                <div class="form-group">

                    <div class="col-sm-3">
                        <?php echo $form->labelEx($model, 'PLACA'); ?>
                        <?php echo $form->textField($model, 'PLACA', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'PLACA'); ?>
                    </div>

                    <div class="col-sm-3">
                        <?php echo $form->labelEx($model, 'TELEFONO'); ?>
                        <?php echo $form->textField($model, 'TELEFONO', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'TELEFONO'); ?>
                    </div>

                    <div class="col-sm-3">
                        <?php echo $form->labelEx($model, 'MARCA'); ?>
                        <?php echo $form->textField($model, 'MARCA', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'MARCA'); ?>
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


            <?php $this->endWidget(); ?>

        </div>
    </div>
</div>
<!-- form -->