
<link rel="stylesheet" type="text/css" href="webroot/css/style.css">
  <h1>
    List products
  </h1>
  <a href="index.php?controller=product&action=add_product">Add product</a>
  
    <table class="table table-bordered">
      <tr>
        <th style="width: 10px">#</th>
        <th>Product name </th>
        <th>Description</th>
        <th>Price</th>
        <th>Image</th>
        <th>Detail</th>
      </tr>
       <?php 
       if ($listProduct->num_rows > 0) {
        while($row = $listProduct->fetch_assoc()) {
          $id = $row['id'];
       ?>
          <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['description'];  ?></td>
             <td>
               <?php echo number_format($row['price'],3). '  VND'; ?>
              </td>
             <td><img src="webroot/uploads/<?php echo $row['image']?>" alt="image" class="avatar_user"></td>
            <td><a href="index.php?controller=product&action=product_detail&id=<?php echo $id ?>">Detail</a></td>
          </tr>
        <?php 
          }
        } else {?>
        <tr>
          <td colspan="5">Khong co san pham nao nao</td>
        </tr>
        <?php }?>
    </table>

