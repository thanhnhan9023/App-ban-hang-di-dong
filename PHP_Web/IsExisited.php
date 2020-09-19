<?php
	$ten=$_GET['u'];
	include("connect.php");
	$sql="SELECT * FROM thanhvien WHERE tendangnhap='$ten'";
	$result=$con->query($sql);
	$sodong=$result->num_rows;
	if($sodong>0){
		echo "<br/>đã tồn tại tên";
	}else{
			
	}
	$con->close();
?>
