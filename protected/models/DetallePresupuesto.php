<?php

/**
 * This is the model class for table "detalle_presupuesto".
 *
 * The followings are the available columns in table 'detalle_presupuesto':
 * @property integer $COD_PRESU
 * @property integer $COD_PRESU_DET
 * @property integer $COD_PRODUC
 * @property integer $LINEA
 * @property integer $CANTIDAD
 * @property string $DESCRIPCION
 * @property string $TOTAL
 *
 * The followings are the available model relations:
 * @property Presupuesto $cODPRESU
 * @property Producto $cODPRODUC
 */
class DetallePresupuesto extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'detalle_presupuesto';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('COD_PRESU, COD_PRESU_DET, COD_PRODUC', 'required'),
            array('COD_PRESU, COD_PRESU_DET, COD_PRODUC, LINEA, CANTIDAD', 'numerical', 'integerOnly' => true),
            array('DESCRIPCION', 'length', 'max' => 250),
            array('TOTAL', 'length', 'max' => 9),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('COD_PRESU, COD_PRESU_DET, COD_PRODUC, LINEA, CANTIDAD, DESCRIPCION, TOTAL', 'safe', 'on' => 'search'),
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
            'cODPRESU' => array(self::BELONGS_TO, 'Presupuesto', 'COD_PRESU'),
            'cODPRODUC' => array(self::BELONGS_TO, 'Producto', 'COD_PRODUC'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'COD_PRESU' => 'Cod Presu',
            'COD_PRESU_DET' => 'Cod Presu Det',
            'COD_PRODUC' => 'Cod Produc',
            'LINEA' => 'Linea',
            'CANTIDAD' => 'Cantidad',
            'DESCRIPCION' => 'Descripcion',
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
        $criteria->compare('COD_PRESU_DET', $this->COD_PRESU_DET);
        $criteria->compare('COD_PRODUC', $this->COD_PRODUC);
        $criteria->compare('LINEA', $this->LINEA);
        $criteria->compare('CANTIDAD', $this->CANTIDAD);
        $criteria->compare('DESCRIPCION', $this->DESCRIPCION, true);
        $criteria->compare('TOTAL', $this->TOTAL, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return DetallePresupuesto the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
