<?php 
include 'config/database.php';
class BackendModel extends DatabaseConnect {

	function getListUser() {
		$sql = "SELECT * FROM users";
		return mysqli_query($this->connect(), $sql);
	}
	function deleteUser($id) {
			$sql = "DELETE FROM users WHERE id = $id";
			return mysqli_query($this->connect(), $sql);
			
		}
	function getUser($id) {
			$sql = "SELECT * FROM users WHERE id = $id";
			$result = mysqli_query($this->connect(), $sql);
			return $result->fetch_assoc();
		}
	function editUser($id, $username, $role){
			$sql = "UPDATE users SET username = '$username', role = '$role' WHERE id = $id";
			return mysqli_query($this->connect(),$sql);
		}
}

?>