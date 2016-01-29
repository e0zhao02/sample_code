<?php
	session_start();

	$shop_id=$_GET['shop_id'];
	$action=$_GET['action'];

	switch($action) {
		case 'delete':
			unset($_SESSION['shops'][$shop_id]);
			break;
		case 'inc':
			if($_SESSION['shops'][$shop_id]['num']>=$_SESSION['shops'][$shop_id][stock])
				$_SESSION['shops'][$shop_id]['num']=$_SESSION['shops'][$shop_id][stock];
			else
				$_SESSION['shops'][$shop_id]['num']++;
			break;
		case 'dec':
			if($_SESSION['shops'][$shop_id]['num']<=1)
				$_SESSION['shops'][$shop_id]['num']=1;
			else
				$_SESSION['shops'][$shop_id]['num']--;
			break;
	}

	echo "<script>location='index.php'</script>";
?>
