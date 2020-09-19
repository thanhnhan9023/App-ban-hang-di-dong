<?php
	include("connect.php");
	$ma=$_POST['MaTaiKhoan'];
	$sql="SELECT * FROM taikhoan WHERE MaTaiKhoan = '$ma' ";
	$Dta=$con->query($sql);
	$row=$Dta->fetch_array();
	if($row['diachi']!=null){
		echo $row['diachi'];
	}else{
		echo "error";
	}
?>