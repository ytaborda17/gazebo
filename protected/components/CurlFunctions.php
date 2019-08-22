<?php 

class CurlFunctions extends CApplicationComponent {

	/**
	 * @param $url -> string con la url
	 * @param $fields -> array con los parametros para hacer el post
	 *
	 * @return $result
	 */	
	public function postParams($url,$fields) 
	{
		if (!empty($url) 
			&& $url!="" 
			&& is_array($fields) 
			&& !empty($fields)) {
			
			// build the urlencoded data
			$postvars = http_build_query($fields);

			// open connection
			$ch = curl_init();

			// set the url, number of POST vars, POST data
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, count($fields));
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			// execute post
			$result = curl_exec($ch);
			
			// close connection
			curl_close($ch);

			return $result;

		} else {
			return false;
		}

	}

	/**
	 * @param $url -> string con la url
	 *
	 * @return $result
	 */	
	public function postUrl($url) 
	{
		if (!empty($url) && $url!="" ) {

			// open connection
			$ch = curl_init();

			$options = array(
				CURLOPT_URL            => $url,
				CURLOPT_RETURNTRANSFER => true,   // return web page
				CURLOPT_HEADER         => false,  // don't return headers
				CURLOPT_FOLLOWLOCATION => true,   // follow redirects
				CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
				CURLOPT_ENCODING       => "",     // handle compressed
				CURLOPT_USERAGENT      => "voxte", // name of client
				CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
				CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
				CURLOPT_TIMEOUT        => 120,    // time-out on response
			);

			
			$ch = curl_init($url);

			curl_setopt_array($ch, $options);

			$result  = curl_exec($ch);

			return $result;

		} else {
			return false;
		}

	}



}