<?php
	include '../public/common/acl.inc.php';
	include '../../public/common/config.inc.php';

	$name=$_POST['name'];
	$sql="insert into orderstat(name) values ('{$name}')";

	if(mysql_query($sql))
		echo "<script>location='index.php'</script>";
	else
		echo "<script>location='add.php'</script>";
?>
