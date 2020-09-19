<?php
ob_start();
	if(!isset($_COOKIE['dangnhap']) &&  !isset($_COOKIE['matkhau'])){
		header("location:dangnhaptrenweb.php");
	}
	if(isset($_POST['dangxuat3'])){
		header("location:doanhthu.php");
	}
	$id=$_GET['id'];
	include("connect.php");
	$sql="SELECT s.tensanpham,s.giasanpham,s.hinhanhsanpham,c.soluongsanpham,c.tientungsanpham
		FROM chitiecdonhang c,sanpham s
		WHERE c.masanpham=s.id AND c.madonhang=".$id;
	$select=$con->query($sql);
	if(isset($_POST['submitdate'])){
		
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="dinhdangdanhsachsanpham.css" type="text/css" rel="stylesheet" />
<style>
body{
	
	background-image:url(avatar/backgound.png);
	background-repeat:repeat;
	background-image:1800px 120px;	
}

img{
	width:150px;
	height:150px;	
}
div.noidung{
	position:relative;
	background-color:#d3d3d3;
	text-align:center;
	border:2px solid #F00;
	margin-left:200px;
	margin-top:50px;
	width:900px;
	height:auto;	
}
div.tieude{
	padding:5px;
	border-bottom:3px dotted #F00;
	color:#F00;
	font-size:27px;
	font-weight:bold;	
}
div.loinoi{
	margin-left:30px;
	font-size:20px;
	padding:8px;
}
table{
	margin-left:30px;
	width:800px;
	border-collapse:collapse;	
}
table tr th,td{
	border: 2px solid #000;	
}
table tr th{
	background-color:#bbbbbb;	
}
table tr td{
	border:2px solid red;
	background-color:#eeeeee;
}
.dx{
	cursor:pointer;
	margin:12px;
	background-color:#a9a9a9;
	height:45px;
	color:#FFF;
	box-shadow: 3px 1px 8px 8px #FFF;
}

span ul li{
	border-radius:20px;
	text-align:center;
	border:1px solid #ce9e6d; 
	width:200px;
	height:auto;
	background:#FFF;
	font-size:20px;
	font-family:"Times New Roman", Times, serif;
	margin-left:-220px;
	width:200px;
	list-style-type:none;

}
span ul li:hover{
	cursor:pointer;
	background:#e4c3a0;
}
#sanphamtrave{

	position:absolute;
}
#date{
	margin-left:280px;	
	margin-top:50px;
}
a{
	text-decoration: none;
}
a:hover{
	
	color:white;
}
</style>
</head>

<body>
<form method="POST" action="" enctype="multipart/form-data" name="formdoanhthu">
	<div class="noidung">
    	
    	<div class="tieude"> Chào bạn  <?php echo $_COOKIE['dangnhap'] ?></div>
        <div class="loinoi" > Danh sách sản phẩm của bạn là</div>
        
        <span id="danhsachsanphamcuausser">
    	<table> 
        <tr>
        	<th> STT</th>
            <th> Tên Sản Phẩm </th>
            <th> Gía Sản Phẩm</th>
			<th> Hình Ảnh </th>
			<th> Số Lượng </th>
            <th colspan="3"> Tổng Tiền</th>
			
        </tr>
        <?php 
			$i=1;
        	while($row =$select->fetch_assoc()){
			$price = $row['giasanpham'];
			$price = '<span>'. number_format($price ,0 ,'.' ,'.').'VNĐ' .'</span>';
			$tong = $row['tientungsanpham'];
			$tong = '<span>'. number_format($tong ,0 ,'.' ,'.').'VNĐ' .'</span>';
            	echo "<tr>";
				echo "<td> ".$i."</td>";
				echo "<td>  ".$row['tensanpham']."</td>";
				echo "<td> ".$price." </td>";
				echo "<td> <img src=".$row['hinhanhsanpham']."></td>";
				echo "<td>  ".$row['soluongsanpham']."</td>";
				echo "<td> ".$tong." </td>";
				echo "</tr>";
				$i=$i+1;
            }
		?>
        </table>
        </span>
        <input type="submit" name="dangxuat3" value=" Trở về" class="dx" /> 
        </form>
       
        
    </div>
	
   <span id="sanphamtrave"> </span>
   
    

</body>
</html>