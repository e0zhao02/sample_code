<!doctype html>
<html>
<head>
<title>My CMS</title>
<link rel="stylesheet" type="text/css" href="style/basic.css" />
<link rel="stylesheet" type="text/css" href="style/details.css" />
<script src="config/static.php?id={$id}&type=details"></script>
<script src="js/details.js"></script>
</head>
<body>

{include file='header.tpl'}
<div id='details'>
 <h2>Current Position &gt; {$nav}</h2>
 <h3>{$titlec}</h3>
 <div class='d1'>Publist Time: {$date} Source: {$source} Author: {$author} Click: {$count}</div>
 <div class='d2'>{$info}</div>
 <div class='d3'>{$content}</div>
 <div class='d4'>TAG: {$tag}</div>
 <div class='d6'>
  <h2><a href="feedback.php?cid={$id}" target="_blank"><span>{$comment}</span> commented</a>Latest Comment</h2>
  {if $NewThreeComment}
  {foreach $NewThreeComment(key, value)}
  <dl>
   <dt><img src="images/{@value->face}" /></dt>
   <dd><em>{@value->date}</em><span>[{@value->user}]</span></dd>
   <dd class="info">[{@value->manner}]{@value->content}</dd>
   <dd class="bottom"><a href="feedback.php?cid={@value->cid}&id={@value->id}&type=sustain" target="_blank">Agree</a><a href="feedback.php?cid={@value->cid}&id={@value->id}&type=oppose" target="_blank">Disagree</a></dd>
  </dl>
  {/foreach}
  {else}
  <dl><dd>no comment for this article</dd></dl>
  {/if}
 </div>
 <div class='d5'>
 <form method='post' name="comment" action="feedback.php?cid={$id}" target="_blank">
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
 {if $childnav}
 {foreach $childnav(key, value)}
 <strong><a href='list.php?id={@value->id}'>{@value->nav_name}</a></strong>
 {/foreach}
 {else}
 <span>this category has no sub class</span>
 {/if}
 </div>
 <div class='right'>
  <h2>This Month sub-class recommendation</h2>
  <ul>
   {if $MonthNavRec}
   {foreach $MonthNavRec(key, value)}
   <li><em>{@value->date}</em><a href='details.php?id={@value->id}' target="_blank">{@value->title}</a></li>
   {/foreach}
   {/if}
  </ul>
 </div>
 <div class='right'>
  <h2>This Month sub-class hot topics</h2>
  <ul>
   {if $MonthNavHot}
   {foreach $MonthNavHot(key, value)}
   <li><em>{@value->date}</em><a href='details.php?id={@value->id}' target="_blank">{@value->title}</a></li>
   {/foreach}
   {/if}
  </ul>
 </div>
 <div class='right'>
  <h2>This Month sub-class picture news</h2>
  <ul>
   {if $MonthNavPic}
   {foreach $MonthNavPic(key, value)}
   <li><em>{@value->date}</em><a href='details.php?id={@value->id}' target="_blank">{@value->title}</a></li>
   {/foreach}
   {/if}   
  </ul>
 </div></div>
{include file='footer.tpl'}
</body>
</html>
