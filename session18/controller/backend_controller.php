<?php 
	include 'model/backend_model.php';
	class BackendController {

		function handleRequest() {
			$controller = isset($_GET['controller'])?$_GET['controller']:'dashboard';
			$action = isset($_GET['action'])?$_GET['action']:'home';
			switch ($controller) {
				case 'home':
					$this->handeDashboard($action);
					break;
				case 'user':
					$this->handleUser($action);
					break;
				case 'product':
					$this->handleProduct($action);
					break;
				default:
					# code...
					break;
			}
		}

		function handleProduct($action) {
			switch ($action) {
				case 'add_product_category':
					if (isset($_POST['add'])) {
						$name = $_POST['name'];
						$model = new BackendModel();
					  if ($model->addProductCategory($name) === TRUE) {
					  	header("Location: admin.php");
					  }
					}
					include 'view/products/add_product_category.php';
					# code...
					break;
				case 'add_product':
				  $model = new BackendModel();
					$categories = $model->getCategory();
					if (isset($_POST['add'])) {
						$name = $_POST['name'];
						$price = $_POST['price'];
						$description = $_POST['description'];
						$product_category_id = $_POST['product_category_id'];
						$image = "default.png";
						if ($_FILES['image']['error'] == 0) {
							$image = $_FILES['image']['name'];
							$pathUpload = 'webroot/uploads/products/';
						}
					  if ($model->addProduct($name, $price, $description, $product_category_id, $image) === TRUE) {
					  	move_uploaded_file($_FILES['image']['tmp_name'], $pathUpload.$image);
					  	header("Location: admin.php?controller=product&action=list_product");
					  }
					}
					include 'view/products/add_product.php';
					# code...
					break;
				case 'list_product':
					# code...
					$model = new BackendModel();
					$listProduct = $model->getListProduct();
					include 'view/products/list_product.php';
					break;
				case 'edit_product':
					$id = $_GET['id'];
					$model = new BackendModel();
					$editProduct =$model->getProduct($id);
					// edit
					if (isset($_POST['edit_product'])) {
						$name = $_POST['name'];
					  	$description = $_POST['description'];
					  	$price = $_POST['price'];
					  	$product_category_id = $_POST['product_category_id'];
					  	if ($_FILES['image']['error'] == 0) {
						$oldImage = $image;
					  $image = uniqid().'_'.$_FILES['image']['name'];
					  move_uploaded_file($_FILES['image']['tmp_name'], 'webroot/uploads/products/'.$image);
					  // Xoa anh cu neu chon anh moi (tru truong hop a cu la anh default)
					  if ($oldImage != 'default.jpg') {
        					unlink("webroot/uploads/products/".$oldImage);  
    				  }
					}
					 // edit vao database
					if ($model->editProduct($id,$name, $description, $price, $image) === TRUE) {
						header("Location: admin.php?controller=product&action=list_product");
					}
					}
					include 'view/products/edit_product.php';
					break;	
				case 'delete_product':
					$id = $_GET['id'];
					$model = new BackendModel();
					if($model->deleteProduct($id)===TRUE){
					header("Location: admin.php?controller=product&action=list_product");
					}
					break;
				default:
					# code...
					break;
			}
		}
		function handleUser($action) {
			switch ($action) {
				case 'list_user':
					# code...
					$model = new BackendModel();
					$listUser = $model->getListUser();
					include 'view/users/list_user.php';
				break;
			
				case 'delete_user':
					$id = $_GET['id'];
					$model = new BackendModel();
					if ($model->deleteUser($id) === TRUE) {
						header("Location: admin.php?controller=user&action=list_user");
					}
					break;
				case 'edit_user':
					$id = $_GET['id'];
					$model = new BackendModel();
					$editUser =$model->getUser($id);
					// edit
					if (isset($_POST['edit_user'])) {
						$username = $_POST['username'];
					  $password = md5($_POST['password']);
					}
					 // edit vao database
					if ($model->editUser($id,$username, $password) === TRUE) {
						header("Location: admin.php?controller=user&action=list_user");
					}
					
					include 'view/user/edit_user.php';
					break;
				default:
					# code...
					break;
			}
		}
	}
?>