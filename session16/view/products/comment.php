<table class="table table-bordered">
  <tr>
    <th style="width: 10px">#</th>
    <th>User</th>
    <th>Product</th>
    <th>Content</th>
    <th>Created</th>
    <th>status</th>
  </tr>
 <?php 
 if ($editProductDetail->num_rows > 0) {
 	while($row = $editProductDetail->fetch_assoc()) {
 		$id = $row['id'];
 ?>
    <tr>
      <td><?php echo $row['id']?></td>
      <td><?php echo $row['user_id']?></td>
      <td><?php echo $row['product_id']?></td>
      <td><?php echo $row['content']?></td>
       <td><?php echo $row['created']?></td>
      <td><?php echo $row['status']?></td>
    </tr>
  <?php 
  	}
 ?>
</table>