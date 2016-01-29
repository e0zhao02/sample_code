<?php
	include '../public/common/acl.inc.php';
	include "../../public/common/config.inc.php";
	$id=$_GET['id'];
	$sql="delete from user where id={$id}";

	if(mysql_query($sql))
		echo "<script>location='index.php'</script>";
	else
		echo "<script>location='index.php'</script>";
?>
