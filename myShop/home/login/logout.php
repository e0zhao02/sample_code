<?php
	session_start();

	$httpref=$_SERVER[HTTP_REFERER];
	unset($_SESSION['user_id']);
	unset($_SESSION['username']);
	unset($_SESSION['login']);

	echo "<script>location='{$httpref}'</script>";
?>
