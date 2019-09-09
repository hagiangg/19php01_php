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

						if ($model->deleteUser($id) === TRUE) {
							header("Location: admin.php?controller=user&action=list_user");
						}
						break;
				case 'edit_user':
					$id = $_GET['id'];
					$editUser =$model->getUser($id);
					$model = new BackendModel();
					// edit
					if (isset($_POST['edit_user'])) {
						$username = $_POST['username'];
					  	$role = $_POST['role'];
					}
					 // edit vao database
					if ($model->editUser($id,$username, $role) === TRUE) {
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