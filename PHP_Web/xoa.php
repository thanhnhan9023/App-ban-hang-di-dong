<?php
if(!isset($_COOKIE['dangnhap']) &&  !isset($_COOKIE['matkhau'])){
		header("location:dangnhaptrenweb.php");
	}
	include("connect.php");
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$delete="DELETE FROM sanpham Where id=$id";
		$con->query($delete);
		header('location: danhsachpsanpham.php');
	}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>