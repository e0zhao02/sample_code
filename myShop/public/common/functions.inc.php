<?php
	function thumb($mimg, $sx, $sy) {
		$imgarr=getimagesize($mimg);
		$imgtype=$imgarr[2];

		$imgdir=dirname($mimg);
		$imgfile=basename($mimg);
		$simgpath=$imgdir."/s_".$imgfile;

		switch($imgtype) {
			case 1:
				$imgcrt="imagecreatefromgif";
				$imgout="imagegif";
				break;
			case 2:
				$imgcrt="imagecreatefromjpeg";
				$imgout="imagejpeg";
				break;
			case 3:
				$imgcrt="imagecreatefrompng";
				$imgout="imagepng";
				break;
		}

		$mimg=$imgcrt($mimg);
		$mx=$imgarr[0];
		$my=$imgarr[1];

		$sx=$sx;
		$sy=$sy;

		if($sx/$mx>$sy/$my) $per=$sy/$my;
		else $per=$sx/$mx;

		$persx=floor($mx*$per);
		$persy=floor($my*$per);

		$simg=imagecreatetruecolor($persx, $persy);
		imagecopyresampled($simg, $mimg, 0, 0, 0, 0, $persx, $persy, $mx, $my);

		$imgout($simg, $simgpath);

		imagedestroy($mimg);
		imagedestroy($simg);
	}
?>
