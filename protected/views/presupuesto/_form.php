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
                        <?php echo $form->labelEx($model, 'INICIO'); ?>
                        <?php echo $form->textField($model, 'INICIO', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'INICIO'); ?>
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
                        <?php echo $form->labelEx($model, 'VIGENCIA'); ?>
                        <?php echo $form->textField($model, 'VIGENCIA', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'VIGENCIA'); ?>
                    </div>

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
                        <?php echo $form->labelEx($model, 'FECHA'); ?>
                        <?php echo $form->textField($model, 'FECHA', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'FECHA'); ?>
                    </div>


                </div>
            </div>

            <div class="fieldset">
                <div class="form-group">

                    <div class="col-sm-3">
                        <?php echo $form->labelEx($model, 'MONEDA'); ?>
                        <?php echo $form->textField($model, 'MONEDA', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'MONEDA'); ?>
                    </div>

                    <div class="col-sm-3">
                        <?php echo $form->labelEx($model, 'COND_PERSONALIZADO'); ?>
                        <?php echo $form->textField($model, 'COND_PERSONALIZADO', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'COND_PERSONALIZADO'); ?>
                    </div>

                    <div class="col-sm-3" style="display: none">
                        <?php echo $form->labelEx($model, 'ESTADO'); ?>
                        <?php echo $form->textField($model, 'ESTADO', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'ESTADO'); ?>
                    </div>

                    <div class="col-sm-3" style="display: none">
                        <?php echo $form->labelEx($model, 'COD_PRESU'); ?>
                        <?php echo $form->textField($model, 'COD_PRESU', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'COD_PRESU'); ?>
                    </div>

                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="panel-footer" style="overflow:hidden;text-align:right;margin-top: 2%"></div>
        </div>

        <div class="container-fluid">
            <?php
            include __DIR__ . '/../Recurso/Grilla.php';
            ?>
        </div>

        <div class="container-fluid">
            <table align="right">
                <tbody>
                <tr>
                    <td class="col-sm-4">
                        <?php echo $form->labelEx($model, 'TOTAL'); ?>
                    </td>
                    <td>
                        <?php
                        echo $form->textField($model, 'TOTAL', array(
                           // 'value' => $model->Total(),
                            'class' => 'form-control',
                            'style' => 'background-color: transparent;',
                            'readonly' => 'readonly'
                        ))
                        ?>
                        <?php echo $form->error($model, 'TOTAL'); ?>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

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
                    <?php
                    $this->widget(
                        'ext.bootstrap.widgets.TbButton', array(
                        'context' => 'default',
                        'label' => 'Regresar',
                        'size' => 'default',
                        'buttonType' => 'link',
                        'url' => array('index')
                    ));
                    ?>

                </div>
            </div>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div>
<!-- form -->