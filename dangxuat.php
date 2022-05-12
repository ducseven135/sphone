<?php 
session_start(); 
 
if (isset($_SESSION['usernane'])){
    unset($_SESSION['usernane']);
}
header('location:./dangnhap.php')
?>
