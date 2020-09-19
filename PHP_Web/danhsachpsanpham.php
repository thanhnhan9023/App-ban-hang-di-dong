<?php
ob_start();
	if(!isset($_COOKIE['dangnhap']) &&  !isset($_COOKIE['matkhau'])){
		header("location:index.php");
	}
	if(isset($_POST['back'])){
		setcookie('dangnhap',$_POST['dangnhap'],time()-3600);
		setcookie('matkhau',$_POST['matkhau'],time()-3600);
		if(headers_sent()){
					die('<script type="text/javascript">window.location.href="'."dangnhap.php".'"</script>'); 
				}else{
					header("location:index.php");
					die();
					ob_enf_fluch();
				}
	}
	include("connect.php");
	$sql="SELECT * FROM sanpham ";
	$select=$con->query($sql);
	//if(isset($_GET['id'])){
	//	$id=$_GET['id'];
	//	$delete="DELETE FROM sanpham Where idsp='$idsp'";
	//	$con->query($delete);
	//}
	if(isset($_POST['trangchu'])){
		header("location:trangchu.php");
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
	position:relative;
	background-image:url(avatar/backgound.png);
	background-repeat:repeat;
	background-size: 1400px 1200px;
}

#trove,#trangchu{
	background-color:#09C;
	border-radius:50px;
	position:absolute;
	height:30px;
	width:85px;

}
#trove:hover,#trangchu:hover{
		background-color:#FFF;
		cursor:pointer;
		
}
#trangchu{
	margin-left:100px;	
}

img{
	width:150px;
	height:150px;	
}
ul{
	background-color:#FFF;
	padding: 20px; 
	border-radius: 50px;
	border: 2px solid #73AD21;
	width:150px;
	margin-left:50px;
	margin-top:50px;
	height:230px;
	float:left;
	text-align:center;
	list-style-type:none;	
}
ul:hover{
	background-color:yellow;	
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

.dx{
	cursor:pointer;
	margin:12px;
	background-color:#a9a9a9;
	height:45px;
	color:#FFF;
	box-shadow: 3px 1px 8px 8px #FFF;
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
div.noidung{
	
	margin-top:100px;	
	margin-left:50px;
}
#delete1{
	float:right;
	
}
#anhx{
	height:20px;
	width:20px;	
}

#d{
	position:absolute;

}
#loaisp{
	margin-top:30px;
	position:absolute;
	margin-left:350px;
}
#dt,#lt{
	font-weight:bold;
	font-size:15px;
	background-color:#FF0;
	border-radius:50px;
	height:50px;
	width:150px;
}
#dt:hover{
	color:#09F;
	background-color:#FFF;
	cursor:pointer;
}
#lt{
	margin-left:100px;	
}
#lt:hover{
	color:#09F;
	background-color:#FFF;
	cursor:pointer;
}
</style>

</head>

<body>
<form action="" method="POST" enctype="multipart/form-data"> 
	<input id="trove" type="submit" value="Đăng Xuất" name="back"/> <input id="trangchu" type="submit" value="Trang Chủ" name="trangchu"/>
	<img src="go.jpg" class="idanhsanpham" id="hinhanhchitiecsanphamcuanguoidung"/>
    <div class="timkiem" >Tìm kiếm &nbsp;&nbsp;<input type="text" id="timkiemsanpham" onkeyup="lietke(this.value)" /></div>
   <span id="loaisp"> 
   <input id="dt" type="submit" name="gender" value="Điện Thoại" onclick="return loaisanpham(1)"> 
  <input id="lt" type="submit" name="gender" value="LapTop" onclick="return loaisanpham(2)">
  <input id="lt" type="submit" name="gender" value="Tất Cả" onclick="return loaisanpham(3)">
    </span>
    <div class="noidung" id="noidung">
   
       
        <?php 
			$i=1;
			$delete="avatar/delete1.png";
			$edit="avatar/edit.png";
        	while($row =$select->fetch_assoc()){
            	echo "<ul>";
				echo "<li id='delete1'><a href=xoa.php?id=".$row['id']."> <img id='anhx'src=".$delete."> </a></li>";
				echo "<li><a href=sua.php?s=".$row['id']."><img src=".$row['hinhanhsanpham']."></a></li>";
				echo "<li style='color:red;'>".$row['tensanpham']."</li>";
				echo "<li style='color:#03F;'> ".$row['giasanpham']."(VND)"."</li>";
				
				echo "</ul>";
				$i=$i+1;
            }
		?>
        </div>`
<span id="sanphamtrave"> </span>
<script type="text/jscript">
	var xhttp;
	var ok=true;
	
function chitieccuasanpham(str){
	if(window.XMLHttpRequest){
		xhttp = new XMLHttpRequest();
		ok=false;
	}else{
		xhttp= new ActiveXObject("Microsoft.XMLHTTP");
		ok=false;
	}
	xhttp.onreadystatechange = function() {
		 if (this.readyState == 4 && this.status == 200) {
			 document.getElementById("sanphamtrave").innerHTML=this.responseText;
			 ok=false;
		
		 }
	};
	xhttp.open("GET","chitiec.php?ct="+str,true);
	xhttp.send();
	return ok;
	
}
var xt;
var hinhanh;
function hienhinh(ten){
	if(window.XMLHttpRequest){
		xt = new XMLHttpRequest();
	}else{
		xt= new ActiveXObject("Microsoft.XMLHTTP");
	}
	xt.onreadystatechange = function() {
		 if (this.readyState == 4 && this.status == 200) {
			hinhanh=this.responseText;
			document.getElementById("hinhanhchitiecsanphamcuanguoidung").setAttribute("src",hinhanh);
			document.getElementById("hinhanhchitiecsanphamcuanguoidung").style.display="block";
		
		 }
	};
	xt.open("GET","layanh.php?ctspa="+ten,true);
	xt.send();
	
}
function xoa(){
		hinhanh="";
		document.getElementById("hinhanhchitiecsanphamcuanguoidung").style.display="none";
}
var ko1=true;
var kn;
function lietke(t){
	if(window.XMLHttpRequest){
		kn = new XMLHttpRequest();
		ko1=false;
	}else{
		kn= new ActiveXObject("Microsoft.XMLHTTP");
		ko1=false;
	}
	kn.onreadystatechange = function() {
		 if (this.readyState == 4 && this.status == 200) {
			document.getElementById("noidung").innerHTML=this.responseText;
			 ko1=false;
		
		 }
	};
	kn.open("GET","danhsachlietke.php?ten="+t,true);
	kn.send();
	return ko1;
	
}
function loaisanpham(t){
	if(window.XMLHttpRequest){
		kn = new XMLHttpRequest();
		ko1=false;
	}else{
		kn= new ActiveXObject("Microsoft.XMLHTTP");
		ko1=false;
	}
	kn.onreadystatechange = function() {
		 if (this.readyState == 4 && this.status == 200) {
			document.getElementById("noidung").innerHTML=this.responseText;
			 ko1=false;
		
		 }
	};
	kn.open("GET","danhsachlietketheoloai.php?ten="+t,true);
	kn.send();
	return ko1;
}

</script>


</form>
</body>
</html>