<?php

/**
 * This is the model class for table "empresa".
 *
 * The followings are the available columns in table 'empresa':
 * @property integer $id
 * @property string $nombre
 * @property string $rif
 * @property string $telefono
 * @property string $direccion
 * @property string $email
 * @property string $horario
 * @property string $keywords
 * @property string $description
 * @property string $map
 *
 * The followings are the available model relations:
 * @property Contacto[] $contactos
 */
class Empresa extends CActiveRecord
{
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
		return 'empresa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, keywords, description, map', 'required'),
			array('nombre', 'length', 'max'=>140),
			array('rif', 'length', 'max'=>12),
			array('telefono', 'length', 'max'=>20),
			array('email', 'length', 'max'=>100),
			array('map', 'length', 'max'=>400),
			array('email', 'email'),
			array('direccion, horario, keywords, description', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, rif, telefono, direccion, email, horario, keywords, description, map', 'safe', 'on'=>'search'),
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
			'contactos' => array(self::HAS_MANY, 'Contacto', 'empresa_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'rif' => 'RIF',
			'telefono' => 'Teléfono',
			'direccion' => 'Dirección',
			'email' => 'Email',
			'horario' => 'Horario de atención',
			'keywords' => 'Keywords',
			'description' => 'Description',
			'map' => 'Google Map URL',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('rif',$this->rif,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('horario',$this->horario,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('map',$this->map,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @return CDbConnection the database connection used for this class
	 */
	public function getDbConnection()
	{
		return Yii::app()->site_db;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Empresa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
