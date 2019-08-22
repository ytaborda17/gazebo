<?php
/**
 * Registro de visitas al sitio
 * NOTA: No es posible usar los modelos, en este punto aun no se ha cargado la configuracion de la BD
 */
class RegisterVisitor extends CBehavior{       
	
	public function events() {
		return  array('onBeginRequest'=>'newVisitor');
	}
	public function newVisitor() {
		$hasVisited='home'.str_replace(" ", "", ucfirst(Yii::app()->name));
		if ( !isset(Yii::app()->session[$hasVisited]) ) {  // Si la variale de sesion no existe, es una nueva visita
			Yii::app()->session[$hasVisited] = "Yes";

		 	$ipAddress = Yii::app()->request->userHostAddress; // get IP
			$geoData = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ipAddress)); // get Geolocation Data

			// save to DB
			$command = Yii::app()->db->createCommand();
			$command->insert('visitor', array(
				'timeStamp' => date('Y-m-d H:m:s',time()),
				'ipAddress' => $ipAddress,
				'status' => $geoData['geoplugin_status'],
				'city' => $geoData['geoplugin_city'],
				'region' => $geoData['geoplugin_region'],
				'countryName' => $geoData['geoplugin_countryName'],
				'countryCode' => $geoData['geoplugin_countryCode'],
				'latitude' => $geoData['geoplugin_latitude'],
				'longitude' => $geoData['geoplugin_longitude'],
			));
			$command->reset();

		}
	}
}

