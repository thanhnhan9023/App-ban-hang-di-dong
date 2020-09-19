<?php
	include("ketnoi.php");
	$id=$_POST['idSVi'];
	$sql="DELETE FROM student WHERE id='$id'";
	if($con->query($sql)){
		echo "success";
	}else{
		echo "error";
	}
?>