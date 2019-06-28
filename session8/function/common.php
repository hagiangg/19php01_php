<?php 
    function checkExistNameProduct($name, $connect){
      $sql = "SELECT name FROM products WHERE name = '$name'";
      $result = mysqli_query($connect, $sql);
      return $result->num_rows;
    }
?>