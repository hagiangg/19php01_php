<h1>Edit product page</h1>
<form action="admin.php?controller=product&action=edit_product&id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
	
	</p>
	<p>Product name
		<input type="text" name="name" placeholder="Enter product name"  value="<?php echo $editProduct['name'];?>">
	</p>
	<p>Description
		<textarea name="description" rows="8"><?php echo $editProduct['description'];?></textarea>
	</p>
	<p>Product price
		<input type="text" name="price" placeholder="Enter product price" value="<?php echo $editProduct['price'];?>">
	</p>
	<p>Product image
		<input type="file" name="image">
        <img src="webroot/uploads/products/<?php echo $editProduct['image']?>" alt ="image">
	</p>
	<p><input type="submit" name="edit_product" value="Edit product"></p>
</form>