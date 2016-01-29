<?php
	session_start();

	include '../../public/common/config.inc.php';

	$username=$_POST['username'];
	$password=md5($_POST['password']);

	$sqlUser="select * from user where username='{$username}' and password='{$password}';";
	$rst=mysql_query($sqlUser);
	$row=mysql_fetch_assoc($rst);

	if(mysql_num_rows($rst)) {
		$_SESSION['username']=$username;
		$_SESSION['login']=1;
		$_SESSION['admin']=$row['admin'];

		if($_SESSION['login'] && $_SESSION['admin'])
			echo "<script>location='../index.php'</script>";
		else
			echo "<script>location='index.php'</script>";
	}
	else
		echo "<script>location='index.php'</script>";
?>
