<h1>Edit news page</h1>
<form action="index.php?action=edit_news&id=<?php echo $id?>" method="post" enctype="multipart/form-data">
	<p>News title
		<input type="text" name="title" value="<?php echo $editNews['title']?>">
	</p>
	<p>Description
		<textarea name="description" rows="8"><?php echo $editNews['description']?></textarea>
	</p>
	<p><input type="submit" name="edit_news_form" value="Edit news"></p>
</form>