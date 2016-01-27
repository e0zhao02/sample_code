<!doctype html>
<html>
<head>
<title>My CMS</title>
<link rel="stylesheet" type="text/css" href="style/basic.css" />
<link rel="stylesheet" type="text/css" href="style/details.css" />
<script src="config/static.php?id=<?=$this->_vars['id']?>&type=details"></script>
<script src="js/details.js"></script>
</head>
<body>

<?php $_tpl->create('header.tpl') ?>
<div id='details'>
 <h2>Current Position &gt; <?=$this->_vars['nav']?></h2>
 <h3><?=$this->_vars['titlec']?></h3>
 <div class='d1'>Publist Time: <?=$this->_vars['date']?> Source: <?=$this->_vars['source']?> Author: <?=$this->_vars['author']?> Click: <?=$this->_vars['count']?></div>
 <div class='d2'><?=$this->_vars['info']?></div>
 <div class='d3'><?=$this->_vars['content']?></div>
 <div class='d4'>TAG: <?=$this->_vars['tag']?></div>
 <div class='d6'>
  <h2><a href="feedback.php?cid=<?=$this->_vars['id']?>" target="_blank"><span><?=$this->_vars['comment']?></span> commented</a>Latest Comment</h2>
  <?php if($this->_vars['NewThreeComment']) { ?>
  <?php foreach($this->_vars['NewThreeComment'] as $key=>$value) { ?>
  <dl>
   <dt><img src="images/<?php echo $value->face ?>" /></dt>
   <dd><em><?php echo $value->date ?></em><span>[<?php echo $value->user ?>]</span></dd>
   <dd class="info">[<?php echo $value->manner ?>]<?php echo $value->content ?></dd>
   <dd class="bottom"><a href="feedback.php?cid=<?php echo $value->cid ?>&id=<?php echo $value->id ?>&type=sustain" target="_blank">Agree</a><a href="feedback.php?cid=<?php echo $value->cid ?>&id=<?php echo $value->id ?>&type=oppose" target="_blank">Disagree</a></dd>
  </dl>
  <?php } ?>
  <?php } else { ?>
  <dl><dd>no comment for this article</dd></dl>
  <?php } ?>
 </div>
 <div class='d5'>
 <form method='post' name="comment" action="feedback.php?cid=<?=$this->_vars['id']?>" target="_blank">
  <p>Your Opinion: <input type="radio" name="manner" value="1" checked='checked' />Agreed<input type="radio" name="manner" value="0" />No Opinion<input type="radio" name="manner" value="-1" />Disagreed</p>
  <p><textarea name="content"></textarea></p>
  <p style="position:relative;top:-5px;">Validation Code:<input type="text" class="text" name="code" />
     <img src="config/code.php" onclick="javascript:this.src='config/code.php?tm='+Math.random();" class="code" />
     <input type="submit" class='submit' onclick="return checkComment();" name="send" value="submit your comment" />
  </p>
 </form>
 </div>
</div>

<div id='sidebar'> 
<div class='nav'>
 <h2>Sub_Class List</h2>
 <?php if($this->_vars['childnav']) { ?>
 <?php foreach($this->_vars['childnav'] as $key=>$value) { ?>
 <strong><a href='list.php?id=<?php echo $value->id ?>'><?php echo $value->nav_name ?></a></strong>
 <?php } ?>
 <?php } else { ?>
 <span>this category has no sub class</span>
 <?php } ?>
 </div>
 <div class='right'>
  <h2>This Month sub-class recommendation</h2>
  <ul>
   <?php if($this->_vars['MonthNavRec']) { ?>
   <?php foreach($this->_vars['MonthNavRec'] as $key=>$value) { ?>
   <li><em><?php echo $value->date ?></em><a href='details.php?id=<?php echo $value->id ?>' target="_blank"><?php echo $value->title ?></a></li>
   <?php } ?>
   <?php } ?>
  </ul>
 </div>
 <div class='right'>
  <h2>This Month sub-class hot topics</h2>
  <ul>
   <?php if($this->_vars['MonthNavHot']) { ?>
   <?php foreach($this->_vars['MonthNavHot'] as $key=>$value) { ?>
   <li><em><?php echo $value->date ?></em><a href='details.php?id=<?php echo $value->id ?>' target="_blank"><?php echo $value->title ?></a></li>
   <?php } ?>
   <?php } ?>
  </ul>
 </div>
 <div class='right'>
  <h2>This Month sub-class picture news</h2>
  <ul>
   <?php if($this->_vars['MonthNavPic']) { ?>
   <?php foreach($this->_vars['MonthNavPic'] as $key=>$value) { ?>
   <li><em><?php echo $value->date ?></em><a href='details.php?id=<?php echo $value->id ?>' target="_blank"><?php echo $value->title ?></a></li>
   <?php } ?>
   <?php } ?>   
  </ul>
 </div></div>
<?php $_tpl->create('footer.tpl') ?>
</body>
</html>
