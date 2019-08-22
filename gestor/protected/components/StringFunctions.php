<?php 

class StringFunctions extends CApplicationComponent {
	
	public function cleanMenuTitle($str) {
		
		$cleanStr = preg_replace('/\s+/', ' ', preg_replace("/[^A-Za-z0-9 ]/", '', $str));

		return rtrim($cleanStr, ' ');
	}

	public function cleanMenuUrl($str) {
		
		$cleanStr = strtolower(rtrim(str_replace(' ', '-', preg_replace('/\s+/', ' ', preg_replace("/[^A-Za-z0-9 ]/", '', $str))),'-'));

		return $cleanStr;
	}
	
}