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
<div class='registerform'>
<form action='../login/checkreg.php' method='post'>
	<fieldset>
		<legend>MyShop Member Registration</legend>
		<label>Username:<input class='text' type="text" name="username"></label>
		<label>Password:<input class='text' type="password" name="password"></label>
		<label>Confirm Password:<input class='text' type="password" name="repassword"></label>
		<label><img src="verify.php" style="cursor:pointer" onclick="this.src='verify.php?rand='+Math.random()"></label>
		<label>Validation Code:<input class='text' type="text" name="fcode"></label>
		<label>
			<?php
				if($_SESSION['reghttpref'])
					echo "<input type='hidden' name='httpref' value='{$_SESSION['reghttpref']}'>";
			 	else
					echo "<input type='hidden' name='httpref' value='{$_SERVER['HTTP_REFERER']}'>";
			?>
			<input type="submit" name="register" value="Register"><input type="reset" name="reset" value="Reset">
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

