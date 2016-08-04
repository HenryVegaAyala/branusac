<?php
/* @var $this SiteController */
/* @var $model Usuario */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Registrarse';
$this->breadcrumbs = array(
    'Registrar Usuario Nuevo',
);
?>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Registrar Nuevo Usuario</h3>
        </div>

        <?php if (Yii::app()->user->hasFlash('ERROR')): ?>

            <div class="alert">
                <?php echo Yii::app()->user->getFlash('ERROR'); ?>
            </div>

        <?php endif ?>

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'login-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        ));
        ?>

        <br>

        <div class="container">
            <p class="note">Los aspectos con <span class="required letra"> (*) </span> son requeridos.</p>
        </div>

        <div class="container-fluid">
            <div class="fieldset">

                <div class="form-group">
                    <div class="col-sm-6">
                        <?php echo $form->labelEx($model, 'USE_USUA'); ?>
                        <?php echo $form->textField($model, 'USE_USUA', array('class' => 'form-control', 'placeholder' => 'Ingresar Usuario')); ?>
                        <?php echo $form->error($model, 'USE_USUA'); ?>
                    </div>

                    <div class="col-sm-6">
                        <?php echo $form->labelEx($model, 'PAS_USUA', array('class' => 'form-label')); ?>
                        <?php echo $form->passwordField($model, 'PAS_USUA', array('class' => 'form-control', 'placeholder' => 'Ingresar Contraseña')); ?>
                        <?php echo $form->error($model, 'PAS_USUA'); ?>
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
</div>
<!-- form -->

