<!doctype html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='../style/admin.css' />
<script src='../js/admin_user.js'></script>
</head>
<body id='main'>

<div class="map">Manage Home &gt;&gt; For Member &gt;&gt; <strong id='title'><?=$this->_vars['title']?></strong></div>

<ol>
	<li><a href='user.php?action=show' class='selected'>Member List</a></li>
	<li><a href='user.php?action=add'>Add New Member</a></li>

	<?php if($this->_vars['update']) { ?>
		<li><a href='user.php?action=update&id=<?=$this->_vars['id']?>'>Update Existing Member</a></li>
	<?php } ?>
</ol>

<?php if($this->_vars['show']) { ?>
<table cellspacing='0'>
 <tr><th>No.</th><th>Member Name</th><th>Email</th><th>Status</th><th>Options</th></tr>
 <?php if($this->_vars['AllUser']) { ?>
 <?php foreach($this->_vars['AllUser'] as $key=>$value) { ?>
 <tr>
  <td><script>document.write(<?php echo $key+1 ?>+<?=$this->_vars['num']?>)</script></td>
  <td><?php echo $value->user ?></td>
  <td><?php echo $value->email ?></td>
  <td><?php echo $value->state ?></td>
  <td><a href='user.php?action=update&id=<?php echo $value->id ?>'>Edit</a> | <a href='user.php?action=delete&id=<?php echo $value->id ?>' onclick="return confirm('Are you sure')?true:false">Delete</a></td>
 </tr>
 <?php } ?>
 <?php } else { ?>
  <tr><td colspan='5'>No Data</td></tr>
 <?php } ?>
</table>
<div id='page'><?=$this->_vars['page']?></div>
<?php } ?>

<?php if($this->_vars['add']) { ?>
<form method='post' name='reg'>
 <table cellspacing='0' class='user'>
   <tr><td>Username: </td><td><input type='text' class='text' name='user' /><span class='red'>[required]</span></td></tr>
   <tr><td>Password: </td><td><input type='password' class='text' name='pass' /><span class='red'>[required]</span></td></tr>
   <tr><td>Confirm Password: </td><td><input type='password' class='text' name='notpass' /><span class='red'>[required]</span></td></tr>
   <tr><td>Email: </td><td><input type='text' class='text' name='email' /><span class='red'>[required]</span></td></tr>
   <tr><td>Select Face: </td><td>
    <select name='face' onchange="sface();">
     <?php foreach($this->_vars['OptionFaceOne'] as $key=>$value) { ?>
     <option value='0<?php echo $value ?>.png'>0<?php echo $value ?>.png</option>
     <?php } ?>
     <?php foreach($this->_vars['OptionFaceTwo'] as $key=>$value) { ?>
     <option value='<?php echo $value ?>.png'><?php echo $value ?>.png</option>
     <?php } ?>
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
   <tr><td>State:</td><td><?=$this->_vars['state']?></td></tr>
   <tr><td></td><td><input type='submit' class='submit' name='send' value='register' /></td></tr>
 </table>
</form>
<?php } ?>

<?php if($this->_vars['update']) { ?>
<form method='post' name='reg'>
 <input type='hidden' value='<?=$this->_vars['id']?>' name='id' />
 <input type='hidden' value='<?=$this->_vars['pass']?>' name='ppass' />
 <input type='hidden' value='<?=$this->_vars['prev_url']?>' name='prev_url' />
 <table cellspacing='0' class='user'>
   <tr><td>Username: </td><td><?=$this->_vars['user']?></td></tr>
   <tr><td>Password: </td><td><input type='password' class='text' name='pass' />(* leave blank if no change)</td></tr>
   <tr><td>Email: </td><td><input type='text' class='text' value="<?=$this->_vars['email']?>" name='email' /><span class='red'>[required]</span></td></tr>
   <tr><td>Select Face: </td><td>
    <select name='face' onchange="sface();">
     <?=$this->_vars['face']?>
    </select>
   </td></tr>
   <tr><td></td><td><img name='faceimg' src='../images/<?=$this->_vars['facesrc']?>' class='face' /></td></tr>
   <tr><td>Security Question:</td><td> 
    <select name='question'>
     <option value=''>do not use security questions</option>
     <?=$this->_vars['question']?>
    </select>
   </td></tr>
   <tr><td>Security Question Answer: </td><td><input type='text' class='text' value="<?=$this->_vars['answer']?>" name='answer' /></td></tr>
   <tr><td>State:</td><td><?=$this->_vars['state']?></td></tr>
   <tr><td><input type='submit' class='submit' name='send' value='Update' /></td><td>[<a href="<?=$this->_vars['prev_url']?>">Return to Last Page</a>]</td></tr>
 </table>
</form>
<?php } ?>

</body>
</html>
