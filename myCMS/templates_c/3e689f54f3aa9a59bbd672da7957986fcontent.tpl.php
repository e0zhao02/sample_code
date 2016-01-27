<!doctype html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='../style/admin.css' />
<script src='../js/admin_content.js'></script>
<script src='../ckeditor/ckeditor.js'></script>
</head>
<body id='main'>

<div class="map">Content Management &gt;&gt; View Articles &gt;&gt; <strong id='title'><?=$this->_vars['title']?></strong></div>

<ol>
	<li><a href='content.php?action=show' class='selected'>Article List</a></li>
	<li><a href='content.php?action=add'>Add New Article</a></li>

	<?php if($this->_vars['update']) { ?>
		<li><a href='content.php?action=update&id=<?=$this->_vars['id']?>'>Update Existing Article</a></li>
	<?php } ?>
</ol>

<?php if($this->_vars['show']) { ?>
<table cellspacing='0'>
 <tr><th>No.</th><th>Title</th><th>Attributes</th><th>Category</th><th>View Counts</th><th>Publish Time</th><th>Options</th></tr>
 <?php if($this->_vars['SearchContent']) { ?>
 <?php foreach($this->_vars['SearchContent'] as $key=>$value) { ?>
 <tr>
  <td><script>document.write(<?php echo $key+1 ?>+<?=$this->_vars['num']?>);</script></td>
  <td><a href="../details.php?id=<?php echo $value->id ?>" title="<?php echo $value->t ?>" target="_blank"><?php echo $value->title ?></a></td>
  <td><?php echo $value->attr ?></td>
  <td><a href='?action=show&nav=<?php echo $value->nav ?>'><?php echo $value->nav_name ?></a></td>
  <td><?php echo $value->count ?></td>
  <td><?php echo $value->date ?></td>
  <td><a href='content.php?action=update&id=<?php echo $value->id ?>'>Edit</a> | <a href='content.php?action=delete&id=<?php echo $value->id ?>' onclick="return confirm('Are you sure')?true:false">Delete</a></td>
 </tr>
 <?php } ?>
 <?php } else { ?>
  <tr><td colspan='7'>No data</td></tr>
 <?php } ?>
</table>

<form action='?' method='get'>
<div id='page'>
 <?=$this->_vars['page']?>
 <input type='hidden' name='action' value='show' />
 <select name='nav' class='select'>
  <option value='0'>All By Default</option>
  <?=$this->_vars['nav']?>
 </select>
 <input value='Search' type='submit' />
</div>
</form>
<?php } ?>

<?php if($this->_vars['add']) { ?>
 <form name='content' method='post' action='?action=add'>
 <table cellspacing='0' class='content'>
  <tr><td colspan='2'><strong>Publish a New Article</strong></td></tr>
  <tr><td>Article Title: </td><td><input type='text' name='title' class='text' /><span class='red'>[required]</span>(2-50 characters)</td></tr>
  <tr><td>Channel: </td><td><select name='nav'><option value='' style='padding:0;'>Please select a channel</option><?=$this->_vars['nav']?></select><span class='red'>[required]</span></td></tr>
  <tr><td>Attributes:</td><td>
   <input type='checkbox' name='attr[]' value='top' />Top
   <input type='checkbox' name='attr[]' value='recommended' />Recommended
   <input type='checkbox' name='attr[]' value='bold' />Bold
   <input type='checkbox' name='attr[]' value='skip' />Skip
  </td></tr>
  <tr><td>TAG: </td><td><input type='text' name='tag' class='text' /></td></tr>
  <tr><td>Keyword: </td><td><input type='text' name='keyword' class='text' /></td></tr>
  <tr><td>Thumbnail: </td><td><input type='text' name='thumbnail' class='text' readonly='readonly' />
		     <input type='button' value='Upload Thumbnail' onclick="centerWindow('../templates/upfile.html', 'upfile', '400', '100')" />
		     <img name='pic' style='display:none' />
  </td></tr>
  <tr><td>Source: </td><td><input type='text' name='source' class='text' /></td></tr>
  <tr><td>Author: </td><td><input type='text' name='author' class='text' /></td></tr>
  <tr><td><span class='middle'>Abstract: </span></td><td><textarea name='info'></textarea></td></tr>
  <tr class='ckeditor'><td colspan='2'><textarea id='TextArea1' name='content' class='ckeditor'></textarea></td></tr>
  <tr><td>Comment Options: </td><td><input type='radio' name='commend' value='1' checked='checked' />Allow Comment<input type='radio' name='commend' value='0' />Forbid Comment
          &nbsp;&nbsp;&nbsp;View Count: <input type='text' name='count' value='0' class='text small' />
  </td></tr>
  <tr><td>Article Order: </td><td><select name='sort'>
				<option value='0'>Default</option>
				<option value='1'>Top One Day</option>
				<option value='2'>Top One Week</option>
				<option value='3'>Top One Month</option>
				<option value='4'>Top One Year</option>
			  </select>
          &nbsp;&nbsp;&nbsp;Coin: <input type='text' name='gold' value='0' class='text small' />
  </td></tr>
  <tr><td>Reading Privilege: </td><td><select name='readlimit'>
				<option value='0'>Open to Public</option>
				<option value='1'>Junior Member</option>
				<option value='2'>Middle Member</option>
				<option value='3'>Senior Member</option>
				<option value='4'>VIP Member</option>
			  </select>
	  Title Color:	  <select name='color'>
				<option>Default</option>
				<option value='red' style='color:red'>Red</option>
				<option value='blue' style='color:blue'>Blue</option>
				<option value='orange' style='color:orange'>Orange</option>
			  </select>
  </td></tr>
  <tr><td><input type='submit' name='send' value='publish' /></td><td>[<a href='<?=$this->_vars['prev_url']?>'>Return to List</a>]</td></tr>
  <tr><td></td></tr>
 </table>
 </form>
<?php } ?>

