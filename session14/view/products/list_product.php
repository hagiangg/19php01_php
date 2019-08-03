<?php include 'common/header.php'; ?>
<link rel="stylesheet" type="text/css" href="webroot/css/style.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List products
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">List products</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">List products</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered">
              <tr>
                <th style="width: 10px">#</th>
                <th>Product title </th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
               <?php 
               if ($listProduct->num_rows > 0) {
                while($row = $listProduct->fetch_assoc()) {
                  $id = $row['id'];
               ?>
                  <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['category_id']?></td>
                    <td><?php echo $row['title']?></td>
                    <td><?php echo $row['description'];  ?></td>
                     <td>
                       <?php echo number_format($row['price'],3). '  VND'; ?>
                      </td>
                     <td><img src="webroot/uploads/<?php echo $row['image']?>" alt="image" class="avatar_user"></td>
                    <td><?php echo $row['created'];  ?></td>
                    <td><a href="admin.php?controller=product&action=edit_product&id=<?php echo $id ?>">Edit</a> | <a href="admin.php?controller=product&action=delete_product&id=<?php echo $id;  ?>">Delete</a></td>
                  </tr>
                <?php 
                  }
                } else {?>
                <tr>
                  <td colspan="5">Khong co san pham nao nao</td>
                </tr>
                <?php }?>
            </table>
          </div>
        </div>
       </div>
      </div>
    </section>
  </div>
<?php include 'common/footer.php';?>
