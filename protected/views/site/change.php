<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/stylev2.css">

<?php
/* @var $this SiteController */
/* @var $model ChangeForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Cambiar Contraseña';
$this->breadcrumbs = array(
    'Cambiar Contraseña',
);
?>

<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Cambiar Contraseña</h3>
        </div>

        <?php if (Yii::app()->user->hasFlash('success')): ?>
            <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash('success'); ?>
            </div>
        <?php endif ?>

        <?php if (Yii::app()->user->hasFlash('error')): ?>
            <div class="alert">
                <?php echo Yii::app()->user->getFlash('error'); ?>
            </div>
        <?php endif ?>


        <div class="container-fluid">
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
                        <div class="col-sm-4">
                            <?php echo $form->labelEx($model, 'password'); ?>
                            <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'placeholder' => 'Contraseña Actual')); ?>
                            <?php echo $form->error($model, 'password'); ?>
                        </div>

                        <div class="col-sm-4">
                            <?php echo $form->labelEx($model, 'password_new'); ?>
                            <?php echo $form->passwordField($model, 'password_new', array('class' => 'form-control', 'placeholder' => 'Nueva Contraseña')); ?>
                            <?php echo $form->error($model, 'password_new'); ?>
                        </div>

                        <div class="col-sm-4">
                            <?php echo $form->labelEx($model, 'password_new_repeat'); ?>
                            <?php echo $form->passwordField($model, 'password_new_repeat', array('class' => 'form-control', 'placeholder' => 'Re-Ingresar Nueva Contraseña')); ?>
                            <?php echo $form->error($model, 'password_new_repeat'); ?>
                        </div>
                    </div>
                </div>
            </div>

            <br>
        </div>

        <div class="panel-footer " style="overflow:hidden;text-align:right;">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <?php echo CHtml::submitButton('Cambiar Contraseña', array('class' => 'btn btn-success btn-md')); ?>
                </div>
            </div>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div>
<!-- form -->
