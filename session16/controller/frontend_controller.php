<?php 
	include 'model/frontend_model.php';
	class FrontendController {
		function handleRequest() {
			$controller = isset($_GET['controller'])?$_GET['controller']:'home';
			$action = isset($_GET['action'])?$_GET['action']:'home';
			switch ($controller) {
				case 'home':
					$this->handeHome($action);
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
		function handeHome($action) {

		}
		function handleUser($action) {
				switch ($action) {
					case 'register':
						if (isset($_POST['register'])) {
							$role = $_POST['role'];
							$username = $_POST['username'];
							$password = md5($_POST['password']);
							$name = $_POST['name'];
							$email = $_POST['email'];
							$phone = $_POST['phone'];
							$birthday = date('Y-m-d', strtotime($_POST['birthday']));
							$avatar = 'default.png';
							$pathUpload = 'webroot/uploads/users/';
							if ($_FILES['avatar']['error'] == 0) {
								move_uploaded_file($_FILES['avatar']['tmp_name'], $pathUpload.$_FILES['avatar']['name']);
								$avatar = $_FILES['avatar']['name'];
							}
							// save vao database
							$model = new FrontendModel();
							$errorExistUser = '';
							$checkExistUser = $model->checkExistUser($username, $email);
							if ($checkExistUser->num_rows == 0) {
								if ($model->register($role, $username, $password, $name, $email, $phone, $birthday, $avatar) === TRUE) {
									// Dang nhap luon, sau khi dang ky thanh cong
									$_SESSION['login'] = $username;
									header("Location: index.php");

								}
							} else {
								$errorExistUser = "Exist username or email";
							}

						}
						include 'view/users/register.php';
						break;
					case 'login':
						if (isset($_POST['login'])) {
							$username = $_POST['username'];
							$password = md5($_POST['password']);
							$model = new FrontendModel();
							$checkogin = $model->login($username, $password);
							if ($checkogin->num_rows > 0) {
								$_SESSION['login'] = $username;
								header("Location: index.php");
							}
						}
						include 'view/users/login.php';
						# code...
						break;
					case 'logout':
						unset($_SESSION['login']);
						header("Location: index.php");
					case 'delete_user':
						$id = $_GET['id'];

						if ($model->deleteUser($id) === TRUE) {
							header("Location: index.php?controller=user&action=list_user");
						}
						break;
					case 'edit_user':
						$id = $_GET['id'];
							$editUser =$model->getUser($id);
							// edit
							if (isset($_POST['edit_user'])) {
								$username = $_POST['username'];
							  $password = md5($_POST['password']);
							  $avatar = 'default.jpg';
							  if ($_FILES['avatar']['error'] == 0) {
								$oldImage = $avatar;
							  $avatar = uniqid().'_'.$_FILES['avatar']['name'];
							  move_uploaded_file($_FILES['avatar']['tmp_name'], 'webroot/uploads/users/'.$avatar);
							  // Xoa anh cu neu chon anh moi (tru truong hop a cu la anh default)
							  if ($oldImage != 'default.jpg') {
	           					 unlink("webroot/uploads/users/".$oldImage);  
	         				 }
							}
							 // edit vao database
							if ($model->editUser($id,$username, $password, $avatar) === TRUE) {
								header("Location: index.php?controller=user&action=list_user");
							}
							}
							include 'view/user/edit_user.php';
							break;
					default:
						# code...
						break;
				}
		}
		function handleProduct($action) {
			switch ($action) {
				case 'list_product':
					$this->checkLoginSession();
					$model = new FrontendModel();
					$listProduct = $model->listProduct();
					include 'view/products/list_product.php';
					break;
				case 'add_product':
					$this->checkLoginSession();
					$model = new FrontendModel();
					if (isset($_POST['add_product'])) {
						$name = $_POST['name'];
						$description = $_POST['description'];
						$price = $_POST['price'];
						$image = 'default.jpg';
						$created = date('Y-m-d h:i:s');
						if ($_FILES['image']['error'] == 0) {
							$oldImage = $image;
						  $image = uniqid().'_'.$_FILES['image']['name'];
						  move_uploaded_file($_FILES['image']['tmp_name'], 'webroot/uploads/users/'.$image);
						  // Xoa anh cu neu chon anh moi (tru truong hop a cu la anh default)
						  if ($oldImage != 'default.jpg') {
            					unlink("webroot/uploads/users/".$oldImage);  
        				  }
						}
						
						if($model->addProduct($name, $description, $price, $image,$created) === TRUE){
							header("Location: index.php?controller=product&action=list_product");
						}
						# code...
					}
					include 'view/products/add_product.php';
					break;
				case 'product_detail':
					$model = new FrontendModel();
					$id = $_GET['id'];
					$productDetail = $model->getProductDetail($id);
					$editProductDetail = $model->productDetail($id);
					include 'view/products/product_detail.php';
					break;
				case 'edit_product':
					$id = $_GET['id'];
						$editProduct =$model->getProduct($id);
						// edit
						if (isset($_POST['edit_product'])) {
							$name = $_POST['name'];
						  	$description = $_POST['description'];
						  	$price = $_POST['price'];
						  	if ($_FILES['image']['error'] == 0) {
							$oldImage = $image;
						  $image = uniqid().'_'.$_FILES['image']['name'];
						  move_uploaded_file($_FILES['image']['tmp_name'], 'webroot/uploads/'.$image);
						  // Xoa anh cu neu chon anh moi (tru truong hop a cu la anh default)
						  if ($oldImage != 'default.jpg') {
            					unlink("webroot/uploads/users/".$oldImage);  
        				  }
						}
						 // edit vao database
						if ($model->editProduct($id,$title, $description, $price, $image) === TRUE) {
							header("Location: index.php?controller=product&action=list_product");
						}
						}
						include 'view/products/edit_product.php';
						break;	
				case 'delete_product':
					$id = $_GET['id'];
					if($model->deleteProduct($id)===TRUE){
					header("Location: index.php?controller=product&action=list_product");
					}
					break;
				default:
					# code...
					break;
			}
		}

		function checkLoginSession() {
			if (!isset($_SESSION['login'])) {
				header("Location: index.php");
			}
		}
	}
?>