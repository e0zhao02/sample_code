<script src="config/static.php?type=header"></script>
<div id="top">
 {$header}
</div>

<div id="header">
 <h1><a href="###">PC Web Club</a></h1>
 <div class='adver'></script></div>
</div>

<div id="nav">
 <ul>
  <li><a href='./'>home</a></li>
  {if $FrontNav}
   {foreach $FrontNav(key, value)}
    <li><a href='list.php?id={@value->id}'>{@value->nav_name}</a></li>
   {/foreach}
  {/if}
 </ul>
</div>

<div id="search">
 <form method='get' action='search.php'>
  <select name='type'>
   <option select='selected' value="1">Search by Title</option>
   <option value="2">Search by Keyword</option>
  </search>
  <input type='text' name='inputkeyword' class='text'/>
  <input type='submit' value='Search' class='submit'/>
 </form>
 <strong>TAG</strong>
 <ul>
  <li><a href='###'>Funds(3)</a></li>
  <li><a href='###'>Beauty(1)</a></li>
  <li><a href='###'>Brandy(3)</a></li>
  <li><a href='###'>Music(1)</a></li>
  <li><a href='###'>Sports(1)</a></li>
  <li><a href='###'>Live(1)</a></li>
  <li><a href='###'>Meeting(1)</a></li>
  <li><a href='###'>Canada(1)</a></li>
  <li><a href='###'>Police(1)</a></li>
  <li><a href='###'>Flower(1)</a></li>
 </ul>
</div>
