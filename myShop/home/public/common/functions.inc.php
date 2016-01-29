<?php
	function verify() {
		session_start();

		$im=imagecreatetruecolor(100, 50);

		$white=imagecolorallocate($im, 255, 255, 255);
		$gray=imagecolorallocate($im, 0x27, 0x28, 0x22);

		imagefill($im, 0, 0, $white);

		for($i=0; $i<500; $i++){
			imagesetpixel($im, mt_rand(0, 100), mt_rand(0, 50), $gray);
		}

		for($i=0; $i<30; $i++){
			imageline($im, mt_rand(0, 100), mt_rand(0, 50), mt_rand(0, 100), mt_rand(0, 50), $gray);
		}

		$arrstr=array_merge(range(0, 9), range(a, z), range(A, Z));
		shuffle($arrstr);
		$randstr=join('', array_slice($arrstr, 0, 4));

		$_SESSION['scode']=$randstr;

		imagettftext($im, 20, 0, 15, 35, $gray, "/usr/share/fonts/truetype/ubuntu-font-family/Ubuntu-B.ttf", $randstr);
		header("content-type:image/png");
		imagepng($im);
	}
?>
