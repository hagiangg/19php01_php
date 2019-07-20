<?php 
	include 'config/database.php';

	class Model extends DatabaseConnect {

		function addUser($username, $password, $avatar) {
			$sql = "INSERT INTO users(username, password, avatar) VALUES ('$username', '$password', '$avatar')";
			return mysqli_query($this->connect(), $sql);
		}

		public function listUser() {
			$sql = "SELECT * FROM users";
			$listUser = mysqli_query($this->connect(), $sql);
			return $listUser;
		}

		public function checkLogin($username, $password) {
			$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
			$listUser = mysqli_query($this->connect(), $sql);
			return $listUser;
		}

		public function deleteUser($id) {
			$sql = "DELETE FROM users WHERE id = $id";
			return mysqli_query($this->connect(), $sql);
			
		}
		public function getUser($id) {
			$sql = "SELECT * FROM users WHERE id = $id";
			$result = mysqli_query($this->connect(), $sql);
			return $result->fetch_assoc();
		}
		public function editUser($id, $username, $password, $avatar){
			$sql = "UPDATE users SET username = '$username', password = '$password',avatar = '$avatar' WHERE id = $id";
			return mysqli_query($this->connect(),$sql);
		}
	}
?>