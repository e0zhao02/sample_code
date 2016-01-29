<?php
	session_start();
?>

<!doctype html>
<html>
<head>
<link href="../public/css/index.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id='main'>
<?php include '../public/header.php' ?>
<div class='nav'></div>
<div id='content'>
<div class='title'></div>
<div class='loginform'>
<form action='../login/checklogin.php' method='post'>
	<fieldset>
		<legend>MyShop Member Login</legend>
		<label>Username:<input class='text' type="text" name="username"></label>
		<label>Password:<input class='text' type="password" name="password"></label>
		<label>
		<?php
			if($_SESSION['httpref'])
				echo "<input type='hidden' name='httpref' value='{$_SESSION['httpref']}'>";
			else
				echo "<input type='hidden' name='httpref' value='{$_SERVER['HTTP_REFERER']}'>";
		?>
			<input class='submit' type="submit" name="submit" value="Login"><input class='submit' type="reset" name="reset" value="Reset">
		</label>
	</fieldset>
</form>
</div>
<div class='title'></div>
</div>
<div class='nav'></div>
<?php include '../public/footer.php' ?>
</div>
</body>
</html>
