
<?php
	class SinhVien{
		function SinhVien($hoten,$namsinh,$diachi){
			$this->HoTen=$hoten;
			$this->NamSinh=$namsinh;
			$this->DiaChi=$diachi;
		}
	}
	$mangSV=array();
	array_push($mangSV,new SinhVien("Nguyễn Văn A",1999,"Hà Nội"));
	array_push($mangSV,new SinhVien("Nguyễn Văn B",2000,"Hà Nam"));
	echo json_encode($mangSV);
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="dinhdangdangky.css" type="text/css" rel="stylesheet"/>
</head>
