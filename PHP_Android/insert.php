<?php
	include("ketnoi.php");
	$hoten=$_POST['hotenSV'];
	$namsinh=$_POST['namsinhSV'];
	$diachi=$_POST['diachiSV'];
	$sql="INSERT INTO student(hoten,namsinh,diachi) VALUES('$hoten','$namsinh','$diachi')";
	if($con->query($sql)){
		echo "success";
	}else{
		echo "error";
	}

?>