<?php
	include '../public/common/acl.inc.php';
	include '../../public/common/config.inc.php';
	$name=$_POST['name'];
	$shopclass_id=$_POST['shopclass_id'];

	$sqlBrand="insert into brand(name, shopclass_id) values('$name', '$shopclass_id');";
	if(mysql_query($sqlBrand))
		echo "<script>location='index.php'</script>";
	else
		echo "<script>location='add.php'</script>";
?>
