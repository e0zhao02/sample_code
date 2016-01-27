<!doctype html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='../style/admin.css' />
<script src='../js/admin_manage.js'></script>
</head>
<body id='main'>

<div class="map">Manage Home &gt;&gt; For Administrator &gt;&gt; <strong id='title'><?=$this->_vars['title']?></strong></div>

<ol>
	<li><a href='manage.php?action=show' class='selected'>Administrator List</a></li>
	<li><a href='manage.php?action=add'>Add New Administrator</a></li>

	<?php if($this->_vars['update']) { ?>
		<li><a href='manage.php?action=update&id=<?=$this->_vars['id']?>'>Update Existing Administrator</a></li>
	<?php } ?>
</ol>

<?php if($this->_vars['show']) { ?>
<table cellspacing='0'>
 <tr><th>No.</th><th>Username</th><th>Level</th><th>Login Counts</th><th>Last Login IP</th><th>Last Login Time</th><th>Options</th></tr>
 <?php if($this->_vars['AllManage']) { ?>
 <?php foreach($this->_vars['AllManage'] as $key=>$value) { ?>
 <tr>
  <td><script>document.write(<?php echo $key+1 ?>+<?=$this->_vars['num']?>);</script></td>
  <td><?php echo $value->admin_user ?></td>
  <td><?php echo $value->level_name ?></td>
  <td><?php echo $value->login_count ?></td>
  <td><?php echo $value->last_ip ?></td>
  <td><?php echo $value->last_time ?></td>
  <td><a href='manage.php?action=update&id=<?php echo $value->id ?>'>Edit</a> | <a href='manage.php?action=delete&id=<?php echo $value->id ?>' onclick="return confirm('Are you sure')?true:false">Delete</a></td>
 </tr>
 <?php } ?>
 <?php } else { ?>
  <tr><td colspan='7'>No data</td></tr>
 <?php } ?>
</table>
<div id='page'><?=$this->_vars['page']?></div>
<?php } ?>

<?php if($this->_vars['add']) { ?>
<form method='post' name='add'>
 <table cellspacing='0' class='left'>
  <tr><td>Username: </td><td><input type='text' name='admin_user' class='text' />(* not less than 2 more than 20)</td></tr>
  <tr><td>Password: </td><td><input type='password' name='admin_pass' class='text' />(* not less than 6)</td></tr>
  <tr><td>Confirm Password: </td><td><input type='password' name='admin_notpass' class='text' />(* must be the same)</td></tr>
  <tr><td>Level:</td><td><select name='level'>
		 <?php foreach($this->_vars['AllLevel'] as $key=>$value) { ?>
		  <option value="<?php echo $value->id ?>"><?php echo $value->level_name ?></option>
		 <?php } ?>
		</select>
  </td></tr>
  <tr><td><input type='submit' name='send' value='Add New Manager' onclick="return checkAddForm();" class='submit' /> </td><td>[<a href='<?=$this->_vars['prev_url']?>'>Return to list</a>] </td></tr>
</form>
<?php } ?>

<?php if($this->_vars['update']) { ?>
<form method='post' name='update'>
 <input type='hidden' value='<?=$this->_vars['id']?>' name='id' />
 <input type='hidden' value='<?=$this->_vars['level']?>' id='level' />
 <input type='hidden' value='<?=$this->_vars['admin_pass']?>' name='pass' />
 <input type='hidden' value='<?=$this->_vars['prev_url']?>' name='prev_url' />
 <table cellspacing='0' class='left'>
  <tr><td>Username: </td><td><input type='text' name='admin_user' value=<?=$this->_vars['admin_user']?> class='text' disabled='disabled' /></td></tr>
  <tr><td>Password: </td><td><input type='password' name='admin_pass' class='text' />(* password no change if leave blank)</td></tr>
  <tr><td>Level:</td><td><select name='level'>
		 <?php foreach($this->_vars['AllLevel'] as $key=>$value) { ?>
		  <option value="<?php echo $value->id ?>"><?php echo $value->level_name ?></option>
		 <?php } ?>
		</select>
  </td></tr>
  <tr><td></td><td><input type='submit' name='send' value='Update' onclick='return checkUpdateForm();' class='submit' /> [<a href='<?=$this->_vars['prev_url']?>'>Return to list</a>] </td></tr>
</form>
<?php } ?>

</body>
</html>
