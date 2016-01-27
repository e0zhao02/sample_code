<!doctype html>
<html>
<head>
<title>My CMS</title>
<link rel="stylesheet" type="text/css" href="style/basic.css" />
<link rel="stylesheet" type="text/css" href="style/feedback.css" />
<script src="js/details.js"></script>
</head>
<body>

<?php $_tpl->create('header.tpl') ?>

<div id="feedback">
 <h2>Comment List</h2>
 <h3><?=$this->_vars['titlec']?></h3>
 <p class='info'><?=$this->_vars['info']?><a href="details.php?id=<?=$this->_vars['id']?>" target="_blank">[details]</a></p>

 <?php if($this->_vars['HotThreeComment']) { ?>
 <?php foreach($this->_vars['HotThreeComment'] as $key=>$value) { ?>
 <dl>
  <dt><img src="images/<?php echo $value->face ?>" /></dt>
  <dd><em><?php echo $value->date ?></em><span>[<?php echo $value->user ?>]</span></dd>
  <dd class="info">[<?php echo $value->manner ?>]<?php echo $value->content ?></dd>
  <dd class="bottom"><a href="feedback.php?cid=<?php echo $value->cid ?>&id=<?php echo $value->id ?>&type=sustain">[<?php echo $value->sustain ?>]Agree</a> <a href="feedback.php?cid=<?php echo $value->cid ?>&id=<?php echo $value->id ?>&type=oppose">[<?php echo $value->oppose ?>]Disagree</a></dd>
 </dl>
 <?php } ?>
 <?php } ?>

 <h4>Latest Comments</h4>
 <?php if($this->_vars['AllComment']) { ?>
 <?php foreach($this->_vars['AllComment'] as $key=>$value) { ?>
 <dl>
  <dt><img src="images/<?php echo $value->face ?>" /></dt>
  <dd><em><?php echo $value->date ?></em><span>[<?php echo $value->user ?>]</span></dd>
  <dd class="info">[<?php echo $value->manner ?>]<?php echo $value->content ?></dd>
  <dd class="bottom"><a href="feedback.php?cid=<?php echo $value->cid ?>&id=<?php echo $value->id ?>&type=sustain">[<?php echo $value->sustain ?>]Agree</a> <a href="feedback.php?cid=<?php echo $value->cid ?>&id=<?php echo $value->id ?>&type=oppose">[<?php echo $value->oppose ?>]Disagree</a></dd>
 </dl>
 <?php } ?>
 <?php } else { ?>
  <dl><dd>this article has no comments</dd></dl>
 <?php } ?>
 <div id="page"><?=$this->_vars['page']?></div>
</div>

<div id="sidebar">
 <h2>Hot Articles Ranking</h2>
 <ul>
  <?php if($this->_vars['HotTwentyComment']) { ?>
  <?php foreach($this->_vars['HotTwentyComment'] as $key=>$value) { ?>
  <li><a href="details.php?id=<?php echo $value->id ?>" target="_blank"><?php echo $value->title ?></a></li>
  <?php } ?>
  <?php } ?>
 </ul>
</div>
 <div class="d5">
 <form method='post' name="comment" action="feedback.php?cid=<?=$this->_vars['cid']?>">
  <p>Your Opinion: <input type="radio" name="manner" value="1" checked='checked' />Agreed<input type="radio" name="manner" value="0" />No Opinion<input type="radio" name="manner" value="-1" />Disagreed</p>
  <p><textarea name="content"></textarea></p>
  <p style="position:relative;top:-5px;">Validation Code:<input type="text" class="text" name="code" />
     <img src="config/code.php" onclick="javascript:this.src='config/code.php?tm='+Math.random();" class="code" />
     <input type="submit" class='submit' onclick="return checkComment();" name="send" value="submit your comment" />
  </p>
 </form>
 </div>
<?php $_tpl->create('footer.tpl') ?>

</body>
</html>
