<?php 
	include 'connect.php';
	include 'register.php';
	$id = $_GET['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$sql = "UPDATE 'user' SET name = '$name', email = '$email' WHERE id = '$id'";
	if (mysqli_query($connect, $sql) === TRUE) {
		// Xoa thanh cong thi tro ve trang list user
		header("Location: list_user.php");
	}
?>