<?php include 'common/header.php';?>
<?php  
    $errTextName  = $errTextPass = $errTextAvatar =''; 
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Register
      </h1>
      <p>Hi <?php echo $_SESSION['login'];?></p>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Register</li>
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
              <h3 class="box-title">Register form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="admin.php?controller=product&action=register" method="POST" enctype="multipart/form-data">
              <div class="box-body">
        <div class="form-group <?php echo $errClassName;?>">
          <label for="exampleInputEmail1">Name user </label>
          <input type="text" class="form-control" id="exampleInputName" placeholder="Enter name"  name="username">
          <span class="help-block"><?php echo $errTextName;?></span>
        </div>
        <div class="form-group <?php echo $errClassEmail;?>">
          <label for="exampleInputEmail1">Password </label>
          <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Enter password" name="password">
            <span class="help-block"><?php echo $errTextPass;?></span>
        </div>
        <div class="form-group <?php echo $errClassAvatar ?>">
          <label for="exampleInputFile">Avatar </label>
          <input type="file" id="exampleInputFile" class="form-control" name="avatar">
          <span class="help-block"><?php echo $errTextAvatar;?></span>
         
        </div>
          
          <button type="submit" class="btn btn-primary" name="register">Register</button>
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