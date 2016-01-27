<!doctype html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='../style/admin.css' />
<script src='../js/admin_nav.js'></script>
</head>
<body id='main'>

<div class="map">Manage Content &gt;&gt; Website Navigation &gt;&gt; <strong id='title'>{$title}</strong></div>

<ol>
	<li><a href='nav.php?action=show' class='selected'>Navigation List</a></li>
	<li><a href='nav.php?action=add'>Add New Navigation</a></li>

	{if $update}
		<li><a href='nav.php?action=update&id={$id}'>Update Existing Navigation</a></li>
	{/if}

	{if $addchild}
		<li><a href='nav.php?action=addchild&id={$id}'>Add New Subclass</a></li>
	{/if}

	{if $showchild}
		<li><a href='nav.php?action=showchild&id={$id}'>View Existing Subclass</a></li>
	{/if}
</ol>

{if $show}
<form method='post' action='nav.php?action=sort'>
<table cellspacing='0'>
 <tr><th>No.</th><th>Navigation Name</th><th>Navigation Info</th><th>Sub Class</th><th>Options</th><th>Sort</th></tr>
 {if $AllNav}
 {foreach $AllNav(key, value)}
 <tr>
  <td><script>document.write({@key+1}+{$num})</script></td>
  <td>{@value->nav_name}</td>
  <td>{@value->nav_info}</td>
  <td><a href='nav.php?action=showchild&id={@value->id}'>View</a> | <a href='nav.php?action=addchild&id={@value->id}'>Add Sub Class</a></td>
  <td><a href='nav.php?action=update&id={@value->id}'>Edit</a> | <a href='nav.php?action=delete&id={@value->id}' onclick="return confirm('Are you sure')?true:false">Delete</a></td>
  <td><input type='text' name='sort[{@value->id}]' value="{@value->sort}" class="text sort" /></td>
 </tr>
 {/foreach}
 {else}
  <tr><td colspan='6'>No data</td></tr>
 {/if}
  <tr><td></td><td></td><td></td><td></td><td></td><td><input type='submit' name='send' value='sort' style="cursor:pointer"/></td></tr>
</table>
</form>
<div id='page'>{$page}</div>
{/if}

{if $showchild}
<form method='post' action='nav.php?action=sort'>
<table cellspacing='0'>
 <tr><th>No.</th><th>Navigation Name</th><th>Level Info</th><th>Options</th><th>Sort</th></tr>
 {if $AllChildNav}
 {foreach $AllChildNav(key, value)}
 <tr>
  <td><script>document.write({@key+1}+{$num})</script></td>
  <td>{@value->nav_name}</td>
  <td>{@value->nav_info}</td>
  <td><a href='nav.php?action=update&id={@value->id}'>Edit</a> | <a href='nav.php?action=delete&id={@value->id}' onclick="return confirm('Are you sure')?true:false">Delete</a></td>
  <td><input type='text' name='sort[{@value->id}]' value="{@value->sort}" class="text sort" /></td>
 </tr>
 {/foreach}
 {else}
  <tr><td colspan='5'>No data</td></tr>
 {/if}
  <tr><td></td><td></td><td></td><td></td><td><input type='submit' name='send' value='sort' style="cursor:pointer"/></td></tr>
  <tr><td colspan='5'>This Sub-class belongs to: <strong>{$prev_name}</strong> [ <a href='nav.php?action=addchild&id={$id}'>continue adding this sub-class</a> ] [<a href='{$prev_url}'>Return to List</a>]</td></tr>
</table>
</form>
<div id='page'>{$page}</div>
{/if}

{if $add}
<form method='post' name='add'>
 <input type='hidden' value='0' name='pid' />
 <table cellspacing='0' class='left'>
  <tr><td>Navigation Name:</td><td><input type='text' name='nav_name' class='text' />(* navigation name more than 2 less than 20)</td></tr>
  <tr><td>Navigation Info:</td><td><textarea name='nav_info'></textarea>(* navigation info less than 200)</td></tr>
  <tr><td><input type='submit' name='send' value='Add New Navigation' onclick='return checkForm();' class='submit nav'/> </td><td>[<a href='{$prev_url}'>Return to List</a>] </td></tr>
 </table>
</form>
{/if}

{if $addchild}
<form method='post' name='add'>
 <input type='hidden' value='{$id}' name='pid' />
 <table cellspacing='0' class='left'>
  <tr><td>Upper Class:<strong>{$prev_name}</strong></td></tr>
  <tr><td>Navigation Name:</td><td><input type='text' name='nav_name' class='text' />(* navigation name more than 2 less than 20)</td></tr>
  <tr><td>Navigation Info:</td><td><textarea name='nav_info'></textarea>(* navigation info less than 200)</td></tr>
  <tr><td><input type='submit' name='send' value='Add New Subclass' onclick='return checkForm();' class='submit nav'/> </td><td>[<a href='{$prev_url}'>Return to List</a>] </td></tr>
 </table>
</form>
{/if}

{if $update}
<form method='post' name='update'>
 <input type='hidden' value='{$prev_url}' name='prev_url' />
 <input type='hidden' value='{$id}' name='id' />
 <table cellspacing='0' class='left'>
  <tr><td>Navigation Name:</td><td><input type='text' name='nav_name' value='{$nav_name}' class='text' /></td></tr>
  <tr><td>Navigation Info:</td><td><textarea name='nav_info'>{$nav_info}</textarea>(* navigation info less than 200)</td></tr>
  <tr><td><input type='submit' name='send' value='Update' class='submit nav' /> </td><td>[<a href='{$prev_url}'>Return to List</a>] </td></tr>
 </table>
</form>
{/if}

</body>
</html>
