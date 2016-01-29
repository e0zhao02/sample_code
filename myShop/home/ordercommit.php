<?php
	session_start();
	include '../public/common/config.inc.php';

	$relation_id=$_POST['addchk'];
	$code=substr(time().mt_rand(), 5, 10);
	$time=time();
	$orderstat_id=1;
	$user_id=$_SESSION['user_id'];

	foreach($_SESSION['shops'] as $shop) {
		$sqlOrders="insert into orders(code,user_id,shop_id,num,price,time,orderstat_id,contact_id) values('{$code}','{$user_id}','{$shop['id']}','{$shop['num']}','{$shop['price']}','{$time}','{$orderstat_id}','{$relation_id}')";
		mysql_query($sqlOrders);
	}

	unset($_SESSION['shops']);
	echo "<script>location='person/myorder.php'</script>";
?>
