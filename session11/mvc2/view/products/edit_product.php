<h1>Edit product page</h1>
<form action="index.php?action=edit_product" method="post">
	<p>Product name
		<input type="text" name="name" placeholder="Enter product name"  value="<?php echo $name;?>">
	    <span class="help-block"><?php echo ($errName != '')?$errName:'';?></span>
	</p>
	<p>Description
		<textarea name="description" rows="8"><?php echo $description;?></textarea>
		<span class="help-block"><?php echo ($errDes != '')?$errDes:'';?></span>
	</p>
	<p>Product price
		<input type="text" name="price" placeholder="Enter product price" value="<?php echo $price;?>">
		<span class="help-block"><?php echo ($errPrice != '')?$errPrice:'';?></span>
	</p>
	<p>Product image
		<input type="file" name="image">
        <img src="uploads<?php echo $image?>" alt ="image">
	</p>
	<p><input type="submit" name="edit_product_form" value="Edit product"></p>
</form>