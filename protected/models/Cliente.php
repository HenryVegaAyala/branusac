<?php

/**
 * This is the model class for table "cliente".
 *
 * The followings are the available columns in table 'cliente':
 * @property integer $COD_CLIE
 * @property string $NOMBRE
 * @property string $RUC
 * @property integer $DNI
 * @property string $DIRECCION
 * @property integer $TELEFONO2
 * @property string $CORREO_E
 * @property string $TELEFONO
 * @property string $FAX
 *
 * The followings are the available model relations:
 * @property Presupuesto[] $presupuestos
 */
class Cliente extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'cliente';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('COD_CLIE, NOMBRE', 'required'),
            array('RUC, DNI','unique'),
            array('COD_CLIE, DNI, TELEFONO2', 'numerical', 'integerOnly' => true),
            array('NOMBRE, CORREO_E', 'length', 'max' => 150),
            array('RUC', 'length', 'max' => 20),
            array('DIRECCION', 'length', 'max' => 250),
            array('TELEFONO, FAX', 'length', 'max' => 60),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('COD_CLIE, NOMBRE, RUC, DNI, DIRECCION, TELEFONO2, CORREO_E, TELEFONO, FAX', 'safe', 'on' => 'search'),
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
            'presupuestos' => array(self::HAS_MANY, 'Presupuesto', 'COD_CLIE'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'COD_CLIE' => 'Codigo',
            'NOMBRE' => 'Nombre',
            'RUC' => 'RUC',
            'DNI' => 'DNI',
            'DIRECCION' => 'Dirección',
            'TELEFONO2' => 'N° Telefono 2',
            'CORREO_E' => 'Correo',
            'TELEFONO' => 'N° Telefono 1',
            'FAX' => 'Fax',
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

        $criteria->compare('COD_CLIE', $this->COD_CLIE);
        $criteria->compare('NOMBRE', $this->NOMBRE, true);
        $criteria->compare('RUC', $this->RUC, true);
        $criteria->compare('DNI', $this->DNI);
        $criteria->compare('DIRECCION', $this->DIRECCION, true);
        $criteria->compare('TELEFONO2', $this->TELEFONO2);
        $criteria->compare('CORREO_E', $this->CORREO_E, true);
        $criteria->compare('TELEFONO', $this->TELEFONO, true);
        $criteria->compare('FAX', $this->FAX, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Cliente the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function AICliente()
    {

        $max = Yii::app()->db->createCommand()
            ->select('count(*)')
            ->from('cliente')
            ->queryScalar();

        $id = ($max + 1);

        return $id;
    }
}
