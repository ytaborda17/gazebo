<?php 

class ImageFunctions extends CApplicationComponent {
	
	/**
	 * @param $src_file 	Source to file: path + old file name
	 * @param $dst_file 	Destination file: path + new file name
	 * @param $width 		Size in PX
	 * @param $height 	Size in PX
	 * @param $ext 		File extention
	 * @param $ratio 		Boolean, TRUE: proportional image, default to TRUE
	 *
	 *	@return Boolean	True: success, False: fail
	 */
	public function resize($src_file, $dst_file, $dst_w, $dst_h, $ext, $set_ratio=true) {

		if(file_exists($src_file)) {

			if (preg_match('/jpg|jpeg/i',$ext)) $src_img = imagecreatefromjpeg($src_file);
			elseif (preg_match('/png/i',$ext)) $src_img = imagecreatefrompng($src_file);
			elseif (preg_match('/gif/i',$ext)) $src_img = imagecreatefromgif($src_file);
			elseif (preg_match('/bmp/i',$ext)) $src_img = imagecreatefrombmp($src_file);
			else $src_img = "0";

			if ($set_ratio) {
				// Get current dimensions
				$width = imagesx($src_img);
				$height = imagesy($src_img);

				$scale = min($dst_w/$width, $dst_h/$height); // Calculate the scaling we need to do, to fit the image inside our frame

				// Get the new dimensions
				$dst_w = ceil($scale*$width);
				$dst_h = ceil($scale*$height);
			}

			if ($src_img!="0") {
				$dst_img = imagecreatetruecolor($dst_w, $dst_h);

				if ($width>$dst_w || $height>$dst_h) {
					imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $dst_w, $dst_h, $width, $height);
					imagejpeg($dst_img, $dst_file, 100);
				} else {
					rename($src_file, $dst_file);
				}
				imagedestroy($dst_img);		
				if(file_exists($src_file)) foreach(glob($src_file) as $file) unlink($file);
				
				return true;

			} else return false;
			
		} else return false;

	}
	
}