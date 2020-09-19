<?php
	include("connect.php");
	$ma=$_POST['MaTaiKhoan'];
	$diachi=$_POST['diachi'];
	$sql="UPDATE taikhoan SET diachi='$diachi'  WHERE MaTaiKhoan = '$ma' ";
	if($con->query($sql))
	{
		echo "success";
		}
	else 
	{
		echo "error";
		}
?>