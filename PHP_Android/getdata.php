<?php
	include("ketnoi.php");
	$result="SELECT * FROM student";
	$select=$con->query($result);
	class SinhVien{
	function SinhVien($id,$hoten,$namsinh,$diachi){
		$this->id=$id;
		$this->HoTen=$hoten;
		$this->NamSinh=$namsinh;
		$this->DiaChi=$diachi;
		}
	}
	$mangSV=array();
	while($row=$select->fetch_assoc()){
			array_push($mangSV,new SinhVien($row['id'],$row['hoten'],$row['namsinh'],$row['diachi']));
	}
	echo json_encode($mangSV);


?>