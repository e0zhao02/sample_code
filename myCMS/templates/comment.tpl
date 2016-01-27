<!doctype html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='../style/admin.css' />
<script src='../js/admin_manage.js'></script>
</head>
<body id='main'>

<div class="map">Manage Home &gt;&gt; For Content &gt;&gt; <strong id='title'>{$title}</strong></div>

<ol>
	<li><a href='comment.php?action=show' class='selected'>Comment List</a></li>
</ol>

{if $show}
<form method='post' action="?action=states">
<table cellspacing='0'>
 <tr><th>No.</th><th>Comment</th><th>Commentor</th><th>Related Article</th><th>Censorship Status</th><th>Bulk Act</th><th>Options</th></tr>
 {if $CommentList}
 {foreach $CommentList(key, value)}
 <tr>
  <td><script>document.write({@key+1}+{$num});</script></td>
  <td title="{@value->full}">{@value->content}</td>
  <td>{@value->user}</td>
  <td><a href="../details.php?id={@value->cid}" target="_blank" title="{@value->title}">View</a></td>
  <td>{@value->state}</td>
  <td><input type="text" name="states[{@value->id}]" value="{@value->num}" class="text sort" /></td>
  <td><a href='comment.php?action=delete&id={@value->id}' onclick="return confirm('Are you sure')?true:false">Delete</a></td>
 </tr>
 {/foreach}
 <tr><td></td><td></td><td></td><td></td><td></td><td><input type='submit' name='send' value='bulk act' style='cursor:pointer' /></td></tr>
 {else}
  <tr><td colspan='7'>No data</td></tr>
 {/if}
</table>
</form>
<div id='page'>{$page}</div>
{/if}

</body>
</html>
