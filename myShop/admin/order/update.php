<?php
	include '../public/common/acl.inc.php';
	include '../../public/common/config.inc.php';

	$code=$_POST['code'];
	$orderstat_id=$_POST['orderstat_id'];
	$id=$_POST['id'];

	$sqlOrders="update orders set orderstat_id={$orderstat_id} where id={$id};";

	if(mysql_query($sqlOrders))
		echo "<script>location='index.php'</script>";
	else
		echo "<script>location='edit.php'</script>";
?>
