<?php

/**
 * This is the model class for table "presupuesto".
 *
 * The followings are the available columns in table 'presupuesto':
 * @property integer $COD_PRESU
 * @property string $NUM_PRESU
 * @property integer $COD_CLIE
 * @property string $MONEDA
 * @property string $FECHA
 * @property string $INICIO
 * @property string $DIRECCION
 * @property string $VIGENCIA
 * @property string $COND_PAGO
 * @property integer $NRO_DIAS
 * @property string $COND_PERSONALIZADO
 * @property string $ESTADO
 * @property string $TOT_MONT_ORDE
 * @property string $TOT_MONT_IGV
 * @property string $TOT_FACT
 * @property string $COMENTARIO
 *
 * The followings are the available model relations:
 * @property DetallePresupuesto[] $detallePresupuestos
 * @property Guia[] $guias
 * @property Cliente $cODCLIE
 */
class Presupuesto extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'presupuesto';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('COD_PRESU, COD_CLIE, NRO_DIAS', 'numerical', 'integerOnly' => true),
            array('NUM_PRESU', 'length', 'max' => 12),
            array('MONEDA, COND_PAGO, COND_PERSONALIZADO, ESTADO', 'length', 'max' => 1),
            array('DIRECCION', 'length', 'max' => 250),
            array('TOT_MONT_ORDE, TOT_MONT_IGV, TOT_FACT', 'length', 'max' => 10),
            array('COMENTARIO', 'length', 'max' => 350),
            array('INICIO, VIGENCIA,FECHA', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('COD_PRESU, NUM_PRESU, COD_CLIE, MONEDA, FECHA, INICIO, DIRECCION, VIGENCIA, COND_PAGO, NRO_DIAS, COND_PERSONALIZADO, ESTADO, TOT_MONT_ORDE, TOT_MONT_IGV, TOT_FACT, COMENTARIO', 'safe', 'on' => 'search'),
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
            'detallePresupuestos' => array(self::HAS_MANY, 'DetallePresupuesto', 'COD_PRESU'),
            'guias' => array(self::HAS_MANY, 'Guia', 'COD_PRESU'),
            'cODCLIE' => array(self::BELONGS_TO, 'Cliente', 'COD_CLIE'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'COD_PRESU' => 'Codigo de Preusupuesto',
            'NUM_PRESU' => 'Número de Preusupuesto',
            'COD_CLIE' => 'Cliente',
            'MONEDA' => 'Tipo Moneda',
            'FECHA' => 'Fecha de Entrega',
            'INICIO' => 'Inicio',
            'DIRECCION' => 'Dirección',
            'VIGENCIA' => 'Vigencia',
            'COND_PAGO' => 'Condición de pago',
            'NRO_DIAS' => 'N° Dias',
            'COND_PERSONALIZADO' => 'Perso.',
            'ESTADO' => 'Estado',
            'TOT_MONT_ORDE' => 'Total',
            'TOT_MONT_IGV' => 'I.G.V',
            'TOT_FACT' => 'Total',
            'COMENTARIO' => 'Comentario',
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

        $criteria->compare('COD_PRESU', $this->COD_PRESU);
        $criteria->compare('NUM_PRESU', $this->NUM_PRESU, true);
        $criteria->compare('COD_CLIE', $this->COD_CLIE);
        $criteria->compare('MONEDA', $this->MONEDA, true);
        $criteria->compare('FECHA', $this->FECHA, true);
        $criteria->compare('INICIO', $this->INICIO, true);
        $criteria->compare('DIRECCION', $this->DIRECCION, true);
        $criteria->compare('VIGENCIA', $this->VIGENCIA, true);
        $criteria->compare('COND_PAGO', $this->COND_PAGO, true);
        $criteria->compare('NRO_DIAS', $this->NRO_DIAS);
        $criteria->compare('COND_PERSONALIZADO', $this->COND_PERSONALIZADO, true);
        $criteria->compare('ESTADO', $this->ESTADO, true);
        $criteria->compare('TOT_MONT_ORDE', $this->TOT_MONT_ORDE, true);
        $criteria->compare('TOT_MONT_IGV', $this->TOT_MONT_IGV, true);
        $criteria->compare('TOT_FACT', $this->TOT_FACT, true);
        $criteria->compare('COMENTARIO', $this->COMENTARIO, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Presupuesto the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function ListaCliente()
    {

        $Cliente = Cliente::model()->findAll();
        return CHtml::listData($Cliente, "COD_CLIE", "NOMBRE");
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

    public function AIPresu()
    {

        $max = Yii::app()->db->createCommand()->select('count(*)')->from('presupuesto')->queryScalar();

        $id = ($max + 1);

        return $id;
    }

    public function NAIPresu()
    {

        $NunPresu = Yii::app()->db->createCommand()
            ->select('VAL_ACTU')
            ->from('imp_folio_presu')
            ->queryScalar();

        $Num = ($NunPresu + 1);

        return $Num;
    }

}
