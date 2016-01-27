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
 <h2>Current Position &gt; {$nav}</h2>
 {if $AllListContent}
 {foreach $AllListContent(key, value)}
 <dl>
  <dt><a href='details.php?id={@value->id}' target='_blank'><img src='{@value->thumbnail}' alt='{@value->title}' /></a></dt>
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
 </div>
</div>
{include file='footer.tpl'}

</body>
</html>
