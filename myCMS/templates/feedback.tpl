<!doctype html>
<html>
<head>
<title>My CMS</title>
<link rel="stylesheet" type="text/css" href="style/basic.css" />
<link rel="stylesheet" type="text/css" href="style/feedback.css" />
<script src="js/details.js"></script>
</head>
<body>

{include file='header.tpl'}

<div id="feedback">
 <h2>Comment List</h2>
 <h3>{$titlec}</h3>
 <p class='info'>{$info}<a href="details.php?id={$id}" target="_blank">[details]</a></p>

 {if $HotThreeComment}
 {foreach $HotThreeComment(key, value)}
 <dl>
  <dt><img src="images/{@value->face}" /></dt>
  <dd><em>{@value->date}</em><span>[{@value->user}]</span></dd>
  <dd class="info">[{@value->manner}]{@value->content}</dd>
  <dd class="bottom"><a href="feedback.php?cid={@value->cid}&id={@value->id}&type=sustain">[{@value->sustain}]Agree</a> <a href="feedback.php?cid={@value->cid}&id={@value->id}&type=oppose">[{@value->oppose}]Disagree</a></dd>
 </dl>
 {/foreach}
 {/if}

 <h4>Latest Comments</h4>
 {if $AllComment}
 {foreach $AllComment(key, value)}
 <dl>
  <dt><img src="images/{@value->face}" /></dt>
  <dd><em>{@value->date}</em><span>[{@value->user}]</span></dd>
  <dd class="info">[{@value->manner}]{@value->content}</dd>
  <dd class="bottom"><a href="feedback.php?cid={@value->cid}&id={@value->id}&type=sustain">[{@value->sustain}]Agree</a> <a href="feedback.php?cid={@value->cid}&id={@value->id}&type=oppose">[{@value->oppose}]Disagree</a></dd>
 </dl>
 {/foreach}
 {else}
  <dl><dd>this article has no comments</dd></dl>
 {/if}
 <div id="page">{$page}</div>
</div>

<div id="sidebar">
 <h2>Hot Articles Ranking</h2>
 <ul>
  {if $HotTwentyComment}
  {foreach $HotTwentyComment(key, value)}
  <li><a href="details.php?id={@value->id}" target="_blank">{@value->title}</a></li>
  {/foreach}
  {/if}
 </ul>
</div>
 <div class="d5">
 <form method='post' name="comment" action="feedback.php?cid={$cid}">
  <p>Your Opinion: <input type="radio" name="manner" value="1" checked='checked' />Agreed<input type="radio" name="manner" value="0" />No Opinion<input type="radio" name="manner" value="-1" />Disagreed</p>
  <p><textarea name="content"></textarea></p>
  <p style="position:relative;top:-5px;">Validation Code:<input type="text" class="text" name="code" />
     <img src="config/code.php" onclick="javascript:this.src='config/code.php?tm='+Math.random();" class="code" />
     <input type="submit" class='submit' onclick="return checkComment();" name="send" value="submit your comment" />
  </p>
 </form>
 </div>
{include file='footer.tpl'}

</body>
</html>
