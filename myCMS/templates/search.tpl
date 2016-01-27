<!doctype html>
<html>
<head>
<title>My CMS</title>
<link rel="stylesheet" type="text/css" href="style/basic.css" />
<link rel="stylesheet" type="text/css" href="style/list.css" />
</head>
<body>

{include file='header.tpl'}
<div id='list'>
 <h2>Current Position &gt; Search</h2>
 {if $SearchContent}
 {foreach $SearchContent(key, value)}
 <dl>
  <dt><a href='details.php?id={@value->id}' target='_blank'><img src='{@value->thumbnail}' alt='{@value->t}' /></a></dt>
  <dd>[<strong>{@value->nav_name}</strong>] <a href='details.php?id={@value->id}' target="_blank">{@value->title}</a></dd>
  <dd>{@value->date} click:{@value->count} keyword: [{@value->keyword}]</dd>
  <dd>Tip: {@value->info}</dd>
 </dl>
 {/foreach}
 {else}
  <p class='none'>no data</p>
 {/if}
 <div id='page'>{$page}</div>
</div>
<div id='sidebar'>
 <div class='right'>
  <h2>This Month recommendation</h2>
  <ul>
   {if $MonthNavRec}
   {foreach $MonthNavRec(key, value)}
   <li><em>{@value->date}</em><a href='details.php?id={@value->id}' target="_blank">{@value->title}</a></li>
   {/foreach}
   {/if}
  </ul>
 </div>
 <div class='right'>
  <h2>This Month hot topics</h2>
  <ul>
   {if $MonthNavHot}
   {foreach $MonthNavHot(key, value)}
   <li><em>{@value->date}</em><a href='details.php?id={@value->id}' target="_blank">{@value->title}</a></li>
   {/foreach}
   {/if}
  </ul>
 </div>
 <div class='right'>
  <h2>This Month picture news</h2>
  <ul>
   {if $MonthNavPic}
   {foreach $MonthNavPic(key, value)}
   <li><em>{@value->date}</em><a href='details.php?id={@value->id}' target="_blank">{@value->title}</a></li>
   {/foreach}
   {/if}   
  </ul>
 </div>
</div>
{include file='footer.tpl'}

</body>
</html>
