<!doctype html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='../style/admin.css' />
<script src='../js/admin_user.js'></script>
</head>
<body id='main'>

<div class="map">Manage Home &gt;&gt; For Member &gt;&gt; <strong id='title'>{$title}</strong></div>

<ol>
	<li><a href='user.php?action=show' class='selected'>Member List</a></li>
	<li><a href='user.php?action=add'>Add New Member</a></li>

	{if $update}
		<li><a href='user.php?action=update&id={$id}'>Update Existing Member</a></li>
	{/if}
</ol>

{if $show}
<table cellspacing='0'>
 <tr><th>No.</th><th>Member Name</th><th>Email</th><th>Status</th><th>Options</th></tr>
 {if $AllUser}
 {foreach $AllUser(key, value)}
 <tr>
  <td><script>document.write({@key+1}+{$num})</script></td>
  <td>{@value->user}</td>
  <td>{@value->email}</td>
  <td>{@value->state}</td>
  <td><a href='user.php?action=update&id={@value->id}'>Edit</a> | <a href='user.php?action=delete&id={@value->id}' onclick="return confirm('Are you sure')?true:false">Delete</a></td>
 </tr>
 {/foreach}
 {else}
  <tr><td colspan='5'>No Data</td></tr>
 {/if}
</table>
<div id='page'>{$page}</div>
{/if}

{if $add}
<form method='post' name='reg'>
 <table cellspacing='0' class='user'>
   <tr><td>Username: </td><td><input type='text' class='text' name='user' /><span class='red'>[required]</span></td></tr>
   <tr><td>Password: </td><td><input type='password' class='text' name='pass' /><span class='red'>[required]</span></td></tr>
   <tr><td>Confirm Password: </td><td><input type='password' class='text' name='notpass' /><span class='red'>[required]</span></td></tr>
   <tr><td>Email: </td><td><input type='text' class='text' name='email' /><span class='red'>[required]</span></td></tr>
   <tr><td>Select Face: </td><td>
    <select name='face' onchange="sface();">
     {foreach $OptionFaceOne(key, value)}
     <option value='0{@value}.png'>0{@value}.png</option>
     {/foreach}
     {foreach $OptionFaceTwo(key, value)}
     <option value='{@value}.png'>{@value}.png</option>
     {/foreach}
    </select>
   </td></tr>
   <tr><td></td><td><img name='faceimg' src='../images/01.png' class='face' /></td></tr>
   <tr><td>Security Question: </td><td>
    <select name='question'>
     <option value=''>do not use security questions</option>
     <option value="What's your father's name">What's your father's name</option>
     <option value="What's your mother's occupation">What's your mother's occupation</option>
     <option value="What's your spouse's sex">What's your spouse's sex</option>
    </select>
   </td></tr>
   <tr><td>Security Question Answer: </td><td><input type='text' class='text' name='answer' /></td></tr>
   <tr><td>State:</td><td>{$state}</td></tr>
   <tr><td></td><td><input type='submit' class='submit' name='send' value='register' /></td></tr>
 </table>
</form>
{/if}

{if $update}
<form method='post' name='reg'>
 <input type='hidden' value='{$id}' name='id' />
 <input type='hidden' value='{$pass}' name='ppass' />
 <input type='hidden' value='{$prev_url}' name='prev_url' />
 <table cellspacing='0' class='user'>
   <tr><td>Username: </td><td>{$user}</td></tr>
   <tr><td>Password: </td><td><input type='password' class='text' name='pass' />(* leave blank if no change)</td></tr>
   <tr><td>Email: </td><td><input type='text' class='text' value="{$email}" name='email' /><span class='red'>[required]</span></td></tr>
   <tr><td>Select Face: </td><td>
    <select name='face' onchange="sface();">
     {$face}
    </select>
   </td></tr>
   <tr><td></td><td><img name='faceimg' src='../images/{$facesrc}' class='face' /></td></tr>
   <tr><td>Security Question:</td><td> 
    <select name='question'>
     <option value=''>do not use security questions</option>
     {$question}
    </select>
   </td></tr>
   <tr><td>Security Question Answer: </td><td><input type='text' class='text' value="{$answer}" name='answer' /></td></tr>
   <tr><td>State:</td><td>{$state}</td></tr>
   <tr><td><input type='submit' class='submit' name='send' value='Update' /></td><td>[<a href="{$prev_url}">Return to Last Page</a>]</td></tr>
 </table>
</form>
{/if}

</body>
</html>
