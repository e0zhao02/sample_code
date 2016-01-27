<!doctype html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='../style/admin.css' />
<script src='../js/admin_content.js'></script>
<script src='../ckeditor/ckeditor.js'></script>
</head>
<body id='main'>

<div class="map">Content Management &gt;&gt; View Articles &gt;&gt; <strong id='title'>{$title}</strong></div>

<ol>
	<li><a href='content.php?action=show' class='selected'>Article List</a></li>
	<li><a href='content.php?action=add'>Add New Article</a></li>

	{if $update}
		<li><a href='content.php?action=update&id={$id}'>Update Existing Article</a></li>
	{/if}
</ol>

{if $show}
<table cellspacing='0'>
 <tr><th>No.</th><th>Title</th><th>Attributes</th><th>Category</th><th>View Counts</th><th>Publish Time</th><th>Options</th></tr>
 {if $SearchContent}
 {foreach $SearchContent(key, value)}
 <tr>
  <td><script>document.write({@key+1}+{$num});</script></td>
  <td><a href="../details.php?id={@value->id}" title="{@value->t}" target="_blank">{@value->title}</a></td>
  <td>{@value->attr}</td>
  <td><a href='?action=show&nav={@value->nav}'>{@value->nav_name}</a></td>
  <td>{@value->count}</td>
  <td>{@value->date}</td>
  <td><a href='content.php?action=update&id={@value->id}'>Edit</a> | <a href='content.php?action=delete&id={@value->id}' onclick="return confirm('Are you sure')?true:false">Delete</a></td>
 </tr>
 {/foreach}
 {else}
  <tr><td colspan='7'>No data</td></tr>
 {/if}
</table>

<form action='?' method='get'>
<div id='page'>
 {$page}
 <input type='hidden' name='action' value='show' />
 <select name='nav' class='select'>
  <option value='0'>All By Default</option>
  {$nav}
 </select>
 <input value='Search' type='submit' />
</div>
</form>
{/if}

{if $add}
 <form name='content' method='post' action='?action=add'>
 <table cellspacing='0' class='content'>
  <tr><td colspan='2'><strong>Publish a New Article</strong></td></tr>
  <tr><td>Article Title: </td><td><input type='text' name='title' class='text' /><span class='red'>[required]</span>(2-50 characters)</td></tr>
  <tr><td>Channel: </td><td><select name='nav'><option value='' style='padding:0;'>Please select a channel</option>{$nav}</select><span class='red'>[required]</span></td></tr>
  <tr><td>Attributes:</td><td>
   <input type='checkbox' name='attr[]' value='top' />Top
   <input type='checkbox' name='attr[]' value='recommended' />Recommended
   <input type='checkbox' name='attr[]' value='bold' />Bold
   <input type='checkbox' name='attr[]' value='skip' />Skip
  </td></tr>
  <tr><td>TAG: </td><td><input type='text' name='tag' class='text' /></td></tr>
  <tr><td>Keyword: </td><td><input type='text' name='keyword' class='text' /></td></tr>
  <tr><td>Thumbnail: </td><td><input type='text' name='thumbnail' class='text' readonly='readonly' />
		     <input type='button' value='Upload Thumbnail' onclick="centerWindow('../templates/upfile.html', 'upfile', '400', '100')" />
		     <img name='pic' style='display:none' />
  </td></tr>
  <tr><td>Source: </td><td><input type='text' name='source' class='text' /></td></tr>
  <tr><td>Author: </td><td><input type='text' name='author' class='text' /></td></tr>
  <tr><td><span class='middle'>Abstract: </span></td><td><textarea name='info'></textarea></td></tr>
  <tr class='ckeditor'><td colspan='2'><textarea id='TextArea1' name='content' class='ckeditor'></textarea></td></tr>
  <tr><td>Comment Options: </td><td><input type='radio' name='commend' value='1' checked='checked' />Allow Comment<input type='radio' name='commend' value='0' />Forbid Comment
          &nbsp;&nbsp;&nbsp;View Count: <input type='text' name='count' value='0' class='text small' />
  </td></tr>
  <tr><td>Article Order: </td><td><select name='sort'>
				<option value='0'>Default</option>
				<option value='1'>Top One Day</option>
				<option value='2'>Top One Week</option>
				<option value='3'>Top One Month</option>
				<option value='4'>Top One Year</option>
			  </select>
          &nbsp;&nbsp;&nbsp;Coin: <input type='text' name='gold' value='0' class='text small' />
  </td></tr>
  <tr><td>Reading Privilege: </td><td><select name='readlimit'>
				<option value='0'>Open to Public</option>
				<option value='1'>Junior Member</option>
				<option value='2'>Middle Member</option>
				<option value='3'>Senior Member</option>
				<option value='4'>VIP Member</option>
			  </select>
	  Title Color:	  <select name='color'>
				<option>Default</option>
				<option value='red' style='color:red'>Red</option>
				<option value='blue' style='color:blue'>Blue</option>
				<option value='orange' style='color:orange'>Orange</option>
			  </select>
  </td></tr>
  <tr><td><input type='submit' name='send' value='publish' /></td><td>[<a href='{$prev_url}'>Return to List</a>]</td></tr>
  <tr><td></td></tr>
 </table>
 </form>
{/if}

