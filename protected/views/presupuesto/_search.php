<?php
/* @var $this PresupuestoController */
/* @var $model Presupuesto */
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
                    <?php echo $form->label($model, 'NUM_PRESU'); ?>
                    <?php echo $form->textField($model, 'NUM_PRESU', array('class' => 'list form-control', 'placeholder' => 'Ingrese N° de Presupuesto')); ?>
                </div>

                <div class="col-sm-4 control-label">
                    <?php echo $form->label($model, 'COD_CLIE'); ?>
                    <?php echo $form->dropDownList($model, 'COD_CLIE', $model->ListaCliente(), array('class' => 'list form-control', 'empty' => 'Seleccionar Cliente')); ?>
                </div>

                <div class="col-sm-4 control-label">
                    <?php echo $form->label($model, 'FECHA'); ?>
                    <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'FECHA',
                        'value' => $model->FECHA,
                        'language' => 'es',
                        'htmlOptions' => array('class' => 'form-control', 'placeholder' => 'Fecha Ingreso'),
                        'options' => array(
                            'autoSize' => true,
                            'defaultDate' => $model->FECHA,
                            'dateFormat' => 'dd/mm/yy',
                            'buttonImageOnly' => true,
                            'buttonText' => 'FECHA',
                            'selectOtherMonths' => true,
                            'showAnim' => 'fadeIn', //'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                            'showOtherMonths' => true,
                            'changeMonth' => 'true',
                            'changeYear' => 'true',
                            'maxDate' => "+20Y",
                        ),
                    ));
                    ?>
                </div>

            </div>

            <div class="form-group ">

                <div class="col-sm-4 control-label">
                    <?php echo $form->label($model, 'COND_PAGO'); ?>
                    <?php echo $form->dropDownList($model, 'COND_PAGO', $model->ListaCondicion(), array('class' => 'list form-control', 'empty' => 'Seleccionar Condición')); ?>
                </div>
            </div>

            <div class="form-group ">


                <div class="col-sm-4 control-label">
                    <?php echo $form->label($model, 'ESTADO'); ?>
                    <?php echo $form->dropDownList($model, 'ESTADO', $model->ListaEstado(), array('class' => 'list form-control', 'empty' => 'Seleccionar Estado')); ?>
                </div>
            </div>
        </div>

        <br>
        <div class="panel-footer " style="overflow:hidden;text-align:right;">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <?php echo CHtml::submitButton('Buscar', array('class' => 'btn btn-success btn-md')); ?>
                    <?php echo CHtml::resetButton('Limpiar', array('class' => 'btn btn-default btn-md')); ?>
                    <?php echo CHtml::link('Cerrar Búsqueda','#', array('class' => 'search-button btn btn-default btn-md')); ?>
                </div>
            </div>
        </div>

    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->