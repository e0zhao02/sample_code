<!doctype html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='../style/admin.css' />
<script src='../js/admin_level.js'></script>
</head>
<body id='main'>

<div class="map">Manage Home &gt;&gt; For Level &gt;&gt; <strong id='title'>{$title}</strong></div>

<ol>
	<li><a href='level.php?action=show' class='selected'>Level List</a></li>
	<li><a href='level.php?action=add'>Add New Level</a></li>

	{if $update}
		<li><a href='level.php?action=update&id={$id}'>Update Existing Level</a></li>
	{/if}
</ol>

{if $show}
<table cellspacing='0'>
 <tr><th>No.</th><th>Level Name</th><th>Level Info</th><th>Options</th></tr>
 {if $AllLevel}
 {foreach $AllLevel(key, value)}
 <tr>
  <td><script>document.write({@key+1}+{$num})</script></td>
  <td>{@value->level_name}</td>
  <td>{@value->level_info}</td>
  <td><a href='level.php?action=update&id={@value->id}'>Edit</a> | <a href='level.php?action=delete&id={@value->id}' onclick="return confirm('Are you sure')?true:false">Delete</a></td>
 </tr>
 {/foreach}
 {else}
  <tr><td colspan='4'>No Data</td></tr>
 {/if}
</table>
<div id='page'>{$page}</div>
{/if}

{if $add}
<form method='post' name='add'>
 <table cellspacing='0' class='left'>
  <tr><td>Level Name: </td><td><input type='text' name='level_name' class='text' />(* level name more than 2 and less than 20)</td></tr>
  <tr><td>Level Info: </td><td><textarea name='level_info'></textarea></td></tr>
  <tr><td><input type='submit' name='send' value='Add New Level' onclick='return checkForm();' class='submit level' /> </td><td>[<a href='{$prev_url}'>Return to list</a>] </td></tr>
 </table>
</form>
{/if}

{if $update}
<form method='post' name='add'>
 <input type='hidden' value='{$id}' name='id' />
 <input type='hidden' value='{$prev_url}' name='prev_url' />
 <table cellspacing='0' class='left'>
  <tr><td>Level Name: </td><td><input type='text' name='level_name' value='{$level_name}' class='text' /></td></tr>
  <tr><td>Level Info: </td><td><textarea name='level_info'>{$level_info}</textarea></td></tr>
  <tr><td><input type='submit' name='send' value='Update' onclick='return checkForm();' class='submit level' /> </td><td>[<a href='{$prev_url}'>Return to list</a>] </td></tr>
 </table>
</form>
{/if}

</body>
</html>
