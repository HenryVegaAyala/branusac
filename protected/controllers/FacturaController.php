<?php

class FacturaController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
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
        $CondPago = $_POST["Factura"]["COND_PAGO"];

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
        $CodCliente = $_POST["Factura"]["CLIENTE"];

        $connection = Yii::app()->db;
        $sqlStatement = "SELECT  RUC from cliente where '" . $CodCliente . "';";
        $command = $connection->createCommand($sqlStatement);
        $reader = $command->query();

        foreach ($reader as $row) {
            echo $row['RUC'];
        }

    }

    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Factura;

        $count = Yii::app()->db->createCommand()->select('count(*)')
            ->from('factura')
            ->queryScalar();

        $CODFACDET = ($count + 1);

        if (isset($_POST['Factura'])) {
            $model->attributes = $_POST['Factura'];

            $model->FECHA = substr($model->FECHA, 6, 4) . '/' . substr($model->FECHA, 3, 2) . '/' . substr($model->FECHA, 0, 2); //'2016-06-09' ;
            $model->COD_FACT = $model->AIFactu();
            $model->NUM_FACT = $model->NAIFactu();

            if (isset ($_POST['DES_LARG'])) {

                $DESCRI = $_POST['DES_LARG'];
                $UND = $_POST['NRO_UNID'];
                $VALPRE = $_POST['VAL_PREC'];
                $VALMOTUND = $_POST['VAL_MONT_UNID'];

                if ($model->save()) {
                    for ($i = 0; $i < count($DESCRI); $i++) {
                        if ($DESCRI[$i] <> '') {
                            $sqlStatement = "call CREAR_DETAL_FACTU(
                     '" . $i . "',
                     '" . $model->COD_FACT . "',
                     '" . $CODFACDET . "',
                     '" . $model->CLIENTE . "',
                     '" . $UND[$i] . "',
                     '" . $DESCRI[$i] . "',
                     '" . $VALPRE[$i] . "',
                     '" . $VALMOTUND[$i] . "'
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

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Factura'])) {
            $model->attributes = $_POST['Factura'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->COD_FACT));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $model = new Factura('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Factura']))
            $model->attributes = $_GET['Factura'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Factura the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Factura::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Factura $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'factura-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
