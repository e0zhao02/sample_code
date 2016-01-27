<!doctype html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='../style/admin.css' />
<script src='../js/admin_nav.js'></script>
</head>
<body id='main'>

<div class="map">Manage Content &gt;&gt; Website Navigation &gt;&gt; <strong id='title'><?=$this->_vars['title']?></strong></div>

<ol>
	<li><a href='nav.php?action=show' class='selected'>Navigation List</a></li>
	<li><a href='nav.php?action=add'>Add New Navigation</a></li>

	<?php if($this->_vars['update']) { ?>
		<li><a href='nav.php?action=update&id=<?=$this->_vars['id']?>'>Update Existing Navigation</a></li>
	<?php } ?>

	<?php if($this->_vars['addchild']) { ?>
		<li><a href='nav.php?action=addchild&id=<?=$this->_vars['id']?>'>Add New Subclass</a></li>
	<?php } ?>

	<?php if($this->_vars['showchild']) { ?>
		<li><a href='nav.php?action=showchild&id=<?=$this->_vars['id']?>'>View Existing Subclass</a></li>
	<?php } ?>
</ol>

<?php if($this->_vars['show']) { ?>
<form method='post' action='nav.php?action=sort'>
<table cellspacing='0'>
 <tr><th>No.</th><th>Navigation Name</th><th>Navigation Info</th><th>Sub Class</th><th>Options</th><th>Sort</th></tr>
 <?php if($this->_vars['AllNav']) { ?>
 <?php foreach($this->_vars['AllNav'] as $key=>$value) { ?>
 <tr>
  <td><script>document.write(<?php echo $key+1 ?>+<?=$this->_vars['num']?>)</script></td>
  <td><?php echo $value->nav_name ?></td>
  <td><?php echo $value->nav_info ?></td>
  <td><a href='nav.php?action=showchild&id=<?php echo $value->id ?>'>View</a> | <a href='nav.php?action=addchild&id=<?php echo $value->id ?>'>Add Sub Class</a></td>
  <td><a href='nav.php?action=update&id=<?php echo $value->id ?>'>Edit</a> | <a href='nav.php?action=delete&id=<?php echo $value->id ?>' onclick="return confirm('Are you sure')?true:false">Delete</a></td>
  <td><input type='text' name='sort[<?php echo $value->id ?>]' value="<?php echo $value->sort ?>" class="text sort" /></td>
 </tr>
 <?php } ?>
 <?php } else { ?>
  <tr><td colspan='6'>No data</td></tr>
 <?php } ?>
  <tr><td></td><td></td><td></td><td></td><td></td><td><input type='submit' name='send' value='sort' style="cursor:pointer"/></td></tr>
</table>
</form>
<div id='page'><?=$this->_vars['page']?></div>
<?php } ?>

<?php if($this->_vars['showchild']) { ?>
<form method='post' action='nav.php?action=sort'>
<table cellspacing='0'>
 <tr><th>No.</th><th>Navigation Name</th><th>Level Info</th><th>Options</th><th>Sort</th></tr>
 <?php if($this->_vars['AllChildNav']) { ?>
 <?php foreach($this->_vars['AllChildNav'] as $key=>$value) { ?>
 <tr>
  <td><script>document.write(<?php echo $key+1 ?>+<?=$this->_vars['num']?>)</script></td>
  <td><?php echo $value->nav_name ?></td>
  <td><?php echo $value->nav_info ?></td>
  <td><a href='nav.php?action=update&id=<?php echo $value->id ?>'>Edit</a> | <a href='nav.php?action=delete&id=<?php echo $value->id ?>' onclick="return confirm('Are you sure')?true:false">Delete</a></td>
  <td><input type='text' name='sort[<?php echo $value->id ?>]' value="<?php echo $value->sort ?>" class="text sort" /></td>
 </tr>
 <?php } ?>
 <?php } else { ?>
  <tr><td colspan='5'>No data</td></tr>
 <?php } ?>
  <tr><td></td><td></td><td></td><td></td><td><input type='submit' name='send' value='sort' style="cursor:pointer"/></td></tr>
  <tr><td colspan='5'>This Sub-class belongs to: <strong><?=$this->_vars['prev_name']?></strong> [ <a href='nav.php?action=addchild&id=<?=$this->_vars['id']?>'>continue adding this sub-class</a> ] [<a href='<?=$this->_vars['prev_url']?>'>Return to List</a>]</td></tr>
</table>
</form>
<div id='page'><?=$this->_vars['page']?></div>
<?php } ?>

<?php if($this->_vars['add']) { ?>
<form method='post' name='add'>
 <input type='hidden' value='0' name='pid' />
 <table cellspacing='0' class='left'>
  <tr><td>Navigation Name:</td><td><input type='text' name='nav_name' class='text' />(* navigation name more than 2 less than 20)</td></tr>
  <tr><td>Navigation Info:</td><td><textarea name='nav_info'></textarea>(* navigation info less than 200)</td></tr>
  <tr><td><input type='submit' name='send' value='Add New Navigation' onclick='return checkForm();' class='submit nav'/> </td><td>[<a href='<?=$this->_vars['prev_url']?>'>Return to List</a>] </td></tr>
 </table>
</form>
<?php } ?>

<?php if($this->_vars['addchild']) { ?>
<form method='post' name='add'>
 <input type='hidden' value='<?=$this->_vars['id']?>' name='pid' />
 <table cellspacing='0' class='left'>
  <tr><td>Upper Class:<strong><?=$this->_vars['prev_name']?></strong></td></tr>
  <tr><td>Navigation Name:</td><td><input type='text' name='nav_name' class='text' />(* navigation name more than 2 less than 20)</td></tr>
  <tr><td>Navigation Info:</td><td><textarea name='nav_info'></textarea>(* navigation info less than 200)</td></tr>
  <tr><td><input type='submit' name='send' value='Add New Subclass' onclick='return checkForm();' class='submit nav'/> </td><td>[<a href='<?=$this->_vars['prev_url']?>'>Return to List</a>] </td></tr>
 </table>
</form>
<?php } ?>

<?php if($this->_vars['update']) { ?>
<form method='post' name='update'>
 <input type='hidden' value='<?=$this->_vars['prev_url']?>' name='prev_url' />
 <input type='hidden' value='<?=$this->_vars['id']?>' name='id' />
 <table cellspacing='0' class='left'>
  <tr><td>Navigation Name:</td><td><input type='text' name='nav_name' value='<?=$this->_vars['nav_name']?>' class='text' /></td></tr>
  <tr><td>Navigation Info:</td><td><textarea name='nav_info'><?=$this->_vars['nav_info']?></textarea>(* navigation info less than 200)</td></tr>
  <tr><td><input type='submit' name='send' value='Update' class='submit nav' /> </td><td>[<a href='<?=$this->_vars['prev_url']?>'>Return to List</a>] </td></tr>
 </table>
</form>
<?php } ?>

</body>
</html>
