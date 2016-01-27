<?php

	$img=imagecreatefromjpeg('xbox.jpg');
	list($width, $height, $type)=getimagesize('xbox.jpg');
/*
	$per=4/3;
	$new_width=$width*$per;
	$new_height=$height*$per;
*/

	$new_width=200;
	$new_height=200;
	if($width<$height) $new_width=($new_height/$height)*$width;
	else $new_height=($new_width/$width)*$height;

	$new=imagecreatetruecolor($new_width, $new_height);
	imagecopyresampled($new, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

	header('Content-Type:image/jpeg');
	imagejpeg($new, 'action/333.jpg');

	imagedestroy($img);
?>
