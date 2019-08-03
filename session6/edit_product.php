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
      
      // lay thong tin cu cua user can edit
      $id = $_GET['id'];
      $sql = "SELECT * FROM products WHERE id = $id";
      $editUser = mysqli_query($connect, $sql);
      $editUserDetail = $editUser->fetch_assoc();
      // ket thuc
     $errClassProduct = $errClassPrice = $errDescribe = $errDayCreate = $errAvatar = '';
      $errTextProduct = $errTextPrice = $errTextDescribe = $errTextDay = $errTextAvatar = '';
      $product = $price = $description = $dayCreate = $avatar = '';
      if (isset($_POST['edit'])) {
        $product  = $_POST['product'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $dayCreate = $_POST['dayCreate'];
        // chuyen dinh dang bithday sang Nam-thang-ngay
        $dayCreate = date("Y-m-d", strtotime($dayCreate));

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
          $errTextDescribe = 'Please input your describe';
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
          $sql = "UPDATE products SET product = '$product', price = '$price', description = '$description', dayCreate = '$dayCreate', avatar = '$avatar' WHERE id = '$id'";
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
              <h3 class="box-title">Product form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="#" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group <?php echo $errClassProduct;?>">
                  <label for="exampleInputEmail1">Product</label>
                  <input type="text" class="form-control" id="exampleInputName" placeholder="Enter product" name="product" value="<?php echo $editUserDetail['product'];?>">
                  <span class="help-block"><?php echo $errTextProduct;?></span>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Price</label>
                  <input type="text" name="price" value="<?php echo $editUserDetail['price'];?>"class="form-control" id="exampleInputEmail1" placeholder="Enter price">
                  <span class="help-block"><?php echo $errTextPrice;?></span>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Describe</label>
                  <input type="text" name="description" value="<?php echo $editUserDetail['description'];?>"class="form-control" id="exampleInputPhone" placeholder="Enter description">
                  <span class="help-block"><?php echo $errTextDescribe;?></span>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Picture</label>
                  <input type="file" name="avatar" id="exampleInputFile" value="<?php echo $editUserDetail['avatar'];?>">
                  <span class="help-block"><?php echo $errTextAvatar;?></span>
                </div>
              
              <div class="form-group">
                <label>Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="dayCreate" value="<?php echo $editUserDetail['dayCreate'];?>" class="form-control pull-right" id="dayCreate">
                </div>
                <span class="help-block"><?php echo $errTextDay;?></span>
                <!-- /.input group -->
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="edit">Submit</button>
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