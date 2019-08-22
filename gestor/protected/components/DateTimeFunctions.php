<?php 

class DateTimeFunctions extends CApplicationComponent {
	
	// Date functions
	public function strToDate($str) {
		
		$date = DateTime::createFromFormat('d/m/Y', $str)->format('Y-m-d');
		return $date;
	}

	public function dateToStr($date) {
		
		$str = DateTime::createFromFormat('Y-m-d', $date)->format('d/m/Y');
		return $str;

	}

	// Time functios
	public function strToTime($str) {
		
		$date = DateTime::createFromFormat('d/m/Y', $str)->format('Y-m-d');
		return $date;
	}

	public function timeToStr($date) {
		
		$str = DateTime::createFromFormat('Y-m-d', $date)->format('d/m/Y');
		return $str;

	}


	// Return month name by number
	public function monthName($number) {

		switch ($number) {
			case '1': $name = "Enero"; break;
			case '2': $name = "Febrero"; break;
			case '3': $name = "Marzo"; break;
			case '4': $name = "Abril"; break;
			case '5': $name = "Mayo"; break;
			case '6': $name = "Junio"; break;
			case '7': $name = "Julio"; break;
			case '8': $name = "Agosto"; break;
			case '9': $name = "Septiembre"; break;
			case '10': $name = "Octubre"; break;
			case '11': $name = "Noviembre"; break;
			case '12': $name = "Diciembre"; break;
			
			default:
				$name = "ERROR";
				break;
		}

		return $name;
	}
	
}