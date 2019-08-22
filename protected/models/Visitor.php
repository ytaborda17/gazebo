<?php

/**
 * This is the model class for table "visitor".
 *
 * The followings are the available columns in table 'visitor':
 * @property integer $id
 * @property string $timeStamp
 * @property string $ipAddress
 * @property integer $status
 * @property string $city
 * @property string $region
 * @property string $countryName
 * @property string $countryCode
 * @property string $latitude
 * @property string $longitude
 */
class Visitor extends CActiveRecord
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
		return 'visitor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status', 'numerical', 'integerOnly'=>true),
			array('ipAddress', 'length', 'max'=>50),
			array('city, region, countryName', 'length', 'max'=>100),
			array('countryCode', 'length', 'max'=>5),
			array('latitude, longitude', 'length', 'max'=>20),
			array('timeStamp', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, timeStamp, ipAddress, status, city, region, countryName, countryCode, latitude, longitude', 'safe', 'on'=>'search'),
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
			'timeStamp' => 'Fecha y hora',
			'ipAddress' => 'Dirección IP',
			'status' => 'Estatus',
			'city' => 'Ciudad',
			'region' => 'Estado/Región',
			'countryName' => 'País',
			'countryCode' => 'Código país',
			'latitude' => 'Latitud',
			'longitude' => 'Longitud',
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
		$criteria->compare('timeStamp',$this->timeStamp,true);
		$criteria->compare('ipAddress',$this->ipAddress,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('region',$this->region,true);
		$criteria->compare('countryName',$this->countryName,true);
		$criteria->compare('countryCode',$this->countryCode,true);
		$criteria->compare('latitude',$this->latitude,true);
		$criteria->compare('longitude',$this->longitude,true);

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
	 * @return Visitor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
