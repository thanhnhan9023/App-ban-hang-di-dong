<?php
	include("connect.php");
	$result= "SELECT * FROM loaisanpham";
	$data=$con->query($result);
	$mangloaisp=array();
	while($row = $data->fetch_assoc()){
		array_push($mangloaisp,new Loaisp($row['Id'],$row['TenLoaiSanPham'],$row['hinhanhloaisanpham']));
	}
	class Loaisp{
		function Loaisp($id,$tenLoaisp,$hinhanhloaisp){
			$this->id=$id;
			$this->tenLoaisp=$tenLoaisp;
			$this->hinhanhloaisp=$hinhanhloaisp;
		}
	}
	echo json_encode($mangloaisp);
?>