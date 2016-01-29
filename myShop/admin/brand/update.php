<?php
	include '../public/common/acl.inc.php';
	include '../../public/common/config.inc.php';
	$name=$_POST['name'];
	$id=$_POST['id'];
	$shopclass_id=$_POST['shopclass_id'];

	$sqlBrand="update brand set name='{$name}', shopclass_id={$shopclass_id} where id={$id};";
	if(mysql_query($sqlBrand))
		echo "<script>location='index.php'</script>";
	else
		echo "<script>location='edit.php'</script>";
?>
