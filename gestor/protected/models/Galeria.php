<?php

/**
 * This is the model class for table "galeria".
 *
 * The followings are the available columns in table 'galeria':
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property integer $prioridad
 * @property integer $estatus
 *
 * The followings are the available model relations:
 * @property GaleriaImg[] $galeriaImgs
 */
class Galeria extends CActiveRecord
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
		return 'galeria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre', 'required'),
			array('prioridad, estatus', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>140),
			array('descripcion', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, descripcion, prioridad, estatus', 'safe', 'on'=>'search'),
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
			'galeriaImgs' => array(self::HAS_MANY, 'GaleriaImg', 'galeria_id'),
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
			'descripcion' => 'Descripción',
			'prioridad' => 'Prioridad',
			'estatus' => 'Estatus',
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
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('prioridad',$this->prioridad);
		$criteria->compare('estatus',$this->estatus);
		$criteria->order = "prioridad DESC, id ASC";

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
	 * @return Galeria the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return mosaico con las imagenes de cada galeria
	 */
	public function getImagenes($id) {
		$path = Yii::getPathOfAlias('assets').'/galeria/'; // ruta en la cual serán almacenados los archivos
		$media = '';

		$images = GaleriaImg::model()->findAll(array('condition'=>'galeria_id='.$id));	
		$media .= '<div class="row">';
		foreach ($images as $i => $img) {
			$media .= '<div class="col-xs-6 col-md-4">';
			$media .= '<div class="thumbnail">'.
								CHtml::image(str_replace("//", "/", Yii::app()->params['assets_url'].'/galeria/'.$img->file_name) ,$img->titulo, array(
									'data-toggle'=>'tooltip',
									'data-title'=>$img->titulo,
									)).
								'
							</div>';
			$media .= '</div>';
		}
		$media .= '</div>';

		return '<div class="row extend items">'.$media.'</div>';
	}
}
