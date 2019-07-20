<?php 
	include 'model/model.php';
	class Controller {

		function handleRequest(){
			$model = new Model();
			$controller = isset($_GET['controller'])?$_GET['controller']:'home';
			$action = isset($_GET['action'])?$_GET['action']:'index';

			switch ($controller) {
				case 'home':
					# code...
					echo "Ban dang dung o homepage";
					break;
				case 'user':
					# code...
					$this->handleUser($action, $model);
					break;
				case 'news':
					# code...
					$this->handleNews();
					break;
				case 'product':
					# code...
					break;
				
				default:
					# code...
					break;
			}
		}

		function handleUser($action, $model) {
			switch ($action) {
				case 'add_user':
					$this->checkLoginSession();
					# code...
					if (isset($_POST['add_user'])) {
						$username = $_POST['username'];
						$password = md5($_POST['password']);
						$avatar = 'default.jpg';
						if ($_FILES['avatar']['error'] == 0) {
							$oldImage = $avatar;
						  $avatar = uniqid().'_'.$_FILES['avatar']['name'];
						  move_uploaded_file($_FILES['avatar']['tmp_name'], 'webroot/uploads/'.$avatar);
						  
	           			}
						if($model->addUser($username, $password, $avatar) === TRUE){
							header("Location: admin.php?controller=user&action=list_user");
						}
						# code...
					}
					include 'view/user/add_user.php';
					break;
				case 'list_user':
					$this->checkLoginSession();
					# code...
					$listUser = $model->listUser();
					include 'view/user/list_user.php';
					break;
				case 'login':
					# code...
					if (isset($_POST['login'])) {
						$username = $_POST['username'];
						$password = md5($_POST['password']);
						$checkLogin = $model->checkLogin($username, $password);
						if($checkLogin->num_rows > 0){
							$_SESSION['login'] = $username;
							header("Location: admin.php?controller=user&action=list_user");
						} else {
							header("Location: admin.php?controller=user&action=login");
						}
						# code...
					}
					include 'view/user/login.php';
					break;
				case 'logout':
					unset($_SESSION['login']);
					header("Location: admin.php?controller=user&action=login");
					break;
				case 'delete_user':
					$id = $_GET['id'];

					if ($model->deleteUser($id) === TRUE) {
						header("Location: admin.php?controller=user&action=list_user");
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
						  move_uploaded_file($_FILES['avatar']['tmp_name'], 'webroot/uploads/'.$avatar);
						  // Xoa anh cu neu chon anh moi (tru truong hop a cu la anh default)
						  if ($oldImage != 'default.jpg') {
           					 unlink("webroot/uploads/".$oldImage);  
         				 }
						}
						 // edit vao database
						if ($model->editUser($id,$username, $password, $avatar) === TRUE) {
							header("Location: admin.php?controller=user&action=list_user");
						}
						}
						include 'view/user/edit_user.php';
						break;	
				default:
					# code...
					break;
			}
		}

		function handleNews() {

		}

		function checkLoginSession() {
			if (!isset($_SESSION['login'])) {
				header("Location: admin.php?controller=user&action=login");
			}
		}
	}
?>