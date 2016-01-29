<?php
	include '../public/common/acl.inc.php';
	include '../../public/common/config.inc.php';

	$id=$_GET['id'];
	$sqlOrders="select * from orders where id={$id};";
	$rstOrders=mysql_query($sqlOrders);
	$rowOrders=mysql_fetch_assoc($rstOrders);

	$sqlOrderstat="select * from orderstat order by id;";
	$rstOrderstat=mysql_query($sqlOrderstat);
?>

<!doctype html>
<html>
<head>
</head>
<body>
<p><b>Edit Order Status</b></p>
<form action="update.php" method="post">
	<table border='1px' cellspacing='0'>
		<tr>
			<td>Order No.:</td>
			<td><input type="text" name="name" value='<?php echo $rowOrders['code']?>' disabled></td>
		</tr>
		<tr>
			<td>Order Status:</td>
			<td>
				<select name="orderstat_id" style="width:150px">
					<option>--Select Category--</option>
					<?php
						while($rowOrderstat=mysql_fetch_assoc($rstOrderstat)) {
							if($rowOrders['orderstat_id']==$rowOrderstat['id'])
								echo "<option selected value='{$rowOrderstat['id']}'>{$rowOrderstat['name']}</option>";
							else
								echo "<option value='{$rowOrderstat['id']}'>{$rowOrderstat['name']}</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<input type="hidden" name='id' value='<?php echo $id ?>'>
			<td><input type="submit" value='Edit'></td>
			<td><input type="reset" value="Reset"></td>
		</tr>
	</table>
</form>
</body>
</html>
