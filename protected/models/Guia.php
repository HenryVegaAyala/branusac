<?php

/**
 * This is the model class for table "guia".
 *
 * The followings are the available columns in table 'guia':
 * @property integer $COD_GUIA
 * @property integer $COD_FACT
 * @property string $NUM_GUIA
 * @property string $DOMICILIO
 * @property string $RUC
 * @property string $OC
 * @property string $FECHA
 * @property integer $TRANS_CODIGO
 *
 * The followings are the available model relations:
 * @property DetalleGuia[] $detalleGuias
 * @property Transportista $tRANSCODIGO
 * @property Factura $cODFACT
 */
class Guia extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'guia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('COD_GUIA, COD_FACT, TRANS_CODIGO', 'required'),
			array('COD_GUIA, COD_FACT, TRANS_CODIGO', 'numerical', 'integerOnly'=>true),
			array('NUM_GUIA', 'length', 'max'=>3),
			array('DOMICILIO', 'length', 'max'=>120),
			array('RUC, OC', 'length', 'max'=>20),
			array('FECHA', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('COD_GUIA, COD_FACT, NUM_GUIA, DOMICILIO, RUC, OC, FECHA, TRANS_CODIGO', 'safe', 'on'=>'search'),
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
			'detalleGuias' => array(self::HAS_MANY, 'DetalleGuia', 'CODIGO_GUIA'),
			'tRANSCODIGO' => array(self::BELONGS_TO, 'Transportista', 'TRANS_CODIGO'),
			'cODFACT' => array(self::BELONGS_TO, 'Factura', 'COD_FACT'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'COD_GUIA' => 'Cod Guia',
			'COD_FACT' => 'Cod Fact',
			'NUM_GUIA' => 'Num Guia',
			'DOMICILIO' => 'Domicilio',
			'RUC' => 'Ruc',
			'OC' => 'Oc',
			'FECHA' => 'Fecha',
			'TRANS_CODIGO' => 'Trans Codigo',
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

		$criteria=new CDbCriteria;

		$criteria->compare('COD_GUIA',$this->COD_GUIA);
		$criteria->compare('COD_FACT',$this->COD_FACT);
		$criteria->compare('NUM_GUIA',$this->NUM_GUIA,true);
		$criteria->compare('DOMICILIO',$this->DOMICILIO,true);
		$criteria->compare('RUC',$this->RUC,true);
		$criteria->compare('OC',$this->OC,true);
		$criteria->compare('FECHA',$this->FECHA,true);
		$criteria->compare('TRANS_CODIGO',$this->TRANS_CODIGO);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Guia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
