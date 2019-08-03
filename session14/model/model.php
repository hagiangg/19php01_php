<?php 
	include 'config/database.php';

	class Model extends DatabaseConnect {

		function register($username, $password, $avatar) {
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
		//product
		public function addProduct($title, $description, $price, $image){
			$sql = "INSERT INTO products(title, description, price, image) VALUES ('$title','$description','$price','$image')";
			return mysqli_query($this->connect(),$sql);
		}
		public function listProduct(){
			$sql = "SELECT * FROM products";
			$listProduct = mysqli_query($this->connect(),$sql);
			return $listProduct;
		}
		public function getProduct($id){
			$sql = "SELECT * FROM products WHERE id = $id";
			$result = mysqli_query($this->connect(),$sql);
			return $result->fetch_assoc();
		}
		public function deleteProduct($id){
			$sql = "DELETE FROM products WHERE id= $id";
			return mysqli_query($this->connect(),$sql);
		}
		public function editProduct($id, $title, $description, $price, $image){
			$sql = "UPDATE products SET title ='$title', description = '$description', price ='$price', image = '$image' WHERE id= $id";
			return mysqli_query($this->connect(), $sql);
		}
	}
?>