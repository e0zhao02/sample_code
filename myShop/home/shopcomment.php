<?php
	session_start();

	include '../public/common/config.inc.php';

	$shopclass_id=$_POST['shopclass_id'];
	$content=$_POST['content'];
	$user_id=$_SESSION['user_id'];
	$shop_id=$_POST['shop_id'];
	$ctime=time();

	$sqlComment="insert into comment(content, user_id, shop_id, ctime) values('$content', $user_id, $shop_id, $ctime);";
	if(mysql_query($sqlComment))
		echo "<script>location='shopinfo.php?shopclass_id={$shopclass_id}&shop_id={$shop_id}'</script>";
?>
