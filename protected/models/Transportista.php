<?php

/**
 * This is the model class for table "transportista".
 *
 * The followings are the available columns in table 'transportista':
 * @property integer $COD_TRANSP
 * @property integer $COD_VEHI
 * @property string $NOMBRE
 * @property string $APELLIDO
 * @property string $DIRECCION
 * @property string $RUC
 * @property string $DNI
 * @property string $NRO_LICENCIA
 * @property string $TELEFONO
 * @property string $PLACA
 * @property string $MARCA
 *
 * The followings are the available model relations:
 * @property Guia[] $guias
 */
class Transportista extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'transportista';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('COD_TRANSP', 'required'),
            array('COD_TRANSP, COD_VEHI', 'numerical', 'integerOnly' => true),
            array('NOMBRE, DIRECCION', 'length', 'max' => 100),
            array('APELLIDO, PLACA, MARCA', 'length', 'max' => 45),
            array('RUC, DNI, NRO_LICENCIA', 'length', 'max' => 12),
            array('TELEFONO', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('COD_TRANSP, COD_VEHI, NOMBRE, APELLIDO, DIRECCION, RUC, DNI, NRO_LICENCIA, TELEFONO, PLACA, MARCA', 'safe', 'on' => 'search'),
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
            'guias' => array(self::HAS_MANY, 'Guia', 'TRANS_CODIGO'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'COD_TRANSP' => 'Cod Transp',
            'COD_VEHI' => 'Cod Vehi',
            'NOMBRE' => 'Nombre',
            'APELLIDO' => 'Apellido',
            'DIRECCION' => 'Dirección',
            'RUC' => 'RUC',
            'DNI' => 'DNI',
            'NRO_LICENCIA' => 'N° de Licencia',
            'TELEFONO' => 'Teléfono',
            'PLACA' => 'N° de Placa',
            'MARCA' => 'Marca',
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

        $criteria->compare('COD_TRANSP', $this->COD_TRANSP);
        $criteria->compare('COD_VEHI', $this->COD_VEHI);
        $criteria->compare('NOMBRE', $this->NOMBRE, true);
        $criteria->compare('APELLIDO', $this->APELLIDO, true);
        $criteria->compare('DIRECCION', $this->DIRECCION, true);
        $criteria->compare('RUC', $this->RUC, true);
        $criteria->compare('DNI', $this->DNI, true);
        $criteria->compare('NRO_LICENCIA', $this->NRO_LICENCIA, true);
        $criteria->compare('TELEFONO', $this->TELEFONO, true);
        $criteria->compare('PLACA', $this->PLACA, true);
        $criteria->compare('MARCA', $this->MARCA, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Transportista the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
