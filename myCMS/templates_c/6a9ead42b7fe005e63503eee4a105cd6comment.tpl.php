<!doctype html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='../style/admin.css' />
<script src='../js/admin_manage.js'></script>
</head>
<body id='main'>

<div class="map">Manage Home &gt;&gt; For Content &gt;&gt; <strong id='title'><?=$this->_vars['title']?></strong></div>

<ol>
	<li><a href='comment.php?action=show' class='selected'>Comment List</a></li>
</ol>

<?php if($this->_vars['show']) { ?>
<form method='post' action="?action=states">
<table cellspacing='0'>
 <tr><th>No.</th><th>Comment</th><th>Commentor</th><th>Related Article</th><th>Censorship Status</th><th>Bulk Act</th><th>Options</th></tr>
 <?php if($this->_vars['CommentList']) { ?>
 <?php foreach($this->_vars['CommentList'] as $key=>$value) { ?>
 <tr>
  <td><script>document.write(<?php echo $key+1 ?>+<?=$this->_vars['num']?>);</script></td>
  <td title="<?php echo $value->full ?>"><?php echo $value->content ?></td>
  <td><?php echo $value->user ?></td>
  <td><a href="../details.php?id=<?php echo $value->cid ?>" target="_blank" title="<?php echo $value->title ?>">View</a></td>
  <td><?php echo $value->state ?></td>
  <td><input type="text" name="states[<?php echo $value->id ?>]" value="<?php echo $value->num ?>" class="text sort" /></td>
  <td><a href='comment.php?action=delete&id=<?php echo $value->id ?>' onclick="return confirm('Are you sure')?true:false">Delete</a></td>
 </tr>
 <?php } ?>
 <tr><td></td><td></td><td></td><td></td><td></td><td><input type='submit' name='send' value='bulk act' style='cursor:pointer' /></td></tr>
 <?php } else { ?>
  <tr><td colspan='7'>No data</td></tr>
 <?php } ?>
</table>
</form>
<div id='page'><?=$this->_vars['page']?></div>
<?php } ?>

</body>
</html>
