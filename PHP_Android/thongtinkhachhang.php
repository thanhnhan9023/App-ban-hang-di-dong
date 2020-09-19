<?php
	include("connect.php");
	$hoten=$_POST['tenkhachhang'];
	$sdt=$_POST['sodienthoai'];
	$mail=$_POST['email'];
	$sql="INSERT INTO donhang(id,tenkhachhang,sodienthoai,email) VALUES(null,'$hoten','$sdt','$mail')";
	if($con->query($sql)){
		$iddonhang=$con->insert_id;
		echo $iddonhang;
	}else{
		echo "error";
	}
?>