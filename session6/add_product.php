<?php include 'common/header.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <?php 
      include 'connect.php';
      $errClassProduct = $errClassPrice = $errDescribe = $errDayCreate = $errAvatar = '';
      $errTextProduct = $errTextPrice = $errTextDescribe = $errTextDay = $errTextAvatar = '';
      $product = $price = $description = $dayCreate = $avatar = '';
      if (isset($_POST['addproduct'])) {
        $product  = $_POST['product'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $dayCreate = $_POST['dayCreate'];
        // chuyen dinh dang bithday sang Nam-thang-ngay
        $dayCreate = date("Y-m-d", strtotime($dayCreate));
        $avatar = 'default.png';
        // avatar

        if ($product == '') {
          $errClassProduct = 'has-error';
          $errTextProduct = 'Please input your product';
        }
        if ($price == '') {
          $errClassPrice = 'has-error';
          $errTextPrice = 'Please input your price';
        }
        if ($description == '') {
          $errDescribe = 'has-error';
          $errTextDescribe = 'Please input your description';
        }

        if ($dayCreate == '') {
          $errDayCreate = 'has-error';
          $errTextDay = 'Please input your day create';
        }
        if ($avatar == '') {
          $errAvatar = 'has-error';
          $errTextAvatar = 'Please chose your avatar';
        }
        if ($product != '' && $price != '' && $description != '' && $dayCreate != '' && $avatar != '') {
          //upload avatar
          if ($_FILES['avatar']['error'] == 0) {
            $avatar = uniqid().'_'.$_FILES['avatar']['name'];
            move_uploaded_file($_FILES['avatar']['tmp_name'], 'uploads/avatar/'.$avatar);
          }
          //
          $sql = "INSERT INTO products(product, price, description, dayCreate, avatar) VALUES ('$product', '$price', '$description', '$dayCreate', '$avatar')";
          if (mysqli_query($connect, $sql) === TRUE) {
            // chuyen trang trong PHP
            header("Location: list_product.php");
          }
        }
      }
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="#" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group <?php echo $errClassProduct;?>">
                  <label for="exampleInputEmail1">Product</label>
                  <input type="text" class="form-control" id="exampleInputName" placeholder="Enter product" name="product" value="<?php echo $product;?>">
                  <span class="help-block"><?php echo $errTextProduct;?></span>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Price</label>
                  <input type="text" name="price" value="<?php echo $price;?>"class="form-control" id="exampleInputEmail1" placeholder="Enter price">
                  <span class="help-block"><?php echo $errTextPrice;?></span>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Describe</label>
                  <input type="text" name="description" value="<?php echo $description;?>"class="form-control" id="exampleInputPhone" placeholder="Enter description">
                  <span class="help-block"><?php echo $errTextDescribe;?></span>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Picture</label>
                  <input type="file" name="avatar" id="exampleInputFile" value="<?php echo $avatar;?>">
                  <span class="help-block"><?php echo $errTextAvatar;?></span>
                </div>
              
              <div class="form-group">
                <label>Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="dayCreate" value="<?php echo $dayCreate;?>" class="form-control pull-right" id="dayCreate">
                </div>
                <span class="help-block"><?php echo $errTextDay;?></span>
                <!-- /.input group -->
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="addproduct">Submit</button>
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