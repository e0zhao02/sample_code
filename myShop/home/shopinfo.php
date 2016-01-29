<?php
	session_start();
	include '../public/common/config.inc.php';

	$shopclass_id=$_GET['shopclass_id'];
	$sqlShop="select * from shop where id={$_GET['shop_id']};";
	$rstShop=mysql_query($sqlShop);
	$rowShop=mysql_fetch_assoc($rstShop);
?>

<!doctype html>
<html>
<head>
<link rel='stylesheet' href='public/css/index.css' type='text/css'>
</head>
<body>
<div id='main'>
	<?php include 'public/header.php'; ?>
	<div class='nav'></div>
	<div id='content'>
		<div class='shopclass'>
			<div class='title'>
				<span class='brandlist'><a href='brandlist.php?shopclass_id=<?=$shopclass_id?>'>Brand</a> >> Product Name: <?=$rowShop['name']?></span>
			</div>
			<div class='shopinfo'>
				<table width='978px' border='1px' cellspacing='0'>
					<tr>
						<th>Product</th>
						<th>Price</th>
						<th>Stock</th>
						<th>Add to Shopping Cart</th>
					</tr>
					<tr>
						<td><a href="../public/uploads/<?=$rowShop['image']?>" target='_blank'><img src='../public/uploads/s_<?=$rowShop['image']?>'></a></td>
						<td><?=$rowShop['price']?></td>
						<td><?=$rowShop['stock']?></td>
						<td><a href='cart/addcart.php?shop_id=<?=$rowShop['id']?>'>Shopping Cart</a></td>
					</tr>
				</table>
			</div>
		</div>

		<?php
			if($_SESSION['login']) {
		?>
				<div class='comment'>
				<div class='title'><span>Product Comments:</span></div>
				<form action='shopcomment.php' method="post">
					<textarea name='content' colos='30' rows='30'></textarea>
					<input type='hidden' name='shop_id' value='<?=$rowShop['id']?>'>
					<input type='hidden' name='shopclass_id' value='<?=$shopclass_id?>'>
					<p><input type='submit' value='Submit'></p>
				</form>
				</div>
		<?php
			} else {
		?>
			<div class='comment'><div class='title'><span>Product Comments:<a href='login/index.php'>Please Log in First!</a></span></div></div>
		<?php
			}
		?>

		<div class='showcomment'>
			<div class='title'><span>View Comments:</span></div>

			<?php
				$sqlComment="select comment.*, user.username from comment,user where comment.user_id=user.id and shop_id={$_GET['shop_id']} order by id desc;";
				$rstComment=mysql_query($sqlComment);
				while($rowComment=mysql_fetch_assoc($rstComment)) {
			?>
			<div class='commentarea'>
				<div class='comheader'>
					<span class='comleft'>Commentor: <?=$rowComment['username']?></span>
					<span class='comright'>Comment Time: <?=date('Y-m-d H:i:s', $rowComment['ctime'])?></span>
				</div>
				<div class='comcontent'>
					<?=$rowComment['content']?>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	<div class='nav'></div>
	<?php include 'public/footer.php'; ?>
</div>
</body>
</html>
