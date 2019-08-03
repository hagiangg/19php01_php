<?php 
// khoi tao session
 session_start();
 
 // gan gia tri cho session
 $_SESSION['name'] = 'SDC';
 $_SESSION['class'] = '19PHP01';
// su dung session
 echo $_SESSION['name'];
 echo "<br>";
 echo $_SESSION['class'];
// giai phong session
 unset($_SESSION['name']);
?>
