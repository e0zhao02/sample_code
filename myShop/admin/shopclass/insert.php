<?php
	include '../public/common/acl.inc.php';
	include '../../public/common/config.inc.php';
	$name=$_POST['name'];

	$sqlUser="insert into shopclass(name) values('$name');";
	if(mysql_query($sqlUser))
		echo "<script>location='index.php'</script>";
	else
		echo "<script>location='add.php'</script>";
?>
