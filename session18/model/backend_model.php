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
	function editUser($id, $username, $password){
		$sql = "UPDATE users SET username = '$username', password = '$password' WHERE id = $id";
		return mysqli_query($this->connect(),$sql);
	}
	
	function addProductCategory($name) {
		$sql = "INSERT INTO product_categories(name) VALUES('$name')";
		return mysqli_query($this->connect(), $sql);	
	}

	function getCategory() {
		$sql = "SELECT * FROM product_categories";
		return mysqli_query($this->connect(), $sql);
	}

	function addProduct($name, $price, $description, $product_category_id, $image) {
		$created = date('Y-m-d h:i:s');
		$sql = "INSERT INTO products(name, price, description, product_category_id, image, created) VALUES('$name', '$price', '$description', $product_category_id, '$image', '$created')";
		return mysqli_query($this->connect(), $sql);
	}

	function getListProduct() {
		$sql = "SELECT products.id,
		 products.name,
		 products.description,
		 products.price,
		 products.image,
		 product_categories.name as product_category_name
		 FROM products 
		 INNER JOIN product_categories ON products.product_category_id = product_categories.id
		 ";
		return mysqli_query($this->connect(), $sql);
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