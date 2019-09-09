<h1>Products detail page here</h1>
<?php 
	echo $productDetail;
?>
<table class="table table-bordered">
  <tr>
    <th style="width: 10px">#</th>
    <th>Name</th>
    <th>Image</th>
    <th>Description</th>
    <th>Price</th>
    <th>Created</th>
    <th>Comment</th>
  </tr>
 <?php 
 if ($editProductDetail->num_rows > 0) {
 	while($row = $editProductDetail->fetch_assoc()) {
 		$id = $row['id'];
 ?>
    <tr>
      <td><?php echo $row['id']?></td>
      <td><?php echo $row['name']?></td>
      <td><img src="webroot/uploads/users/<?php echo $row['image']?>" alt="image" class="avatar_user"></td>
      <td><?php echo $row['description']?></td>
      <td><?php echo $row['price']?></td>
       <td><?php echo $row['created']?></td>
      <td><a href="index.php?controller=product&action=comment&id=<?php echo $id?>">Comment</a></td>
    </tr>
  <?php 
  	}
  } else {?>
  <tr>
  	<td colspan="7">Khong co san pham nao</td>
  </tr>
  <?php }?>
</table>