<?php
	include '../../public/common/config.inc.php';

	session_start();

	$shop_id=$_GET['shop_id'];
	$sqlShop="select * from shop where id=$shop_id order by id;";
	$rstShop=mysql_query($sqlShop);
	$rowShop=mysql_fetch_assoc($rstShop);

	$_SESSION['shops'][$shop_id]=$rowShop;
	$_SESSION['shops'][$shop_id]['num']=1;

	echo "<script>location='index.php'</script>";
?>
