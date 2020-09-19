<?php
	include("connect.php");
	//$ho='nam';
//	$ten='nam';
	//$email='trananhphuoc0603@gmail.com';
	//$matkhau=md5('bghghuyuyuyuyu');
	//$sdt='0943597722';//$_POST['sdt'];
	//$gioitinh='nam';
	$ho=$_POST['ho'];
	$ten=$_POST['ten'];
	$email=$_POST['email'];
	$matkhau=md5($_POST['matkhau']);
	$sdt=$_POST['sdt'];
	$gioitinh=$_POST['gioitinh'];
	$kiemtra="SELECT * FROM taikhoan WHERE Email='$email' OR SDT='$sdt'";
	$dchi=$_POST['diachi'];
	$tontai=$con->query($kiemtra);
	if($tontai->num_rows >= 1){
		echo "Tài Khoản Đã Tồn Tại";
	}else{
		$sql="INSERT INTO taikhoan  VALUES(null,'$ho','$ten','$email','$matkhau','$sdt','$gioitinh',2,'$dchi')";
		$Dta=$con->query($sql);
		if($Dta){
		echo "success";
		}else{
		echo "error";
		}
	}
	
?>