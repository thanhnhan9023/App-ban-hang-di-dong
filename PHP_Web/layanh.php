<?php
	include("connect.php");
	if(isset($_GET['ctspa'])){
		$id=$_GET['ctspa'];
		$result="SELECT * FROM sanpham WHERE id=$id";
		$select=$con->query($result);
		$row=$select->fetch_assoc();
		echo $row['hinhanhsanpham'];
	}
?>