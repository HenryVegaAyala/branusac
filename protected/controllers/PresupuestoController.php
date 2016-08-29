<?php

class PresupuestoController extends Controller
{

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'index', 'view', 'admin', 'delete', 'ajax', 'condicion'),
                'users' => array('@'),
            ),
            array('deny',  // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionCondicion()
    {
        $CondPago = $_POST["Presupuesto"]["COND_PAGO"];

        switch ($CondPago) {
            case 0:
                echo '';
                break;
            case 1:
                echo '';
                break;
            case 2:
                echo '30';
                break;
            case 3:
                echo '45';
                break;
            case 4:
                echo '60';
                break;
            case 5:
                echo '';
                break;
            default:
                echo 'Falló el valor de ingreso.';
        }
    }


    public
    function actionAjax()
    {
        $CodCliente = $_POST["Presupuesto"]["COD_CLIE"];

        $connection = Yii::app()->db;
        $sqlStatement = "SELECT  DIRECCION from cliente where '" . $CodCliente . "';";
        $command = $connection->createCommand($sqlStatement);
        $reader = $command->query();

        foreach ($reader as $row) {
            echo $row['DIRECCION'];
        }

    }

    public
    function actionCreate()
    {
        $model = new Presupuesto;

        $count = Yii::app()->db->createCommand()->select('count(*)')
            ->from('presupuesto')
            ->queryScalar();

        $CODPREDET = ($count + 1);

        if (isset($_POST['Presupuesto'])) {

            $model->attributes = $_POST['Presupuesto'];

            $model->FECHA = substr($model->FECHA, 6, 4) . '/' . substr($model->FECHA, 3, 2) . '/' . substr($model->FECHA, 0, 2); //'2016-06-09' ;
            $model->COD_PRESU = $model->AIPresu();
            $model->NUM_PRESU = $model->NAIPresu();


            if (isset ($_POST['DES_LARG'])) {

                $DESCRI = $_POST['DES_LARG'];
                $UND = $_POST['NRO_UNID'];
                $VALPRE = $_POST['VAL_PREC'];
                $VALMOTUND = $_POST['VAL_MONT_UNID'];

                if ($model->save()) {
                    for ($i = 0; $i < count($DESCRI); $i++) {
                        if ($DESCRI[$i] <> '') {
                            $sqlStatement = "call CREAR_DETAL_PRESU(
                     '" . $i . "',
                     '" . $model->COD_PRESU . "',
                     '" . $CODPREDET . "',
                     '" . $model->COD_CLIE . "',
                     '" . $UND[$i] . "',
                     '" . $DESCRI[$i] . "',
                     '" . $VALPRE[$i] . "',
                     '" . $VALMOTUND[$i] . "',
                     '" . $model->NUM_PRESU = $model->NAIPresu() . "'
                     )";
                            $command = Yii::app()->db->createCommand($sqlStatement);
                            $command->execute();
                        }
                    }
                }
                $this->redirect(array('index'));
            }

        }
        $this->render('create', array(
            'model' => $model,
        ));
    }

    public
    function actionUpdate($id)
    {

        $model = new Presupuesto;

        $count = Yii::app()->db->createCommand()->select('count(*)')
            ->from('presupuesto')
            ->queryScalar();

        $CODPREDET = ($count + 1);

        $model = $this->loadModel($id);

        if (isset($_POST['Presupuesto'])) {
            $model->attributes = $_POST['Presupuesto'];

            $model->FECHA = substr($model->FECHA, 6, 4) . '/' . substr($model->FECHA, 3, 2) . '/' . substr($model->FECHA, 0, 2); //'2016-06-09' ;

            if (isset ($_POST['DES_LARG'])) {

                $DESCRI = $_POST['DES_LARG'];
                $UND = $_POST['NRO_UNID'];
                $VALPRE = $_POST['VAL_PREC'];
                $VALMOTUND = $_POST['VAL_MONT_UNID'];

                if ($model->save()) {
                    for ($i = 0; $i < count($DESCRI); $i++) {
                        if ($DESCRI[$i] <> '') {
                            $sqlStatement = "call CREAR_DETAL_PRESU(
                     '" . $i . "',
                     '" . $model->COD_PRESU . "',
                     '" . $CODPREDET . "',
                     '" . $model->COD_CLIE . "',
                     '" . $UND[$i] . "',
                     '" . $DESCRI[$i] . "',
                     '" . $VALPRE[$i] . "',
                     '" . $VALMOTUND[$i] . "',
                     '" . $model->NUM_PRESU = $model->NAIPresu() . "'
                     )";
                            $command = Yii::app()->db->createCommand($sqlStatement);
                            $command->execute();
                        }
                    }
                }
                $this->redirect(array('index'));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public
    function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public
    function actionIndex()
    {
        $model = new Presupuesto('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Presupuesto']))
            $model->attributes = $_GET['Presupuesto'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

    public
    function actionAdmin()
    {
        $model = new Presupuesto('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Presupuesto']))
            $model->attributes = $_GET['Presupuesto'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public
    function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public
    function loadModel($id)
    {
        $model = Presupuesto::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected
    function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'presupuesto-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
