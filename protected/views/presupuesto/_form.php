<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<?php
/* @var $this PresupuestoController */
/* @var $model Presupuesto */
/* @var $form CActiveForm */
?>

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

                <div class="col-sm-3" style="display: none">
                    <?php echo $form->labelEx($model, 'INICIO'); ?>
                    <?php echo $form->textField($model, 'INICIO', array('class' => 'form-control  input-sm input-sm')); ?>
                    <?php echo $form->error($model, 'INICIO'); ?>
                </div>

                <div class="col-sm-6 col-md-3">
                    <?php echo $form->labelEx($model, 'NUM_PRESU'); ?>
                    <?php echo $form->textField($model, 'NUM_PRESU', array('class' => 'form-control  input-sm  input-sm', 'value' => $model->NAIPresu(), 'disabled' => 'true')); ?>
                    <?php echo $form->error($model, 'NUM_PRESU'); ?>
                </div>

                <div class="col-sm-6 col-md-3">
                    <?php
                    $htmlOptions = array(
                        'ajax' => array(
                            "url" => $this->createUrl("Ajax"),
                            "type" => "POST",
                            "success" => "function(data){
                                
                            cadena = data.split('/');    

                           var direccion=document.getElementById('Presupuesto_DIRECCION');
                           direccion.value= cadena[0];
                               }
                            "
                        ),
                        'class' => 'form-control  input-sm',
                        'empty' => 'Seleccionar Cliente',
                        'style' => 'text-transform: uppercase'
                    );
                    ?>
                    <?php echo $form->labelEx($model, 'COD_CLIE'); ?>
                    <?php echo $form->dropDownList($model, 'COD_CLIE', $model->ListaCliente(), $htmlOptions); ?>
                    <?php echo $form->error($model, 'COD_CLIE'); ?>
                </div>

                <div class="col-sm-12 col-md-6">
                    <?php echo $form->labelEx($model, 'DIRECCION'); ?>
                    <?php echo $form->textField($model, 'DIRECCION', array('class' => 'form-control  input-sm', 'style' => 'text-transform: uppercase')); ?>
                    <?php echo $form->error($model, 'DIRECCION'); ?>
                </div>

            </div>
        </div>

        <div class="fieldset">
            <div class="form-group">

                <div class="col-sm-4 col-md-3">
                    <?php echo $form->labelEx($model, 'VIGENCIA'); ?>
                    <?php echo $form->textField($model, 'VIGENCIA', array('class' => 'form-control  input-sm')); ?>
                    <?php echo $form->error($model, 'VIGENCIA'); ?>
                </div>

                <div class="col-sm-4 col-md-3">
                    <?php
                    $htmlOptions = array(
                        'ajax' => array(
                            "url" => $this->createUrl("Condicion"),
                            "type" => "POST",
                            "success" => "function(data){
                                
                            cadena = data.split('/');    

                           var CondPago=document.getElementById('Presupuesto_NRO_DIAS');
                           CondPago.value= cadena[0];
                               }
                            "
                        ),
                        'class' => 'form-control  input-sm',
                        'empty' => 'Condición de Pago',
                        'style' => 'text-transform: uppercase'
                    );
                    ?>
                    <?php echo $form->labelEx($model, 'COND_PAGO'); ?>
                    <?php echo $form->dropDownList($model, 'COND_PAGO', $model->ListaCondicion(), $htmlOptions); ?>
                    <?php echo $form->error($model, 'COND_PAGO'); ?>
                </div>

                <div class="col-sm-4 col-md-3">
                    <?php echo $form->labelEx($model, 'NRO_DIAS'); ?>
                    <?php echo $form->textField($model, 'NRO_DIAS', array('class' => 'form-control  input-sm')); ?>
                    <?php echo $form->error($model, 'NRO_DIAS'); ?>
                </div>

                <div class="col-sm-4 col-md-3">
                    <?php echo $form->labelEx($model, 'COND_PERSONALIZADO'); ?>
                    <?php echo $form->textField($model, 'COND_PERSONALIZADO', array('class' => 'form-control  input-sm')); ?>
                    <?php echo $form->error($model, 'COND_PERSONALIZADO'); ?>
                </div>

            </div>
        </div>

        <div class="fieldset">
            <div class="form-group">

                <div class="col-sm-4 col-md-3">
                    <?php echo $form->labelEx($model, 'MONEDA'); ?>
                    <?php echo $form->dropDownList($model, 'MONEDA', $model->ListaMoneda(), array('class' => 'form-control  input-sm', 'empty' => 'Seleccionar Moneda')); ?>
                    <?php echo $form->error($model, 'MONEDA'); ?>
                </div>

                <div class="col-sm-4 col-md-3">
                    <?php echo $form->labelEx($model, 'FECHA'); ?>
                    <input type="text" id="Presupuesto_FECHA" name="Presupuesto[FECHA]"
                           class="form-control  input-sm" placeholder="Ingrese la Fecha Ingreso"
                           value=" <?php $model->FECHA ?>" required="true"/>
                    <script>
                        $(function () {
                            $("#Presupuesto_FECHA").datepicker();
                        });

                    </script>
                    <?php echo $form->error($model, 'FECHA'); ?>
                </div>

                <div class="col-sm-12 col-md-6">
                    <?php echo $form->labelEx($model, 'COMENTARIO'); ?>
                    <?php echo $form->textField($model, 'COMENTARIO', array('class' => 'form-control  input-sm')); ?>
                    <?php echo $form->error($model, 'COMENTARIO'); ?>
                </div>

                <div class="col-sm-4 col-md-3" style="display: none">
                    <?php echo $form->labelEx($model, 'ESTADO'); ?>
                    <?php echo $form->textField($model, 'ESTADO', array('class' => 'form-control  input-sm')); ?>
                    <?php echo $form->error($model, 'ESTADO'); ?>
                </div>

                <div class="col-sm-4 col-md-3" style="display: none">
                    <?php echo $form->labelEx($model, 'COD_PRESU'); ?>
                    <?php echo $form->textField($model, 'COD_PRESU', array('class' => 'form-control  input-sm')); ?>
                    <?php echo $form->error($model, 'COD_PRESU'); ?>
                </div>

            </div>
        </div>
    </div>

    <div class="panel-footer" style="margin-top: 2%"></div>

    <?php
    include __DIR__ . '/../Recurso/Grilla.php';
    ?>


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
                        'class' => 'form-control  input-sm',
                        'style' => 'background-color: transparent;',
                        'readonly' => 'readonly'
                    ))
                    ?>
                    <?php echo $form->error($model, 'TOT_MONT_ORDE'); ?>
                </td>
            </tr>
            <!--
                <tr>
                    <td class="col-sm-4">
                        <?php echo $form->labelEx($model, 'TOT_MONT_IGV'); ?>
                    </td>
                    <td>
                        <?php
            echo $form->textField($model, 'TOT_MONT_IGV', array(
                'class' => 'form-control  input-sm',
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
                'class' => 'form-control  input-sm',
                'style' => 'background-color: transparent;',
                'readonly' => 'readonly'
            ))
            ?>
                        <?php echo $form->error($model, 'TOT_FACT'); ?>
                    </td>
                </tr>
-->
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
                    'label' => 'Registrar',
                    'size' => 'default',
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
<!-- form -->