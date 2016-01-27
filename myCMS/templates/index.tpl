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

{include file='header.tpl'}

<div id="user">
 {if $cache}
  {$member}
 {else}
  {if $login}
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
  {else}
  <h2>Member Info</h2>
  <div class='a'>Hello, Welcome <strong>{$user}</strong></div>
  <div class='b'><img src='images/{$face}' /></div>  
  {/if}
 {/if}

 <h2>Recently Logged In</h2>
 {if $AllLaterUser}
 {foreach $AllLaterUser(key, value)}
 <dl>
  <dt><img src='images/{@value->face}' /></dt>
  <dd>{@value->user}</dd>
 </dl>
 {/foreach}
 {/if}
</div>
<div id="news">
 <h3><a href='details.php?id={$TopId}' target="_blank">{$TopTitle}</a></h3>
 <p>{$TopInfo}<a href='details.php?id={$TopId}' target="_blank">&nbsp;[Read Full Text]</a></p>
 <p class='link'>
  {if $NewTopList}
  {foreach $NewTopList(key, value)}
  <a href='details.php?id={@value->id}' target="_blank">{@value->title}</a> {@value->line}
  {/foreach}
  {/if}
 </p>
 <ul>
  {if $NewList}
  {foreach $NewList(key, value)}
  <li><em>{@value->date}</em><a href='details.php?id={@value->id}' target="_blank">{@value->title}</a></li>
  {/foreach}
  {/if}
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
  {if $NewRecList}
  {foreach $NewRecList(key, value)}
  <li><em>{@value->date}</em><a href='details.php?id={@value->id}' target="_blank">{@value->title}</a></li>
  {/foreach}
  {/if}
 </ul>
</div>
<div id="sidebar-right">
 <div class='adver'><script src="js/sidebar_adver.js"></script></div>
 <div class='hot'>
  <h2>This Month's Hot Topic</h2>
  <ul>
   {if $MonthHotList}
   {foreach $MonthHotList(key, value)}
   <li><em>{@value->date}</em><a href='details.php?id={@value->id}' target="_blank">{@value->title}</a></li>
   {/foreach}
   {/if}
  </ul>
 </div>
 <div class='comm'>
  <h2>This Month's Hot Comments</h2>
  <ul>
   {if $MonthCommentList}
   {foreach $MonthCommentList(key, value)}
   <li><em>{@value->date}</em><a href='details.php?id={@value->id}' target="_blank">{@value->title}</a></li>
   {/foreach}
   {/if}
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
 {if $PicList}
 {foreach $PicList(key, value)}
 <dl>
  <dt><a href='details.php?id={@value->id}' target="_blank"><img src='{@value->thumbnail}' alt='' /></a></dt>
  <dd><a href='details.php?id={@value->id}' target="_blank">{@value->title}</a></dd>
 </dl>
 {/foreach}
 {/if}
</div>
<div id="newslist">
 {if $FourNav}
 {foreach $FourNav(key, value)}
 <div class='{@value->class}'>
  <h2><a href='list.php?id={@value->id}' target="_blank">More</a>{@value->nav_name}</h2>
  <ul>
   {iff @value->list}
   {for @value->list(key, value)}
   <li><em>{@value->date}</em><a href='details.php?id={@value->id}' target="_blank">{@value->title}</a></li>
   {/for}
   {/iff}
  </ul>
 </div>
 {/foreach}
 {/if}
</div>

{include file='footer.tpl'}

</body>
</html>
