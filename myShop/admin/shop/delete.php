<?php
	include '../public/common/acl.inc.php';
	include "../../public/common/config.inc.php";
	$id=$_GET['id'];
	$image=$_GET['image'];
	$sql="delete from shop where id={$id}";

	if(mysql_query($sql)) {
		$bimg='../../public/uploads/'.$image;
		$simg='../../public/uploads/s_'.$image;
		unlink($bimg);
		unlink($simg);
		echo "<script>location='index.php'</script>";
	}
	else
		echo "<script>location='index.php'</script>";
?>
