<!doctype html>
<html>
<head>
<title>My CMS</title>
<link rel="stylesheet" type="text/css" href="style/basic.css" />
<link rel="stylesheet" type="text/css" href="style/list.css" />
</head>
<body>

<?php $_tpl->create('header.tpl') ?>
<div id='list'>
 <h2>Current Position &gt; Search</h2>
 <?php if($this->_vars['SearchContent']) { ?>
 <?php foreach($this->_vars['SearchContent'] as $key=>$value) { ?>
 <dl>
  <dt><a href='details.php?id=<?php echo $value->id ?>' target='_blank'><img src='<?php echo $value->thumbnail ?>' alt='<?php echo $value->t ?>' /></a></dt>
  <dd>[<strong><?php echo $value->nav_name ?></strong>] <a href='details.php?id=<?php echo $value->id ?>' target="_blank"><?php echo $value->title ?></a></dd>
  <dd><?php echo $value->date ?> click:<?php echo $value->count ?> keyword: [<?php echo $value->keyword ?>]</dd>
  <dd>Tip: <?php echo $value->info ?></dd>
 </dl>
 <?php } ?>
 <?php } else { ?>
  <p class='none'>no data</p>
 <?php } ?>
 <div id='page'><?=$this->_vars['page']?></div>
</div>
<div id='sidebar'>
 <div class='right'>
  <h2>This Month recommendation</h2>
  <ul>
   <?php if($this->_vars['MonthNavRec']) { ?>
   <?php foreach($this->_vars['MonthNavRec'] as $key=>$value) { ?>
   <li><em><?php echo $value->date ?></em><a href='details.php?id=<?php echo $value->id ?>' target="_blank"><?php echo $value->title ?></a></li>
   <?php } ?>
   <?php } ?>
  </ul>
 </div>
 <div class='right'>
  <h2>This Month hot topics</h2>
  <ul>
   <?php if($this->_vars['MonthNavHot']) { ?>
   <?php foreach($this->_vars['MonthNavHot'] as $key=>$value) { ?>
   <li><em><?php echo $value->date ?></em><a href='details.php?id=<?php echo $value->id ?>' target="_blank"><?php echo $value->title ?></a></li>
   <?php } ?>
   <?php } ?>
  </ul>
 </div>
 <div class='right'>
  <h2>This Month picture news</h2>
  <ul>
   <?php if($this->_vars['MonthNavPic']) { ?>
   <?php foreach($this->_vars['MonthNavPic'] as $key=>$value) { ?>
   <li><em><?php echo $value->date ?></em><a href='details.php?id=<?php echo $value->id ?>' target="_blank"><?php echo $value->title ?></a></li>
   <?php } ?>
   <?php } ?>   
  </ul>
 </div>
</div>
<?php $_tpl->create('footer.tpl') ?>

</body>
</html>
