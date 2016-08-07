<?php
/* @var $this ClienteController */
/* @var $model Cliente */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>

    <div class="fieldset">

        <div class="container-fluid">
            <div class="form-group">
                <div class="col-sm-4 control-label">
                    <?php echo $form->label($model, 'NOMBRE'); ?>
                    <?php echo $form->textField($model, 'NOMBRE', array('class' => 'form-control')); ?>
                </div>

                <div class="col-sm-4 control-label">
                    <?php echo $form->label($model, 'DNI'); ?>
                    <?php echo $form->textField($model, 'DNI', array('class' => 'form-control')); ?>
                </div>

                <div class="col-sm-4 control-label">
                    <?php echo $form->label($model, 'RUC'); ?>
                    <?php echo $form->textField($model, 'RUC', array('class' => 'form-control')); ?>
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
                        'label' => 'Buscar',
                        'buttonType' => 'submit',
                        'icon' => 'fa fa-search fa-lg',
                    ));
                    ?>
                    <?php
                    $this->widget(
                        'ext.bootstrap.widgets.TbButton', array(
                        'context' => 'default',
                        'label' => 'Limpiar',
                        'buttonType' => 'reset',
                        'icon' => 'fa fa-eraser fa-lg',
                    ));
                    ?>
                </div>
            </div>
        </div>

        <?php $this->endWidget(); ?>

    </div>
</div>
<!-- search-form -->