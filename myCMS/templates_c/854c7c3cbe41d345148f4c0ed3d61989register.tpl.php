<!doctype html>
<html>
<head>
<title>My CMS</title>
<link rel="stylesheet" type="text/css" href="style/basic.css" />
<link rel="stylesheet" type="text/css" href="style/reg.css" />
<script type='text/javascript' src='js/reg.js'></script>
</head>
<body>

<?php $_tpl->create('header.tpl') ?>
<?php if($this->_vars['reg']) { ?>
<div id='reg'>
 <h2>Member Registration</h2>
 <form method='post' name='reg' action="?action=reg">
  <table>
   <tr><td>Username: </td><td><input type='text' class='text' name='user' /><span class='red'>[required]</span></td></tr>
   <tr><td>Password: </td><td><input type='password' class='text' name='pass' /><span class='red'>[required]</span></td></tr>
   <tr><td>Confirm Password: </td><td><input type='password' class='text' name='notpass' /><span class='red'>[required]</span></td></tr>
   <tr><td>Email: </td><td><input type='text' class='text' name='email' /><span class='red'>[required]</span></td></tr>
   <tr><td>Select Face:</td><td> 
    <select name='face' onchange="sface();">
     <?php foreach($this->_vars['OptionFaceOne'] as $key=>$value) { ?>
     <option value='0<?php echo $value ?>.png'>0<?php echo $value ?>.png</option>
     <?php } ?>
     <?php foreach($this->_vars['OptionFaceTwo'] as $key=>$value) { ?>
     <option value='<?php echo $value ?>.png'><?php echo $value ?>.png</option>
     <?php } ?>
    </select>
   </td></tr>
   <tr><td></td><td><img name='faceimg' src='images/01.png' class='face' /></td></tr>
   <tr><td>Security Question:</td><td> 
    <select name='question'>
     <option value=''>do not use security questions</option>
     <option value="What's your father's name">What's your father's name</option>
     <option value="What's your mother's occupation">What's your mother's occupation</option>
     <option value="What's your spouse's sex">What's your spouse's sex</option>
    </select>
   </td></tr>
   <tr><td>Security Question Answer: </td><td><input type='text' class='text' name='answer' /></td></tr>
   <tr><td>Validation Code: </td><td><input type='text' class='text' name='code' /><span class='red'>[required]</span></td></tr>
   <tr><td></td><td><img src="config/code.php" onclick="javascript:this.src='config/code.php?tm='+Math.random();" class='code' /></td></tr>
   <tr><td></td><td><input type='submit' class='submit' name='send' value='register' /></td></tr>
  </table>
 </form>
</div>
<?php } ?>

<?php if($this->_vars['login']) { ?>
<div id='reg'>
 <h2>Member Login</h2>
 <form method='post' name='login' action="?action=login">
  <table>
   <tr><td>Username: </td><td><input type='text' class='text' name='user' /><span class='red'>[required]</span></td></tr>
   <tr><td>Password: </td><td><input type='password' class='text' name='pass' /><span class='red'>[required]</span></td></tr>
   <tr><td>Remember: </td><td>
		<input type="radio" name="time" checked="checked" value="0" />Not Remeber
		<input type="radio" name="time" value="86400" />One Day
		<input type="radio" name="time" value="604800" />One Week
		<input type="radio" name="time" value="2592000" />One Month
   </td></tr>
   <tr><td>Validation Code: </td><td><input type='text' class='text' name='code' /><span class='red'>[required]</span></td></tr>
   <tr><td></td><td><img src="config/code.php" onclick="javascript:this.src='config/code.php?tm='+Math.random();" class='code' /></td></tr>
   <tr><td></td><td><input type='submit' class='submit' name='send' value='login' /></td></tr>
  </table>
 </form>
</div>
<?php } ?>
<?php $_tpl->create('footer.tpl') ?>

</body>
</html>
