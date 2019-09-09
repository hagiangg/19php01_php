<?php 
include 'config/database.php';

class FrontendModel extends DatabaseConnect {

	function register($role, $username, $password, $name, $email, $phone, $birthday, $avatar) {
		$created = date('Y-m-d h:i:s');
		$sql = "INSERT INTO users(role, username, password, name, email, phone, birthday, avatar, created) VALUES ('$role', '$username', '$password', '$name', '$email', '$phone', '$birthday', '$avatar', '$created')";
		return mysqli_query($this->connect(), $sql);
	}

	function login($username, $password) {
		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		return mysqli_query($this->connect(), $sql);

	}

	function checkExistUser($username, $email) {
		$sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
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
	function editUser($id, $username, $password, $avatar){
			$sql = "UPDATE users SET username = '$username', password = '$password',avatar = '$avatar' WHERE id = $id";
			return mysqli_query($this->connect(),$sql);
		}
	function listProduct(){
		$sql = "SELECT * FROM products";
		return mysqli_query($this->connect(),$sql);
	}

	function addProduct($name, $description, $price, $image){
		$sql = "INSERT INTO products(name, description, price, image) VALUES ('$name','$description','$price','$image')";
		return mysqli_query($this->connect(),$sql);
	}

	function getProductDetail($id) {
		$productDetail = 'Chi tiet san pham '.$id;
		return $productDetail;
	}

	function productDetail($id) {
		$sql = "SELECT * FROM products WHERE id= $id";
		return mysqli_query($this->connect(),$sql);
	}
	function getProduct($id){
			$sql = "SELECT * FROM products WHERE id = $id";
			$result = mysqli_query($this->connect(),$sql);
			return $result->fetch_assoc();
		}
	function deleteProduct($id){
			$sql = "DELETE FROM products WHERE id= $id";
			return mysqli_query($this->connect(),$sql);
		}
	function editProduct($id, $name, $description, $price, $image){
			$sql = "UPDATE products SET name ='$name', description = '$description', price ='$price', image = '$image' WHERE id= $id";
			return mysqli_query($this->connect(), $sql);
		}

}

?>