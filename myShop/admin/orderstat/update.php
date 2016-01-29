<?php
	include '../public/common/acl.inc.php';
	include '../../public/common/config.inc.php';

	$name=$_POST['name'];
	$id=$_POST['id'];
	$sqlOrderstat="update orderstat set name='{$name}' where id={$id};";

	if(mysql_query($sqlOrderstat))
		echo "<script>location='index.php'</script>";
	else
		echo "<script>location='edit.php'</script>";
?>
