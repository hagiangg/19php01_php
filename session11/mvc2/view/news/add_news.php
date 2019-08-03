<h1>Add news page</h1>
<form action="index.php?action=add_news" method="post">
	<p>Title
		<input type="text" name="title" placeholder="Enter title"  value="<?php echo $title;?>">
		<span class="help-block"><?php echo ($errTitle != '')?$errTitle:'';?></span>
	</p>
	<p>Description
		<textarea name="description" rows="8"><?php echo $description;?></textarea>
		<span class="help-block"><?php echo ($errDes != '')?$errDes:'';?></span>
	</p>
	
	<p>News image
		<input type="file" name="image" value="<?php echo $image;?>">
        <span class="help-block"><?php echo ($errImage != '')?$errImage:'';?></span>
	</p>
	<p><input type="submit" name="add_news_form" value="Add news"></p>
</form>