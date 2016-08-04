<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="es" charset="utf-8">
    <meta
        description="http://iconogen.com/ and http://fontawesome.io and http://www.w3schools.com/ and http://www.jqwidgets.com/ and http://www.favicon-generator.org/">
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/stylev2.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo Yii::app()->request->baseUrl; ?>/css/icon/css/font-awesome.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body class="body">

<div class="container">
    <div>
        <?php
        $this->widget(
            'booster.widgets.TbNavbar', array(
                //'type' => 'inverse',
                'collapse' => true, // requires bootstrap-responsive.css
                'fluid' => true,
                'brand' => 'Branusac',
//                    'brand' => '<img src ="' . Yii::app()->request->baseUrl . '/images/lg.png" />' . " Panadería Alemana",
//                    'fixed' => false,
                'items' => array(
                    array(
                        'class' => 'booster.widgets.TbMenu',
                        'type' => 'navbar',
                        'items' => array(

                            array('label' => 'Inicio', 'url' => array('/site/index'), 'visible' => Yii::app()->user->isGuest),

                            /*
                            array(
                                'label' => 'Usuario',
                                'items' => array(
                                    array('label' => 'Registrar', 'url' => array('/site/register')),
                                    array('label' => 'Cambiar Contraseña', 'url' => array('/site/change')),
                                ), 'visible' => Yii::app()->user->isGuest
                            ),
                            */
                            array(
                                'label' => 'Presupuestos',
                                'items' => array(
                                    array('label' => 'Crear Nuevo Presupuesto', 'url' => array('/presupuesto/create')),
                                    array('label' => 'Lista de Presupuestos', 'url' => array('/presupuesto/index')),
                                    '---',
                                ), 'visible' => !Yii::app()->user->isGuest
                            ),

                            array(
                                'label' => 'Guías',
                                'items' => array(
                                    array('label' => 'Lista de Guias', 'url' => array('/guia/create')),
                                    '---',
                                ), 'visible' => !Yii::app()->user->isGuest
                            ),

                            array(
                                'label' => 'Facturas',
                                'items' => array(
                                    array('label' => 'Lista de Facturas', 'url' => array('/factura/index')),
                                    '---',
                                ), 'visible' => !Yii::app()->user->isGuest
                            ),

                            array(
                                'label' => 'Registros',
                                'items' => array(
                                    array('label' => 'Clientes', 'url' => array('/cliente/index')),
                                    array('label' => 'Transportistas', 'url' => array('/transportista/index')),
                                    '---',
                                ), 'visible' => !Yii::app()->user->isGuest
                            ),

                            array('label' => 'Iniciar Sesión', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                            array('label' => 'Logout (' . Yii::app()->user->name . ')', 'icon' => 'user', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)

                        ),
                    )
                )
            )
        );
        ?>
    </div>

    <?php if (isset($this->breadcrumbs)): ?>
        <?php
        $this->widget('ext.bootstrap.widgets.TbBreadcrumbs', array(
            'links' => $this->breadcrumbs,
        ));
        ?><!-- breadcrumbs -->
    <?php endif ?>

    <?php echo $content; ?>

    <div class="clear"></div>

</div>
<!-- page -->
<center>
    <div id="footer">

        Copyright &copy; <?php echo date('Y'); ?> Derechos Reservados por Branusac.

    </div>
    <br>
</center>
</body>
</html>