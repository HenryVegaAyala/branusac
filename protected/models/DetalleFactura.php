<?php

/**
 * This is the model class for table "detalle_factura".
 *
 * The followings are the available columns in table 'detalle_factura':
 * @property integer $COD_FACT
 * @property integer $COD_FACT_DET
 * @property integer $COD_PRODUC
 * @property integer $LINEA
 * @property integer $CANTIDAD
 * @property string $DESCRIPCION
 * @property string $TOTAL
 * @property integer $COD_CLIE
 * @property string $PRECIO
 *
 * The followings are the available model relations:
 * @property Factura $cODFACT
 */
class DetalleFactura extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'detalle_factura';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('COD_FACT, COD_FACT_DET, COD_PRODUC, COD_CLIE, PRECIO', 'required'),
            array('COD_FACT, COD_FACT_DET, COD_PRODUC, LINEA, CANTIDAD, COD_CLIE', 'numerical', 'integerOnly' => true),
            array('DESCRIPCION', 'length', 'max' => 250),
            array('TOTAL', 'length', 'max' => 9),
            array('PRECIO', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('COD_FACT, COD_FACT_DET, COD_PRODUC, LINEA, CANTIDAD, DESCRIPCION, TOTAL, COD_CLIE, PRECIO', 'safe', 'on' => 'search'),
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
            'cODFACT' => array(self::BELONGS_TO, 'Factura', 'COD_FACT'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'COD_FACT' => 'Cod Fact',
            'COD_FACT_DET' => 'Cod Fact Det',
            'COD_PRODUC' => 'Cod Produc',
            'LINEA' => 'Linea',
            'CANTIDAD' => 'Cantidad',
            'DESCRIPCION' => 'Descripcion',
            'TOTAL' => 'Total',
            'COD_CLIE' => 'Cod Clie',
            'PRECIO' => 'Precio',
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
        $criteria->compare('COD_FACT_DET', $this->COD_FACT_DET);
        $criteria->compare('COD_PRODUC', $this->COD_PRODUC);
        $criteria->compare('LINEA', $this->LINEA);
        $criteria->compare('CANTIDAD', $this->CANTIDAD);
        $criteria->compare('DESCRIPCION', $this->DESCRIPCION, true);
        $criteria->compare('TOTAL', $this->TOTAL, true);
        $criteria->compare('COD_CLIE', $this->COD_CLIE);
        $criteria->compare('PRECIO', $this->PRECIO, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return DetalleFactura the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
