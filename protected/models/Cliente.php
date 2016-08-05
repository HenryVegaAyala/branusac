<?php

/**
 * This is the model class for table "cliente".
 *
 * The followings are the available columns in table 'cliente':
 * @property integer $COD_CLIE
 * @property string $NOMBRE
 * @property string $APELLIDO
 * @property string $RUC
 * @property string $DIRECCION
 * @property string $TELEFONO
 * @property string $FAX
 * @property string $CORREO_E
 * @property string $ESTADO
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
			array('COD_CLIE, NOMBRE, RUC', 'required'),
			array('COD_CLIE', 'numerical', 'integerOnly'=>true),
			array('NOMBRE, DIRECCION, CORREO_E', 'length', 'max'=>150),
			array('APELLIDO', 'length', 'max'=>45),
			array('RUC', 'length', 'max'=>20),
			array('TELEFONO, FAX', 'length', 'max'=>60),
			array('ESTADO', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('COD_CLIE, NOMBRE, APELLIDO, RUC, DIRECCION, TELEFONO, FAX, CORREO_E, ESTADO', 'safe', 'on'=>'search'),
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
			'COD_CLIE' => 'Cod Clie',
			'NOMBRE' => 'Nombre',
			'APELLIDO' => 'Apellido',
			'RUC' => 'Ruc',
			'DIRECCION' => 'Direccion',
			'TELEFONO' => 'Telefono',
			'FAX' => 'Fax',
			'CORREO_E' => 'Correo E',
			'ESTADO' => 'Estado',
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

		$criteria->compare('COD_CLIE',$this->COD_CLIE);
		$criteria->compare('NOMBRE',$this->NOMBRE,true);
		$criteria->compare('APELLIDO',$this->APELLIDO,true);
		$criteria->compare('RUC',$this->RUC,true);
		$criteria->compare('DIRECCION',$this->DIRECCION,true);
		$criteria->compare('TELEFONO',$this->TELEFONO,true);
		$criteria->compare('FAX',$this->FAX,true);
		$criteria->compare('CORREO_E',$this->CORREO_E,true);
		$criteria->compare('ESTADO',$this->ESTADO,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cliente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
