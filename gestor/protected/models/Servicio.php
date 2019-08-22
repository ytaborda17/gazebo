<?php

/**
 * This is the model class for table "servicio".
 *
 * The followings are the available columns in table 'servicio':
 * @property integer $id
 * @property string $titulo
 * @property string $descripcion
 * @property integer $estatus
 */
class Servicio extends CActiveRecord
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
		return 'servicio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, descripcion', 'required'),
			array('estatus', 'numerical', 'integerOnly'=>true),
			array('titulo', 'length', 'max'=>140),
			array('descripcion', 'length', 'max'=>800),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, titulo, descripcion, estatus', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'titulo' => 'Titulo',
			'descripcion' => 'Descripcion',
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
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('estatus',$this->estatus);

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
	 * @return Servicio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getImagenes($id) {

		$media = '';
		$path = Yii::getPathOfAlias('assets').'/servicios/'; // ruta en la cual serán almacenados los archivos

		$dir = array_diff( scandir($path), array('..', '.') );
		foreach ($dir as $i => $file) if ( strpos($file,"servicio-".$id."-")!==false ) { 
			$media .='<div class="item thumbnail">'.CHtml::image(str_replace("//", "/", Yii::app()->params['assets_url'].'/servicios/'.$file) ,'').'</div>';
		}

		return '<div class="mosiac"><div class="row extend items">'.$media.'</div></div>';
	}
}
