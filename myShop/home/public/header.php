<div id='header'>
        <img src="/myShop/home/public/images/logo.png" align='left'>
	<span class='hleft'>Y1-myshop[<a href='/myShop/home/index.php'>Shop Home</a>]</span>
	<span class='hright'>
	<?php
		if($_SESSION['login'])
			echo "Welcome <a href='/myShop/home/person/myorder.php' title='Personal Page'>{$_SESSION['username']}</a> | <a href='/myShop/home/login/logout.php'>Logout</a> | <a href='/myShop/home/cart/index.php'>Shopping Cart</a>";
		else
			echo "<a href='/myShop/home/login/index.php'>Login</a> | <a href='/myShop/home/login/register.php'>Register</a> | <a href='/myShop/home/cart/index.php'>Shopping Cart</a>";
	?>
	</span>
</div>