{if $update}
 <form name='content' method='post' action='?action=update'>
 <input type='hidden' name='id' value="{$id}" />
 <input type='hidden' name='prev_url' value="{$prev_url}" />
 <table cellspacing='0' class='content'>
  <tr><td colspan='2'><strong>Edit an Existing Article</strong></td></tr>
  <tr><td>Article Title: </td><td><input type='text' name='title' value="{$titlec}" class='text' /><span class='red'>[required]</span>(2-50 characters)</td></tr>
  <tr><td>Channel: </td><td><select name='nav'><option value='' style='padding:0;'>Please select a channel</option>{$nav}</select><span class='red'>[required]</span></td></tr>
  <tr><td>Attributes: </td><td>{$attr}</td></tr>
  <tr><td>TAG: </td><td><input type='text' name='tag' value="{$tag}" class='text' /></td></tr>
  <tr><td>Keyword: </td><td><input type='text' name='keyword' value="{$keyword}" class='text' /></td></tr>
  <tr><td>Thumbnail: </td><td><input type='text' name='thumbnail' value="{$thumbnail}" class='text' readonly='readonly' />
		     <input type='button' value='Upload Thumbnail' onclick="centerWindow('../templates/upfile.html', 'upfile', '400', '100')" /></td></tr>
  <tr><td></td><td><img name='pic' src="{$thumbnail}" style='display:block' /></td></tr>
  <tr><td>Source: </td><td><input type='text' name='source' value="{$source}" class='text' /></td></tr>
  <tr><td>Author: </td><td><input type='text' name='author' value="{$author}" class='text' /></td></tr>
  <tr><td><span class='middle'>Abstract: </span></td><td><textarea name='info'>{$info}</textarea></td></tr>
  <tr class='ckeditor'><td></td><td><textarea id='TextArea1' name='content' class='ckeditor'>{$content}</textarea></td></tr>
  <tr><td>Comment Options: </td><td>{$commend}&nbsp;&nbsp;&nbsp;View Count: <input type='text' name='count' value="{$count}" class='text small' /></td></tr>
  <tr><td>Article Order: </td><td><select name='sort'>{$sort}</select>&nbsp;&nbsp;&nbsp;Coin: <input type='text' name='gold' value='0' value="{$gold}" class='text small' /></td></tr>
  <tr><td>Reading Privilege: </td><td><select name='readlimit'>{$readlimit}</select>Title Color:<select name='color'>{$color}</select></td></tr>
  <tr><td><input type='submit' name='send' value='update' /></td><td>[<a href='{$prev_url}'>Return to List</a>]</td></tr>
  <tr><td></td></tr>
 </table>
 </form>
{/if}

</body>
</html>
