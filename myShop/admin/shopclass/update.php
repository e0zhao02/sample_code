<?php
	include '../public/common/acl.inc.php';
	include '../../public/common/config.inc.php';
	$name=$_POST['name'];
	$id=$_POST['id'];

	$sqlUser="update shopclass set name='$name' where id={$id};";
	if(mysql_query($sqlUser))
		echo "<script>location='index.php'</script>";
	else
		echo "<script>location='edit.php'</script>";
?>
