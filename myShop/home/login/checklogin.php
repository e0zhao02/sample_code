<?php
	session_start();

	include '../../public/common/config.inc.php';

	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$httpref=$_POST['httpref'];

	$sqlUser="select * from user where username='$username' and password='$password';";
	$rstUser=mysql_query($sqlUser);
	$rowUser=mysql_fetch_assoc($rstUser);

	if(mysql_num_rows($rstUser)){
		$_SESSION['user_id']=$rowUser['id'];
		$_SESSION['username']=$username;
		$_SESSION['login']=1;
		$_SESSION['admin']=$rowUser['admin'];

		unset($_SESSION['httpref']);
		echo "<script>location='{$httpref}'</script>";
	}
	else {
		$_SESSION['httpref']=$httpref;
		echo "<script>location='index.php'</script>";
	}
?>
