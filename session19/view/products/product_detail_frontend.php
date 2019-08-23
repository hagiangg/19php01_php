<div class="detail_product_full">
	<h2><?php echo $productDetail['name']?></h2>
	<p><?php echo $productDetail['description']?></p>
	<p><?php echo $productDetail['price']?> VND</p>
	<p>Category: <?php echo $productDetail['product_category_name']?></p>
	<img src="webroot/uploads/products/<?php echo $productDetail['image']?>">
</div>
<div class="comment">
	
	<div class="comment_list">
		<?php
			if ($commentList->num_rows > 0){
				while ($comment = $commentList->fetch_assoc()) {
		  	$id = $comment['id'];
	 	?>
			<div class="comment_detail" style="border: 1px solid black; height: 80px;">
				<div class="comment_author">username:<?php echo $comment['username']?></div>
				<div class="comment_connent_detail">Content:<?php echo $comment['content']?></div>
				<div class="comment_time">Created:<?php echo $comment['created']?></div>
				<div class="setting"><a href="index.php?controller=comment&action=delete_comment&id=<?php echo $id ?>">delete</a>
					<a href="index.php?controller=comment&action=edit_comment&id=<?php echo $id  ?>">    |   edit</a>
					<a href="index.php?controller=comment&action=like_comment&id=<?php echo $id  ?>">    |   Like</a>
				</div>
			</div>
		<?php }?>
		<?php }else {?>
			<div class="comment_detail">
				<p>No comment</p>

			</div>
		<?php }?>

	</div>
	<div class="comment_content">
		<form action="index.php?controller=comment&action=add_comment&product_id=<?php echo $productDetail['id']?>" method="POST">
		<textarea name="content" rows="5" cols="40"></textarea>
		<input type="submit" name="comment" value="Comment">
		</form>
	</div>
</div>

