<?php

/**
 * This is the model class for table "cruge_audit".
 *
 * The followings are the available columns in table 'cruge_audit':
 * @property integer $id
 * @property string $description
 * @property string $action
 * @property string $model
 * @property integer $model_id
 * @property string $field
 * @property string $time_stamp
 * @property integer $user_id
 * @property string $ipAddress
 *
 * The followings are the available model relations:
 * @property CrugeUser $user
 */
class Auditoria extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cruge_audit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('time_stamp, user_id', 'required'),
			array('model_id, user_id', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>250),
			array('action, model, field, ipAddress', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, description, action, model, model_id, field, time_stamp, user_id, ipAddress', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'CrugeUser', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'description' => 'Descripción',
			'action' => 'Acción',
			'model' => 'Base de datos',
			'model_id' => 'Registro #',
			'field' => 'Campo',
			'time_stamp' => 'Fecha y hora',
			'user_id' => 'Usuario',
			'ipAddress' => 'Dirección IP',
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('action',$this->action,true);
		$criteria->compare('model',$this->model,true);
		$criteria->compare('model_id',$this->model_id);
		$criteria->compare('field',$this->field,true);
		$criteria->compare('time_stamp',$this->time_stamp,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('ipAddress',$this->ipAddress,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'id DESC',
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Auditoria the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	/*
	 */
	public  function getUser($data) {
		$command = Yii::app()->db->createCommand("SELECT username from cruge_user where iduser='".$data->user_id."'")->queryRow();
		
		return $command['username'];
	}
	public  function getTime($data) {
		$time= date("d/m/Y h:i a",strtotime($data->time_stamp));
		return $time;
	}

}
