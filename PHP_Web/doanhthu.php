<?php
ob_start();
	if(!isset($_COOKIE['dangnhap']) &&  !isset($_COOKIE['matkhau'])){
		header("location:index.php");
	}
	if(isset($_POST['dangxuat3'])){
		header("location:trangchu.php");
	}
	include("connect.php");
	$sql="SELECT d.id,t.ho,t.ten,d.NgayThanhToan,d.TONGTIEN
		FROM donhang d,taikhoan t
		WHERE d.idkhachhang=t.MaTaiKhoan";
		
	$select=$con->query($sql);
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
	width:50px;
	height:50px;	
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
table.bangchitiec{
		border-collapse:collapse;
		border:2px solid #000;
		margin-top:50px;
		margin-left:150px;
		width:1000px;
		height:120px;
		background-color:#9F0;
}
table.bangchitiec tr th,td{
	font-size:23px;
	text-align:center;
	border:1px solid #000;	
}
#hinhanhchitiecsanphamcuanguoidung{
		display:none;
		margin-top:100px;
		position:fixed;
		height:170px;
		width:180px;
		
}
.timkiem{
	margin-left:480px;	
	font-weight:bold;
	font-size:25px;
}
#timkiemsanpham{
	height:30px;
	border-radius:20px;
	
}
#danhsachlietke{
	position:absolute;
	z-index:2;
}
#danhsachlietke ul{
		
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
h1{
	font-weight:bold;
	color:yellow;
	margin-top:50px;
	font-size:40px;
	margin-left:320px;
}
</style>
</head>

<body>
<form method="POST" action="" enctype="multipart/form-data" name="formdoanhthu">
	<div id="date">
	<span style="font-weight:bold;font-size:20px;"> Từ</span> &nbsp;&nbsp;&nbsp;&nbsp;<input type="date" name="fromdate"> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; 
    <input type="submit" name="submitdate" onclick="return kiemtradate()" value="Thống Kê">
	&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp
    <span style="font-weight:bold;font-size:20px;"> Đến &nbsp;&nbsp;&nbsp </span><input type="date" name="totime">
    </div>
	<div class="noidung">
    	
    	<div class="tieude"> Chào bạn  <?php echo $_COOKIE['dangnhap'] ?></div>
        <div class="loinoi" > Danh sách sản phẩm của bạn là</div>
        
        
        <span id="danhsachsanphamcuausser">
    	<table> 
        <tr>
        	<th> STT</th>
            <th> Khách Hàng </th>
            <th> Ngày Thanh Toán</th>
			<th> Gía Sản Phẩm </th>
            <th colspan="3">  Chi Tiếc Hóa Đơn</th>
			
        </tr>
        <?php 
			$i=1;
			$delete="avatar/delete.png";
			$edit="avatar/edit.png";
			$tongtien=0;
        	while($row =$select->fetch_assoc()){
			$price = $row['TONGTIEN'];
			$tongtien+=$price;
			$price = '<span>'. number_format($price ,0 ,'.' ,'.').'VNĐ' .'</span>';
            	echo "<tr>";
				echo "<td> ".$i."</td>";
				echo "<td>  ".$row['ho']."  ".$row['ten']."</td>";
				echo "<td> ".$row['NgayThanhToan']."</td>";
				echo "<td> ".$price." </td>";
				echo "<td> <a href='chitiecdonhang.php?id=".$row['id']."'> Chi Tiếc</a></td>";
				echo "</tr>";
				$i=$i+1;
            }
		?>
        </table>
        </span>
        <input type="submit" name="dangxuat3" value=" Trang Chủ" class="dx" /> 
        </form>
       
        
    </div>
   <span id="sanphamtrave"> </span>
    <h1>Tổng Doanh Thu :  <?php  
					$tongtien = '<span>'. number_format($tongtien ,0 ,'.' ,'.').'VNĐ' .'</span>';
					echo $tongtien
					?> </h1>
<script type="text/jscript">
	var xhttp;
	var ok=true;
	var f=document.formdoanhthu;
function kiemtradate(){
		if(f.fromdate.value== "" || f.totime.value == "" ){
			window.alert("Bạn Vui lòng Chọn Ngày Trước Khi Thống Kê");
			ok= false;
			
		}if(f.fromdate.value!= "" && f.totime.value != ""){
				if(f.fromdate.value  >  f.totime.value  ){
				window.alert("Ngày Thống Kê Không Hợp Lệ");
				ok= false;
				}else{
					if(window.XMLHttpRequest){
						xhttp = new XMLHttpRequest();
						ok=false;
					}else{
						xhttp= new ActiveXObject("Microsoft.XMLHTTP");
						ok=false;
					}
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("danhsachsanphamcuausser").innerHTML=this.responseText;
					ok=false;
			
					}
				};
				xhttp.open("GET","donhang.php?from="+f.fromdate.value+","+f.totime.value,true);
				//xhttp.open("GET","donhang.php?from="+f.fromdate.value,true);
				//xhttp.open("GET","donhang.php?to="+f.totime.value,true);
				xhttp.send();
				return ok;	
				}
		}
		return ok;
		
	}
</script>

</body>
</html>