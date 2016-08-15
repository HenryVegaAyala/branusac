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
 * @property string $SUB_TOTAL
 * @property string $IGV
 * @property string $TOTAL
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
            //array('COD_PRESU, COD_CLIE, FECHA, SUB_TOTAL, IGV, TOTAL', 'required'),
            array('COD_PRESU, COD_CLIE, NRO_DIAS', 'numerical', 'integerOnly' => true),
            array('NUM_PRESU', 'length', 'max' => 12),
            array('MONEDA, COND_PAGO, COND_PERSONALIZADO, ESTADO', 'length', 'max' => 1),
            array('DIRECCION', 'length', 'max' => 250),
            array('SUB_TOTAL, IGV, TOTAL', 'length', 'max' => 10),
            //array('INICIO, VIGENCIA', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('COD_PRESU, NUM_PRESU, COD_CLIE, MONEDA, FECHA, INICIO, DIRECCION, VIGENCIA, COND_PAGO, NRO_DIAS, COND_PERSONALIZADO, ESTADO, SUB_TOTAL, IGV, TOTAL', 'safe', 'on' => 'search'),
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
            'SUB_TOTAL' => 'Sub Total',
            'IGV' => 'I.G.V',
            'TOTAL' => 'Total',
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
        $criteria->compare('SUB_TOTAL', $this->SUB_TOTAL, true);
        $criteria->compare('IGV', $this->IGV, true);
        $criteria->compare('TOTAL', $this->TOTAL, true);

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

    public function Total()
    {

        $max = Yii::app()->db->createCommand()
            ->select('round (SUM(TOTAL),2) as TOTAL')
            ->from('detalle_presupuesto')
            ->where("COD_CLIE = '" . $this->COD_CLIE . "'
                      and COD_PRESU = '" . $this->COD_PRESU . "';")
            ->queryScalar();

        $id = ($max + 0);

        return $id;
    }

}
