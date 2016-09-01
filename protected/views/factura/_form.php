<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<?php
/* @var $this FacturaController */
/* @var $model Factura */
/* @var $form CActiveForm */
?>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Registrar Nueva Factura</h3>
        </div>

        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'factura-form',
            'enableAjaxValidation' => false,
        )); ?>

        <br>

        <div class="container">
            <p class="note">Los aspectos con <span class="required letra"> (*) </span> son requeridos.</p>
            <?php echo $form->errorSummary($model); ?>
        </div>

        <script>
            $.datepicker.regional['es'] = {
                closeText: 'Cerrar',
                prevText: '<Ant',
                nextText: 'Sig>',
                currentText: 'Hoy',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
                dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                weekHeader: 'Sm',
                dateFormat: 'dd/mm/yy',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
            };
            $.datepicker.setDefaults($.datepicker.regional['es']);
        </script>

        <div class="container-fluid">

            <div class="fieldset">
                <div class="form-group">

                    <div class="col-sm-6 col-md-3">
                        <?php echo $form->labelEx($model, 'NUM_FACT'); ?>
                        <?php echo $form->textField($model, 'NUM_FACT', array('class' => 'form-control')); ?>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <?php echo $form->labelEx($model, 'COD_GUIA'); ?>
                        <?php echo $form->textField($model, 'COD_GUIA', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'COD_GUIA'); ?>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <?php echo $form->labelEx($model, 'CLIENTE'); ?>
                        <?php echo $form->textField($model, 'CLIENTE', array('class' => 'form-control')); ?>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <?php echo $form->labelEx($model, 'RUC'); ?>
                        <?php echo $form->textField($model, 'RUC', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'RUC'); ?>
                    </div>

                </div>
            </div>

            <div class="fieldset">
                <div class="form-group">

                    <div class="col-sm-6 col-md-3">
                        <?php echo $form->labelEx($model, 'OC'); ?>
                        <?php echo $form->textField($model, 'OC', array('class' => 'form-control')); ?>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <?php echo $form->labelEx($model, 'MONEDA'); ?>
                        <?php echo $form->textField($model, 'MONEDA', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'MONEDA'); ?>
                    </div>

                </div>
            </div>

            <div class="fieldset">
                <div class="form-group">
                    <div class="col-sm-6 col-md-3">
                        <?php echo $form->labelEx($model, 'COND_PAGO'); ?>
                        <?php echo $form->textField($model, 'COND_PAGO', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'COND_PAGO'); ?>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <?php echo $form->labelEx($model, 'NRO_DIAS'); ?>
                        <?php echo $form->textField($model, 'NRO_DIAS', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'NRO_DIAS'); ?>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <?php echo $form->labelEx($model, 'COND_PERSONALIZADO'); ?>
                        <?php echo $form->textField($model, 'COND_PERSONALIZADO', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'COND_PERSONALIZADO'); ?>
                    </div>

                </div>
            </div>

            <div class="fieldset">
                <div class="form-group">


                    <div class="col-sm-6 col-md-3">
                        <?php echo $form->labelEx($model, 'FECHA_CANC'); ?>
                        <input type="text" id="Factura_FECHA_CANC" name="Factura[FECHA_CANC]"
                               class="form-control" placeholder="Ingrese la Fecha Ingreso"
                               value=" <?php $model->FECHA ?>" required="true"/>
                        <script>
                            $(function () {
                                $("#Factura_FECHA_CANC").datepicker();
                            });

                        </script>
                        <?php echo $form->error($model, 'FECHA_CANC'); ?>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <?php echo $form->labelEx($model, 'ESTADO'); ?>
                        <?php echo $form->textField($model, 'ESTADO', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'ESTADO'); ?>
                    </div>

                </div>
            </div>

        </div>

        <div class="panel-footer" style="margin-top: 2%"></div>

        <div class="container-fluid">
            <?php
            include __DIR__ . '/../Recurso/Grilla3.php';
            ?>
        </div>

        <div class="container-fluid">
            <table align="right">
                <tbody>
                <tr>
                    <td class="col-sm-4">
                        <?php echo $form->labelEx($model, 'TOT_MONT_ORDE'); ?>
                    </td>
                    <td>
                        <?php
                        echo $form->textField($model, 'TOT_MONT_ORDE', array(
                            //'value' => $model->Total(),
                            'class' => 'form-control',
                            'style' => 'background-color: transparent;',
                            'readonly' => 'readonly'
                        ))
                        ?>
                        <?php echo $form->error($model, 'TOT_MONT_ORDE'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="col-sm-4">
                        <?php echo $form->labelEx($model, 'TOT_MONT_IGV'); ?>
                    </td>
                    <td>
                        <?php
                        echo $form->textField($model, 'TOT_MONT_IGV', array(
                            //'value' => $model->Total(),
                            'class' => 'form-control',
                            'style' => 'background-color: transparent;',
                            'readonly' => 'readonly'
                        ))
                        ?>
                        <?php echo $form->error($model, 'TOT_MONT_IGV'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="col-sm-4">
                        <?php echo $form->labelEx($model, 'TOT_FACT'); ?>
                    </td>
                    <td>
                        <?php
                        echo $form->textField($model, 'TOT_FACT', array(
                            //'value' => $model->Total(),
                            'class' => 'form-control',
                            'style' => 'background-color: transparent;',
                            'readonly' => 'readonly'
                        ))
                        ?>
                        <?php echo $form->error($model, 'TOT_FACT'); ?>
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
                        'context' => 'danger',
                        'label' => 'Cancelar',
                        'size' => 'default',
                        'buttonType' => 'link',
                        'icon' => 'fa fa-close fa-lg',
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