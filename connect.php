<?php 
	$conn = mysqli_connect("localhost","root","","bandienthoai");
	if(!$conn){
		die("Kết nối không thành công!");
	}
	mysqli_query($conn,"SET NAMES 'utf8'");
?>