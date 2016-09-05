<?php

/**
 * This is the model class for table "factura".
 *
 * The followings are the available columns in table 'factura':
 * @property integer $COD_FACT
 * @property integer $COD_PRESU
 * @property string $NUM_FACT
 * @property string $MONEDA
 * @property string $FECHA
 * @property string $CLIENTE
 * @property string $RUC
 * @property string $OC
 * @property string $COND_PAGO
 * @property integer $NRO_DIAS
 * @property string $COND_PERSONALIZADO
 * @property string $TOT_MONT_ORDE
 * @property string $TOT_MONT_IGV
 * @property string $TOT_FACT
 * @property string $FECHA_CANC
 * @property string $ESTADO
 * @property integer $COD_GUIA
 *
 * The followings are the available model relations:
 * @property DetalleFactura[] $detalleFacturas
 * @property Presupuesto $cODPRESU
 * @property Guia[] $guias
 */
class Factura extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'factura';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('COD_FACT, NUM_FACT, CLIENTE', 'required'),
            array('COD_FACT, COD_PRESU, NRO_DIAS, COD_GUIA', 'numerical', 'integerOnly' => true),
            array('NUM_FACT', 'length', 'max' => 7),
            array('MONEDA, COND_PAGO, ESTADO', 'length', 'max' => 1),
            array('CLIENTE', 'length', 'max' => 150),
            array('RUC, OC', 'length', 'max' => 20),
            array('COND_PERSONALIZADO', 'length', 'max' => 100),
            array('TOT_MONT_ORDE, TOT_MONT_IGV, TOT_FACT', 'length', 'max' => 10),
            array('FECHA, FECHA_CANC', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('COD_FACT, COD_PRESU, NUM_FACT, MONEDA, FECHA, CLIENTE, RUC, OC, COND_PAGO, NRO_DIAS, COND_PERSONALIZADO, TOT_MONT_ORDE, TOT_MONT_IGV, TOT_FACT, FECHA_CANC, ESTADO, COD_GUIA', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'detalleFacturas' => array(self::HAS_MANY, 'DetalleFactura', 'COD_FACT'),
            'cODPRESU' => array(self::BELONGS_TO, 'Presupuesto', 'COD_PRESU'),
            'guias' => array(self::HAS_MANY, 'Guia', 'COD_FACT'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'COD_FACT' => 'Cod Fact',
            'COD_PRESU' => 'N° de Presupuesto',
            'NUM_FACT' => 'N° de Factura',
            'MONEDA' => 'Moneda',
            'FECHA' => 'Fecha',
            'CLIENTE' => 'Cliente',
            'RUC' => 'RUC',
            'OC' => 'Orden de Compra',
            'COND_PAGO' => 'Condición de pago',
            'NRO_DIAS' => 'Nro Dias',
            'COND_PERSONALIZADO' => 'Cond Personalizado',
            'TOT_MONT_ORDE' => 'SubTotal',
            'TOT_MONT_IGV' => 'I.G.V',
            'TOT_FACT' => 'Total',
            'FECHA_CANC' => 'Fecha Cancelación',
            'ESTADO' => 'Estado',
            'COD_GUIA' => 'N° de Guia',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('COD_FACT', $this->COD_FACT);
        $criteria->compare('COD_PRESU', $this->COD_PRESU);
        $criteria->compare('NUM_FACT', $this->NUM_FACT, true);
        $criteria->compare('MONEDA', $this->MONEDA, true);
        $criteria->compare('FECHA', $this->FECHA, true);
        $criteria->compare('CLIENTE', $this->CLIENTE, true);
        $criteria->compare('RUC', $this->RUC, true);
        $criteria->compare('OC', $this->OC, true);
        $criteria->compare('COND_PAGO', $this->COND_PAGO, true);
        $criteria->compare('NRO_DIAS', $this->NRO_DIAS);
        $criteria->compare('COND_PERSONALIZADO', $this->COND_PERSONALIZADO, true);
        $criteria->compare('TOT_MONT_ORDE', $this->TOT_MONT_ORDE, true);
        $criteria->compare('TOT_MONT_IGV', $this->TOT_MONT_IGV, true);
        $criteria->compare('TOT_FACT', $this->TOT_FACT, true);
        $criteria->compare('FECHA_CANC', $this->FECHA_CANC, true);
        $criteria->compare('ESTADO', $this->ESTADO, true);
        $criteria->compare('COD_GUIA', $this->COD_GUIA);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Factura the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function ListaMoneda()
    {
        $model = array(
            array('MONEDA' => '0', 'value' => 'PE – Nuevo Soles'),
            array('MONEDA' => '1', 'value' => 'US – Dólares Americanos'),
        );
        return cHtml::listData($model, 'MONEDA', 'value');
    }

    public function ListaCondicion()
    {
        $model = array(
            array('COND_PAGO' => '0', 'value' => 'ContraEntrega'),
            array('COND_PAGO' => '1', 'value' => 'Contado'),
            array('COND_PAGO' => '2', 'value' => '30 días'),
            array('COND_PAGO' => '3', 'value' => '45 días'),
            array('COND_PAGO' => '4', 'value' => '60 días'),
            array('COND_PAGO' => '5', 'value' => 'Personalizado'),
        );
        return cHtml::listData($model, 'COND_PAGO', 'value');
    }

    public function ListaEstado()
    {
        $model = array(
            array('ESTADO' => '1', 'value' => 'En Proceso'),
            array('ESTADO' => '2', 'value' => 'Despachadado/Atendido'),
            array('ESTADO' => '9', 'value' => 'Anulado'),
            array('ESTADO' => '0', 'value' => 'Creado'),
        );
        return cHtml::listData($model, 'ESTADO', 'value');
    }

    public function ListaCliente()
    {

        $Cliente = Cliente::model()->findAll();
        return CHtml::listData($Cliente, "COD_CLIE", "NOMBRE");
    }

    public function AIFactu()
    {

        $max = Yii::app()->db->createCommand()->select('count(*)')->from('factura')->queryScalar();

        $id = ($max + 1);

        return $id;
    }

    public function NAIFactu()
    {

        $NunPresu = Yii::app()->db->createCommand()
            ->select('VAL_ACTU')
            ->from('folio')
            ->where('VAL_LLAVE = 2')
            ->queryScalar();

        $Num = ($NunPresu);

        return $Num;
    }

    public function ValorNFact($var)
    {
        $Factura = Yii::app()->db->createCommand()
            ->select('NUM_PRESU')
            ->from('presupuesto')
            ->where("COD_PRESU = '" . $var . "';")
            ->queryScalar();

        return $Factura;

    }


}
