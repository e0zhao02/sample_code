<!doctype html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='../style/admin.css' />
<script src='../js/admin_manage.js'></script>
</head>
<body id='main'>

<div class="map">Manage Home &gt;&gt; For Administrator &gt;&gt; <strong id='title'>{$title}</strong></div>

<ol>
	<li><a href='manage.php?action=show' class='selected'>Administrator List</a></li>
	<li><a href='manage.php?action=add'>Add New Administrator</a></li>

	{if $update}
		<li><a href='manage.php?action=update&id={$id}'>Update Existing Administrator</a></li>
	{/if}
</ol>

{if $show}
<table cellspacing='0'>
 <tr><th>No.</th><th>Username</th><th>Level</th><th>Login Counts</th><th>Last Login IP</th><th>Last Login Time</th><th>Options</th></tr>
 {if $AllManage}
 {foreach $AllManage(key, value)}
 <tr>
  <td><script>document.write({@key+1}+{$num});</script></td>
  <td>{@value->admin_user}</td>
  <td>{@value->level_name}</td>
  <td>{@value->login_count}</td>
  <td>{@value->last_ip}</td>
  <td>{@value->last_time}</td>
  <td><a href='manage.php?action=update&id={@value->id}'>Edit</a> | <a href='manage.php?action=delete&id={@value->id}' onclick="return confirm('Are you sure')?true:false">Delete</a></td>
 </tr>
 {/foreach}
 {else}
  <tr><td colspan='7'>No data</td></tr>
 {/if}
</table>
<div id='page'>{$page}</div>
{/if}

{if $add}
<form method='post' name='add'>
 <table cellspacing='0' class='left'>
  <tr><td>Username: </td><td><input type='text' name='admin_user' class='text' />(* not less than 2 more than 20)</td></tr>
  <tr><td>Password: </td><td><input type='password' name='admin_pass' class='text' />(* not less than 6)</td></tr>
  <tr><td>Confirm Password: </td><td><input type='password' name='admin_notpass' class='text' />(* must be the same)</td></tr>
  <tr><td>Level:</td><td><select name='level'>
		 {foreach $AllLevel(key, value)}
		  <option value="{@value->id}">{@value->level_name}</option>
		 {/foreach}
		</select>
  </td></tr>
  <tr><td><input type='submit' name='send' value='Add New Manager' onclick="return checkAddForm();" class='submit' /> </td><td>[<a href='{$prev_url}'>Return to list</a>] </td></tr>
</form>
{/if}

{if $update}
<form method='post' name='update'>
 <input type='hidden' value='{$id}' name='id' />
 <input type='hidden' value='{$level}' id='level' />
 <input type='hidden' value='{$admin_pass}' name='pass' />
 <input type='hidden' value='{$prev_url}' name='prev_url' />
 <table cellspacing='0' class='left'>
  <tr><td>Username: </td><td><input type='text' name='admin_user' value={$admin_user} class='text' disabled='disabled' /></td></tr>
  <tr><td>Password: </td><td><input type='password' name='admin_pass' class='text' />(* password no change if leave blank)</td></tr>
  <tr><td>Level:</td><td><select name='level'>
		 {foreach $AllLevel(key, value)}
		  <option value="{@value->id}">{@value->level_name}</option>
		 {/foreach}
		</select>
  </td></tr>
  <tr><td></td><td><input type='submit' name='send' value='Update' onclick='return checkUpdateForm();' class='submit' /> [<a href='{$prev_url}'>Return to list</a>] </td></tr>
</form>
{/if}

</body>
</html>
