<!doctype html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='../style/admin.css' />
<script src='../js/admin_level.js'></script>
</head>
<body id='main'>

<div class="map">Manage Home &gt;&gt; For Level &gt;&gt; <strong id='title'><?=$this->_vars['title']?></strong></div>

<ol>
	<li><a href='level.php?action=show' class='selected'>Level List</a></li>
	<li><a href='level.php?action=add'>Add New Level</a></li>

	<?php if($this->_vars['update']) { ?>
		<li><a href='level.php?action=update&id=<?=$this->_vars['id']?>'>Update Existing Level</a></li>
	<?php } ?>
</ol>

<?php if($this->_vars['show']) { ?>
<table cellspacing='0'>
 <tr><th>No.</th><th>Level Name</th><th>Level Info</th><th>Options</th></tr>
 <?php if($this->_vars['AllLevel']) { ?>
 <?php foreach($this->_vars['AllLevel'] as $key=>$value) { ?>
 <tr>
  <td><script>document.write(<?php echo $key+1 ?>+<?=$this->_vars['num']?>)</script></td>
  <td><?php echo $value->level_name ?></td>
  <td><?php echo $value->level_info ?></td>
  <td><a href='level.php?action=update&id=<?php echo $value->id ?>'>Edit</a> | <a href='level.php?action=delete&id=<?php echo $value->id ?>' onclick="return confirm('Are you sure')?true:false">Delete</a></td>
 </tr>
 <?php } ?>
 <?php } else { ?>
  <tr><td colspan='4'>No Data</td></tr>
 <?php } ?>
</table>
<div id='page'><?=$this->_vars['page']?></div>
<?php } ?>

<?php if($this->_vars['add']) { ?>
<form method='post' name='add'>
 <table cellspacing='0' class='left'>
  <tr><td>Level Name: </td><td><input type='text' name='level_name' class='text' />(* level name more than 2 and less than 20)</td></tr>
  <tr><td>Level Info: </td><td><textarea name='level_info'></textarea></td></tr>
  <tr><td><input type='submit' name='send' value='Add New Level' onclick='return checkForm();' class='submit level' /> </td><td>[<a href='<?=$this->_vars['prev_url']?>'>Return to list</a>] </td></tr>
 </table>
</form>
<?php } ?>

<?php if($this->_vars['update']) { ?>
<form method='post' name='add'>
 <input type='hidden' value='<?=$this->_vars['id']?>' name='id' />
 <input type='hidden' value='<?=$this->_vars['prev_url']?>' name='prev_url' />
 <table cellspacing='0' class='left'>
  <tr><td>Level Name: </td><td><input type='text' name='level_name' value='<?=$this->_vars['level_name']?>' class='text' /></td></tr>
  <tr><td>Level Info: </td><td><textarea name='level_info'><?=$this->_vars['level_info']?></textarea></td></tr>
  <tr><td><input type='submit' name='send' value='Update' onclick='return checkForm();' class='submit level' /> </td><td>[<a href='<?=$this->_vars['prev_url']?>'>Return to list</a>] </td></tr>
 </table>
</form>
<?php } ?>

</body>
</html>
