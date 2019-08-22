<?php

/**
 * This is the model class for table "galeria_img".
 *
 * The followings are the available columns in table 'galeria_img':
 * @property integer $id
 * @property string $titulo
 * @property string $file_name
 * @property integer $galeria_id
 *
 * The followings are the available model relations:
 * @property Galeria $galeria
 */
class GaleriaImg extends CActiveRecord
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
		return 'galeria_img';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('galeria_id', 'required'),
			array('galeria_id', 'numerical', 'integerOnly'=>true),
			array('titulo', 'length', 'max'=>140),
			array('file_name', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, titulo, file_name, galeria_id', 'safe', 'on'=>'search'),
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
			'galeria' => array(self::BELONGS_TO, 'Galeria', 'galeria_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'titulo' => 'Título',
			'file_name' => 'Imagen',
			'galeria_id' => 'Galeria',
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
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('file_name',$this->file_name,true);
		$criteria->compare('galeria_id',$this->galeria_id);

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
	 * @return GaleriaImg the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
