<?php 
	include '../public/common/acl.inc.php';
	include '../../public/common/config.inc.php';

	$length=10;
	$page=$_GET['p']?$_GET['p']:1;
	$offset=($page-1)*$length;

	$sqlCount="select count(*) from brand, shopclass where brand.shopclass_id=shopclass.id;";
	$resultCount=mysql_query($sqlCount);
	$rowCount=mysql_fetch_row($resultCount);
	$total=$rowCount[0];

	$totpage=ceil($total/$length);
	$prevpage=$page-1;

	if($page>=$totpage) $nextpage=$totpage;
	else $nextpage=$page+1;

	$sqlBrandShopclass="select brand.*, shopclass.name as sname from brand, shopclass where brand.shopclass_id=shopclass.id order by id limit {$offset}, {$length};";

	$resultBrandShopclass=mysql_query($sqlBrandShopclass);
?>

<!doctype html>
<html>
<head>
<title>index</title>
<link rel='stylesheet' type='text/css' href='../public/css/index.css' />
</head>
<body id='user'>
	<p><b>View Brands:</b></p>
	<table width='700px' border='1px' cellspacing='0'>
		<tr>
			<th>Brand</th>
			<th>Category</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php
			while($rowBrandShopclass=mysql_fetch_assoc($resultBrandShopclass)){
				echo "<tr>";
				echo "<td>{$rowBrandShopclass['name']}</td>";
				echo "<td>{$rowBrandShopclass['sname']}</td>";
				echo "<td><a href='edit.php?id={$rowBrandShopclass['id']}'>Edit</a></td>";
				echo "<td><a href='delete.php?id={$rowBrandShopclass['id']}'>Delete</a></td>";
				echo "</tr>";
			}
		?>
	</table>
	<br/>
	<?php
		echo "<a href='index.php?p=1'>First Page</a> | <a href='index.php?p={$prevpage}'>Previous Page</a> | <a href='index.php?p={$nextpage}'>Next Page</a> ";
		echo "| <a href='index.php?p={$totpage}'>Last Page</a> | Current:$page/$totpage | Total:$totpage Page(s)";
	?>
</body>
</html>
