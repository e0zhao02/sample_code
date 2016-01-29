<?php
	session_start();
	include '../../public/common/config.inc.php';

	$shops=$_SESSION['shops'];
?>

<!doctype html>
<html>
<head>
<link rel='stylesheet' href='../public/css/index.css' type='text/css'>
</head>
<body>
<div id='main'>
	<?php include '../public/header.php'; ?>
	<div class='nav'></div>
	<div id='content'>
		<div class='shopclass'>
			<div class='title'>
				<span class='brandlist'><a href='../index.php'>Home</a> >> My Shopping: <?=$rowShop['name']?></span>
			</div>
			<div class='shopinfo'>
				<table width='960px' border='1px' cellspacing='0'>
					<tr>
						<th>Product</th>
						<th>Picture</th>
						<th>Price</th>
						<th>Num</th>
						<th>Total</th>
						<th>Remove</th>
					</tr>
					<?php
						$tot=0;
						if(isset($_SESSION['shops'])){
							foreach($_SESSION['shops'] as $shop){
								echo "<tr>";
								echo "<td>{$shop['name']}</td>";
								echo "<td><img src='../../public/uploads/s_{$shop['image']}'></td>";
								echo "<td>{$shop['price']}</td>";
								echo "<td><a href='opcart.php?action=dec&shop_id={$shop['id']}'><button>-</button></a> ";
								echo "{$shop['num']} ";
								echo "<a href='opcart.php?action=inc&shop_id={$shop['id']}'><button>+</button></a></td>";
								echo "<td>".$shop['price']*$shop['num']."</td>";
								echo "<td><a href='opcart.php?shop_id={$shop['id']}&action=delete'>Remove</a></td>";
								echo "</tr>";
								$tot+=$shop['price']*$shop['num'];
							}
						}
					?>
					<tr>
						<td style="color:#0ff">Total:</td>
						<td colspan="2">$<?=$tot?></td>
						<td colspan='3'><a href='clearcart.php'>Clear Shopping Cart</a></td>
					</tr>
				</table>
			</div>
		</div>

		<?php
			if(!$_SESSION['login']) {
				echo "<div>";
					echo "<div class='title'>";
						echo "<span>Please <a href='/myShop/home/login/index.php' style='color:#00f;'>log in</a> first</span>";
					echo "</div>";
				echo "</div>";
			} else {
		?>

		<div class='shopclass'>
			<div class='title'><span>Contact Info:</span></div>
			<div class='orders'>
				<form action='../ordercommit.php' method='post'>
				<table width='980px' border='1px' cellspacing='0'>
					<tr>
						<td>Choose:</td>
						<td>Name</td>
						<td>Address</td>
						<td>Telephone</td>
						<td>Email</td>
						<td>Edit</td>
						<td>Delete</td>
					</tr>
					<?php
						$sqlRel="select * from contact where user_id={$_SESSION['user_id']};";
						$rstRel=mysql_query($sqlRel);
						while($rowRel=mysql_fetch_assoc($rstRel)) {
							echo "<tr>";
							if($i++<1)
								echo "<td><input type='radio' name='addchk' checked value='{$rowRel['id']}'></td>";
							else
								echo "<td><input type='radio' name='addchk' value='{$rowRel['id']}'></td>";
							echo "<td></td>";
							echo "<td>{$rowRel['realname']}</td>";
							echo "<td>{$rowRel['address']}</td>";
							echo "<td>{$rowRel['telephone']}</td>";
							echo "<td>{$rowRel['email']}</td>";
							echo "<td><a href='edit.php?id={$rowRel['id']}'>Edit</a></td>";
							echo "<td><a href='delete.php?id={$rowRel['id']}'>Delete<a></td>";
							echo "</tr>";
						}
					?>
					<tr>
						<td colspan='6'><input type='submit' value='Submit Order' style='background:#0ff'></td>
					</tr>
				</table>
				</form>
			</div>
		</div>
		<?php } ?>
	</div>
	<div class='nav'></div>
	<?php include '../public/footer.php'; ?>
</div>
</body>
</html>
