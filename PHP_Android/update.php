<?php
	include("ketnoi.php");
	$id=$_POST['idSV'];
	$hoten=$_POST['hotenSV'];
	$namsinh=$_POST['namsinhSV'];
	$diachi=$_POST['diachiSV'];
	$sql="UPDATE student SET hoten='$hoten',namsinh='$namsinh',diachi='$diachi' WHERE id='$id'";
	if($con->query($sql)){
		echo "success";
	}else{
		echo "error";
	}
?>