<?php
	session_start();
	include '../../public/common/config.inc.php';

	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$repassword=md5($_POST['repassword']);
	$fcode=strtolower($_POST['fcode']);
	$scode=strtolower($_SESSION['scode']);
	$regtime=time();
	$httpref=$_POST['httpref'];

	if($fcode==$scode){
		if($password==$repassword) {
			$sqlUser="insert into user(username, password, regtime) values('$username', '$password', '$regtime');";
			if(mysql_query($sqlUser)) {
				$user_id=mysql_insert_id();
				$_SESSION['user_id']=$user_id;
				$_SESSION['username']=$username;
				$_SESSION['login']=1;

				unset($_SESSION['reghttpref']);
				echo "<script>location='{$httpref}'</script>";
			}
		}
		else {
			$_SESSION['reghttpref']=$httpref;
			echo "<script>location='register.php'</script>";
		}
	}
	else {
		$_SESSION['reghttpref']=$httpref;
		echo "<script>location='register.php'</script>";
	}
?>