<?php if($this->_vars['update']) { ?>
 <form name='content' method='post' action='?action=update'>
 <input type='hidden' name='id' value="<?=$this->_vars['id']?>" />
 <input type='hidden' name='prev_url' value="<?=$this->_vars['prev_url']?>" />
 <table cellspacing='0' class='content'>
  <tr><td colspan='2'><strong>Edit an Existing Article</strong></td></tr>
  <tr><td>Article Title: </td><td><input type='text' name='title' value="<?=$this->_vars['titlec']?>" class='text' /><span class='red'>[required]</span>(2-50 characters)</td></tr>
  <tr><td>Channel: </td><td><select name='nav'><option value='' style='padding:0;'>Please select a channel</option><?=$this->_vars['nav']?></select><span class='red'>[required]</span></td></tr>
  <tr><td>Attributes: </td><td><?=$this->_vars['attr']?></td></tr>
  <tr><td>TAG: </td><td><input type='text' name='tag' value="<?=$this->_vars['tag']?>" class='text' /></td></tr>
  <tr><td>Keyword: </td><td><input type='text' name='keyword' value="<?=$this->_vars['keyword']?>" class='text' /></td></tr>
  <tr><td>Thumbnail: </td><td><input type='text' name='thumbnail' value="<?=$this->_vars['thumbnail']?>" class='text' readonly='readonly' />
		     <input type='button' value='Upload Thumbnail' onclick="centerWindow('../templates/upfile.html', 'upfile', '400', '100')" /></td></tr>
  <tr><td></td><td><img name='pic' src="<?=$this->_vars['thumbnail']?>" style='display:block' /></td></tr>
  <tr><td>Source: </td><td><input type='text' name='source' value="<?=$this->_vars['source']?>" class='text' /></td></tr>
  <tr><td>Author: </td><td><input type='text' name='author' value="<?=$this->_vars['author']?>" class='text' /></td></tr>
  <tr><td><span class='middle'>Abstract: </span></td><td><textarea name='info'><?=$this->_vars['info']?></textarea></td></tr>
  <tr class='ckeditor'><td></td><td><textarea id='TextArea1' name='content' class='ckeditor'><?=$this->_vars['content']?></textarea></td></tr>
  <tr><td>Comment Options: </td><td><?=$this->_vars['commend']?>&nbsp;&nbsp;&nbsp;View Count: <input type='text' name='count' value="<?=$this->_vars['count']?>" class='text small' /></td></tr>
  <tr><td>Article Order: </td><td><select name='sort'><?=$this->_vars['sort']?></select>&nbsp;&nbsp;&nbsp;Coin: <input type='text' name='gold' value='0' value="<?=$this->_vars['gold']?>" class='text small' /></td></tr>
  <tr><td>Reading Privilege: </td><td><select name='readlimit'><?=$this->_vars['readlimit']?></select>Title Color:<select name='color'><?=$this->_vars['color']?></select></td></tr>
  <tr><td><input type='submit' name='send' value='update' /></td><td>[<a href='<?=$this->_vars['prev_url']?>'>Return to List</a>]</td></tr>
  <tr><td></td></tr>
 </table>
 </form>
<?php } ?>

</body>
</html>
