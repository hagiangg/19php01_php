<?php include 'common/header.php';?>
<?php  
    $errTextTitle  = $errTextDescription = $errTextImage = $errTextPrice = ''; 
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add product
      </h1>
      <p>Hi <?php echo $_SESSION['login'];?></p>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add product</li>
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
              <h3 class="box-title">Add product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="admin.php?controller=product&action=add_product" method="POST" enctype="multipart/form-data">
              <div class="box-body">
        <div class="form-group <?php echo $errClassTitle;?>">
          <label for="exampleInputEmail1">Product title </label>
          <input type="text" class="form-control" id="exampleInputName" placeholder="Enter title"  name="title">
          <span class="help-block"><?php echo $errTextTitle;?></span>
        </div>
        <div class="form-group <?php echo $errClassDescription;?>">
          <label for="exampleInputEmail1">Description </label>
          <textarea type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter description" name="description"></textarea>
            <span class="help-block"><?php echo $errTextDescription;?></span>
        </div>
        <div class="form-group <?php echo $errClassImage ?>">
          <label for="exampleInputFile">Image</label>
          <input type="file" id="exampleInputFile" class="form-control" name="image">
          <span class="help-block"><?php echo $errTextImage;?></span>
        </div>
        <div class="form-group <?php echo $errClassPrice;?>">
          <label for="exampleInputEmail1">Price: </label>
          <input type="text" class="form-control" id="exampleInputName" placeholder="Enter price"  name="price">
          <span class="help-block"><?php echo $errTextPrice;?></span>
        </div>
          
          <button type="submit" class="btn btn-primary" name="add_product">Add product</button>
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