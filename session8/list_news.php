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
    <!-- Main content -->
    <section class="content">
	    
        <?php 
        require_once'connect.php';
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
        } else {
          $page = 1;
        }
       
        $number_per_page = 4;
        $start_from = ($page -1)* 4;
        $query = "SELECT * FROM products limit $start_from,$number_per_page";
        $result = mysqli_query($connect, $query);
        ?>
	     <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List news</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Image</th>
                  <th>Created</th>
                  
                </tr>
               <?php 
               if ($result->num_rows > 0) {
               	while($row = $result->fetch_assoc()) {
               		$id = $row['id'];
               ?>
	                <tr>
	                  <td><?php echo $row['id']?></td>
	                  <td><?php echo $row['name']?></td>
	                  <td>
	                    <?php echo $row['price']?>
	                  </td>
                    <td><img src="uploads/products/<?php echo $row['image']?>" alt="image" class="avatar_user"></td>
                     <td><?php echo $row['created']?></td>
	                </tr>
                <?php 
                	}
                } else {?>
                <tr>
                	<td colspan="4">Khong co san pham nao</td>
                </tr>
                <?php }?>
              </table>
            </div>
          </div>
        </div>
      </div>
      
       <?php 
        $pr_query = "SELECT * FROM products";
        $pr_result = mysqli_query($connect, $pr_query);
        $totalrecords = mysqli_num_rows($pr_result);
        //echo $total_records;
        $totalPages = ceil($totalrecords/ $number_per_page);
        //echo $totalPage;
        for ($i = 1; $i <= $totalPages; $i++) {
          echo "<a class = 'btn btn-success' href='list_news.php?page=".$i."'>$i</a>";
        }

       ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include 'common/footer.php';?>