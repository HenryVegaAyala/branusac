<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property string $COD_USUA
 * @property string $NOM_USUA
 * @property string $APE_USUA
 * @property string $USE_USUA
 * @property string $PAS_USUA
 * @property string $EMA_USUA
 * @property string $EST_USUA
 */
class Usuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NOM_USUA, APE_USUA', 'length', 'max'=>60),
			array('USE_USUA', 'length', 'max'=>20),
			array('PAS_USUA', 'length', 'max'=>250),
			array('EMA_USUA', 'length', 'max'=>50),
			array('EST_USUA', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('COD_USUA, NOM_USUA, APE_USUA, USE_USUA, PAS_USUA, EMA_USUA, EST_USUA', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'COD_USUA' => 'Cod Usua',
			'NOM_USUA' => 'Nom Usua',
			'APE_USUA' => 'Ape Usua',
			'USE_USUA' => 'Use Usua',
			'PAS_USUA' => 'Pas Usua',
			'EMA_USUA' => 'Ema Usua',
			'EST_USUA' => 'Est Usua',
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

		$criteria->compare('COD_USUA',$this->COD_USUA,true);
		$criteria->compare('NOM_USUA',$this->NOM_USUA,true);
		$criteria->compare('APE_USUA',$this->APE_USUA,true);
		$criteria->compare('USE_USUA',$this->USE_USUA,true);
		$criteria->compare('PAS_USUA',$this->PAS_USUA,true);
		$criteria->compare('EMA_USUA',$this->EMA_USUA,true);
		$criteria->compare('EST_USUA',$this->EST_USUA,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
