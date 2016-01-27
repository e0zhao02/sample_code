<!doctype html>
<html>
<head>
<title>My CMS</title>
<link rel="stylesheet" type="text/css" href="style/basic.css" />
<link rel="stylesheet" type="text/css" href="style/index.css" />
<script src='js/reg.js'></script>
<script src='js/siderbar_adver.js'></script>
<script src='config/static.php?type=index'></script>
</head>
<body>

<?php $_tpl->create('header.tpl') ?>

<div id="user">
 <?php if($this->_vars['cache']) { ?>
  <?=$this->_vars['member']?>
 <?php } else { ?>
  <?php if($this->_vars['login']) { ?>
  <h2>Member Login</h2>
  <form method='post' name='login' action='register.php?action=login'>
   <table>
   <tr><td>Username:</td><td><input type='text' name='user' class='text'/></td></tr>
   <tr><td>Password:</td><td><input type='password' name='pass' class='text'/></td></tr>
   <tr><td>Security:</td><td><input type='text' name='code' class='text code' />
   <img src="config/code.php" onclick="javascript:this.src='config/code.php?tm='+Math.random();" class="code" /></td></tr>
   <tr><td></td><td><input type='submit' name='send' value='login' class='submit' /></td></tr>
   </table>
  </form>
  <?php } else { ?>
  <h2>Member Info</h2>
  <div class='a'>Hello, Welcome <strong><?=$this->_vars['user']?></strong></div>
  <div class='b'><img src='images/<?=$this->_vars['face']?>' /></div>  
  <?php } ?>
 <?php } ?>

 <h2>Recently Logged In</h2>
 <?php if($this->_vars['AllLaterUser']) { ?>
 <?php foreach($this->_vars['AllLaterUser'] as $key=>$value) { ?>
 <dl>
  <dt><img src='images/<?php echo $value->face ?>' /></dt>
  <dd><?php echo $value->user ?></dd>
 </dl>
 <?php } ?>
 <?php } ?>
</div>
<div id="news">
 <h3><a href='details.php?id=<?=$this->_vars['TopId']?>' target="_blank"><?=$this->_vars['TopTitle']?></a></h3>
 <p><?=$this->_vars['TopInfo']?><a href='details.php?id=<?=$this->_vars['TopId']?>' target="_blank">&nbsp;[Read Full Text]</a></p>
 <p class='link'>
  <?php if($this->_vars['NewTopList']) { ?>
  <?php foreach($this->_vars['NewTopList'] as $key=>$value) { ?>
  <a href='details.php?id=<?php echo $value->id ?>' target="_blank"><?php echo $value->title ?></a> <?php echo $value->line ?>
  <?php } ?>
  <?php } ?>
 </p>
 <ul>
  <?php if($this->_vars['NewList']) { ?>
  <?php foreach($this->_vars['NewList'] as $key=>$value) { ?>
  <li><em><?php echo $value->date ?></em><a href='details.php?id=<?php echo $value->id ?>' target="_blank"><?php echo $value->title ?></a></li>
  <?php } ?>
  <?php } ?>
 </ul>
</div>
<div id="pic">
 <div class="loading"><img src="images/001.jpeg" width="268" height='auto' /></div>
            <ul>  
                <li><img src="images/001.jpeg" /></li>  
                <li><img src="images/002.jpeg" width="270" height="195"/></li>  
                <li><img src="images/003.jpeg" width="270" height="195"/></li>  
                <li><img src="images/004.jpeg" width="270" height="195"/></li>  
            </ul>  
</div>
<div id="rec">
 <h2>Special Recommended</h2>
 <ul>
  <?php if($this->_vars['NewRecList']) { ?>
  <?php foreach($this->_vars['NewRecList'] as $key=>$value) { ?>
  <li><em><?php echo $value->date ?></em><a href='details.php?id=<?php echo $value->id ?>' target="_blank"><?php echo $value->title ?></a></li>
  <?php } ?>
  <?php } ?>
 </ul>
</div>
<div id="sidebar-right">
 <div class='adver'><script src="js/sidebar_adver.js"></script></div>
 <div class='hot'>
  <h2>This Month's Hot Topic</h2>
  <ul>
   <?php if($this->_vars['MonthHotList']) { ?>
   <?php foreach($this->_vars['MonthHotList'] as $key=>$value) { ?>
   <li><em><?php echo $value->date ?></em><a href='details.php?id=<?php echo $value->id ?>' target="_blank"><?php echo $value->title ?></a></li>
   <?php } ?>
   <?php } ?>
  </ul>
 </div>
 <div class='comm'>
  <h2>This Month's Hot Comments</h2>
  <ul>
   <?php if($this->_vars['MonthCommentList']) { ?>
   <?php foreach($this->_vars['MonthCommentList'] as $key=>$value) { ?>
   <li><em><?php echo $value->date ?></em><a href='details.php?id=<?php echo $value->id ?>' target="_blank"><?php echo $value->title ?></a></li>
   <?php } ?>
   <?php } ?>
  </ul>
 </div>
 <div class='vote'>
  <h2>Votes</h2>
  <h3>How do you know our website?</h3>
  <form>
   <label><input type='radio' name='vote' checked='checked'/>Search Engine</label>
   <label><input type='radio' name='vote' />Google Search</label>
   <label><input type='radio' name='vote' />External Link</label>
   <label><input type='radio' name='vote' />Friends Referral</label>
   <p><input type='submit' value='vote' name='send' /><input type='button' value='View Result'/></p>
  </form>
 </div>
</div>
<div id="picnews">
 <h2>Picture News</h2>
 <?php if($this->_vars['PicList']) { ?>
 <?php foreach($this->_vars['PicList'] as $key=>$value) { ?>
 <dl>
  <dt><a href='details.php?id=<?php echo $value->id ?>' target="_blank"><img src='<?php echo $value->thumbnail ?>' alt='' /></a></dt>
  <dd><a href='details.php?id=<?php echo $value->id ?>' target="_blank"><?php echo $value->title ?></a></dd>
 </dl>
 <?php } ?>
 <?php } ?>
</div>
<div id="newslist">
 <?php if($this->_vars['FourNav']) { ?>
 <?php foreach($this->_vars['FourNav'] as $key=>$value) { ?>
 <div class='<?php echo $value->class ?>'>
  <h2><a href='list.php?id=<?php echo $value->id ?>' target="_blank">More</a><?php echo $value->nav_name ?></h2>
  <ul>
   <?php if($value->list) { ?>
   <?php foreach($value->list as $key=>$value) { ?>
   <li><em><?php echo $value->date ?></em><a href='details.php?id=<?php echo $value->id ?>' target="_blank"><?php echo $value->title ?></a></li>
   <?php } ?>
   <?php } ?>
  </ul>
 </div>
 <?php } ?>
 <?php } ?>
</div>

<?php $_tpl->create('footer.tpl') ?>

</body>
</html>
