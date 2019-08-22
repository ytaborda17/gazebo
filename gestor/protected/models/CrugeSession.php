<?php

/**
 * This is the model class for table "cruge_session".
 *
 * The followings are the available columns in table 'cruge_session':
 * @property integer $idsession
 * @property integer $iduser
 * @property string $created
 * @property string $expire
 * @property integer $status
 * @property string $ipaddress
 * @property integer $usagecount
 * @property string $lastusage
 * @property string $logoutdate
 * @property string $ipaddressout
 * @property integer $geoLocStatus
 * @property string $city
 * @property string $region
 * @property string $countryName
 * @property string $countryCode
 * @property string $latitude
 * @property string $longitude
 */
class CrugeSession extends CActiveRecord
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
		return 'cruge_session';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('iduser', 'required'),
			array('iduser, status, usagecount, geoLocStatus', 'numerical', 'integerOnly'=>true),
			array('created, expire, lastusage, logoutdate', 'length', 'max'=>30),
			array('ipaddress, ipaddressout', 'length', 'max'=>45),
			array('city, region, countryName', 'length', 'max'=>100),
			array('countryCode', 'length', 'max'=>5),
			array('latitude, longitude', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idsession, iduser, created, expire, status, ipaddress, usagecount, lastusage, logoutdate, ipaddressout, geoLocStatus, city, region, countryName, countryCode, latitude, longitude', 'safe', 'on'=>'search'),
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
			'idsession' => 'Idsession',
			'iduser' => 'Iduser',
			'created' => 'Created',
			'expire' => 'Expire',
			'status' => 'Status',
			'ipaddress' => 'Ipaddress',
			'usagecount' => 'Usagecount',
			'lastusage' => 'Lastusage',
			'logoutdate' => 'Logoutdate',
			'ipaddressout' => 'Ipaddressout',
			'geoLocStatus' => 'Geo Loc Status',
			'city' => 'City',
			'region' => 'Region',
			'countryName' => 'Country Name',
			'countryCode' => 'Country Code',
			'latitude' => 'Latitude',
			'longitude' => 'Longitude',
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

		$criteria->compare('idsession',$this->idsession);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('expire',$this->expire,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('ipaddress',$this->ipaddress,true);
		$criteria->compare('usagecount',$this->usagecount);
		$criteria->compare('lastusage',$this->lastusage,true);
		$criteria->compare('logoutdate',$this->logoutdate,true);
		$criteria->compare('ipaddressout',$this->ipaddressout,true);
		$criteria->compare('geoLocStatus',$this->geoLocStatus);
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
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CrugeSession the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
