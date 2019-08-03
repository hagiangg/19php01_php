<?php include 'common/header.php';?>
<?php  
    $errTextName  = $errTextPass = $errTextAvatar =''; 
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit user
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit user</li>
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
              <h3 class="box-title">Edit user</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="admin.php?controller=user&action=edit_user&id=<?php echo $id?>" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group <?php echo $errClassName;?>">
                <label for="exampleInputEmail1">name user: </label>
                <input type="text" class="form-control" id="exampleInputName" placeholder="Enter name"  name="username" required value="<?php echo $editUser['username'];?>">
                <span class="help-block"><?php echo $errTextName;?></span>
              </div>
              <div class="form-group <?php echo $errClassEmail;?>">
                <label for="exampleInputEmail1">password</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="password" required value="<?php echo $editUser['password'];?>">
                  <span class="help-block"><?php echo $errTextPass;?></span>
              </div>
              <div class="form-group <?php echo $errClassAvatar ?>">
                <label for="exampleInputFile">Avatar</label>
                <input type="file" id="exampleInputFile" class="form-control" name="avatar" required value="<?php echo $editUser['avatar']  ?>" value="<?php echo $avatar; ?>">
                <span class="help-block"><?php echo $errTextAvatar;?></span>
                <img class="avatar_user" src="webroot/uploads/<?php echo $editUser['avatar']?>" alt ="image">
              </div>
              
                
                <button type="submit" class="btn btn-primary" name="edit_user_form">Update</button>
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