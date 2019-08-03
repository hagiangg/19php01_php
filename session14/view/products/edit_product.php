<?php include 'common/header.php';?>
<?php  
    $errTextTitle  = $errTextDescription = $errTextImage = $errTextPrice = ''; 
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit product
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit product</li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="admin.php?controller=user&action=edit_product&id=<?php echo $id?>" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group <?php echo $errClassTitle;?>">
                  <label for="exampleInputEmail1">Product title </label>
                  <input type="text" class="form-control" id="exampleInputName" placeholder="Enter title"  name="title" required value="<?php echo $editProduct['title']  ?>">
                  <span class="help-block"><?php echo $errTextTitle;?></span>
                </div>
                <div class="form-group <?php echo $errClassDescription;?>">
                  <label for="exampleInputEmail1">Description </label>
                  <textarea type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter description" name="description"> <?php echo  $editProduct['description'];  ?></textarea>
                 
                    <span class="help-block"><?php echo $errTextDescription;?></span>
                </div>
                <div class="form-group <?php echo $errClassPrice;?>">
                  <label for="exampleInputEmail1">Price </label>
                  <input type="text" class="form-control" id="exampleInputName" placeholder="Enter price"  name="price" required value="<?php echo $editProduct['price']  ?>">
                  <span class="help-block"><?php echo $errTextPrice;?></span>
                </div>
                <div class="form-group <?php echo $errClassImage ?>">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" id="exampleInputFile" class="form-control" name="image">
                  <img class="avatar_user" src="uploads/<?php echo $editProduct['image']?>" alt ="image">
                  <span class="help-block"><?php echo $errTextImage;?></span>
                 
                </div>
              
                
                <button type="submit" class="btn btn-primary" name="edit_product_form">Update</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include 'common/footer.php';?>