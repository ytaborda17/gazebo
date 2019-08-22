<?php

/**
 * This is the model class for table "contacto".
 *
 * The followings are the available columns in table 'contacto':
 * @property integer $id
 * @property integer $tipo_id
 * @property string $valor
 * @property integer $estatus
 * @property integer $empresa_id
 * @property integer $red_id
 *
 * The followings are the available model relations:
 * @property Empresa $empresa
 * @property ContactoTipo $tipo
 */
class Contacto extends CActiveRecord
{
	public $url = "";
	public $class = "";
	public $nombre = "";
	public $datos = "";
	public $tipo = "";
	
	/**
	 * Registro o LOG de cambios a la BD
	 */
	 public function behaviors()
	 {
		return array(
			// Classname => path to Class
			'LogDbChanges' => 'application.behaviors.LogDbChanges',
		);
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contacto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_id, valor', 'required'),
			array('tipo_id, estatus, empresa_id, red_id', 'numerical', 'integerOnly'=>true),
			array('valor', 'length', 'max'=>140),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tipo_id, valor, estatus, empresa_id, red_id', 'safe', 'on'=>'search'),
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
			'empresa' => array(self::BELONGS_TO, 'Empresa', 'empresa_id'),
			'tipo' => array(self::BELONGS_TO, 'ContactoTipo', 'tipo_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tipo_id' => 'Tipo',
			'valor' => 'Valor',
			'estatus' => 'Estatus',
			'empresa_id' => 'Empresa',
			'red_id' => 'Red social',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('tipo_id',$this->tipo_id);
		$criteria->compare('valor',$this->valor,true);
		$criteria->compare('estatus',$this->estatus);
		$criteria->compare('empresa_id',$this->empresa_id);
		$criteria->compare('red_id',$this->red_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @return CDbConnection the database connection used for this class
	 */
	public function getDbConnection()
	{
		return Yii::app()->db;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Contacto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getEmpresa($data) {
		$resp = Empresa::model()->findByPk($data->empresa_id);
		return $resp->nombre;
	}

	public function getContactoTipo($data) {
		$resp = ContactoTipo::model()->findByPk($data->tipo_id);
		return $resp->nombre;
	}

	public function getRed($data) {
		$resp = RedSocial::model()->findByPk($data->red_id);
		return $resp->nombre;
	}
}
