<?php

/**
 * This is the model class for table "detalle_guia".
 *
 * The followings are the available columns in table 'detalle_guia':
 * @property integer $COD_GUIA_DET
 * @property integer $CODIGO_GUIA
 * @property integer $LINEA
 * @property integer $CANTIDAD
 * @property string $DESCRIPCION
 * @property string $TOTAL
 *
 * The followings are the available model relations:
 * @property Guia $cODIGOGUIA
 */
class DetalleGuia extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'detalle_guia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('COD_GUIA_DET, CODIGO_GUIA, LINEA', 'required'),
			array('COD_GUIA_DET, CODIGO_GUIA, LINEA, CANTIDAD', 'numerical', 'integerOnly'=>true),
			array('DESCRIPCION', 'length', 'max'=>100),
			array('TOTAL', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('COD_GUIA_DET, CODIGO_GUIA, LINEA, CANTIDAD, DESCRIPCION, TOTAL', 'safe', 'on'=>'search'),
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
			'cODIGOGUIA' => array(self::BELONGS_TO, 'Guia', 'CODIGO_GUIA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'COD_GUIA_DET' => 'Cod Guia Det',
			'CODIGO_GUIA' => 'Codigo Guia',
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

		$criteria=new CDbCriteria;

		$criteria->compare('COD_GUIA_DET',$this->COD_GUIA_DET);
		$criteria->compare('CODIGO_GUIA',$this->CODIGO_GUIA);
		$criteria->compare('LINEA',$this->LINEA);
		$criteria->compare('CANTIDAD',$this->CANTIDAD);
		$criteria->compare('DESCRIPCION',$this->DESCRIPCION,true);
		$criteria->compare('TOTAL',$this->TOTAL,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DetalleGuia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
