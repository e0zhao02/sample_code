<?php
	include '../public/common/acl.inc.php';
	include '../../public/common/config.inc.php';

	$id=$_GET['id'];
	$sql="delete from orderstat where id={$id};";

	mysql_query($sql);
	echo "<script>location='index.php'</script>";
?>
