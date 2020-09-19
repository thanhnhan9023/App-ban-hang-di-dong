<?php
	ob_start();
if(isset($_POST['dangky'])){
				$errors=array();
				include("connect.php");
				setcookie('dangnhap',$_POST['user'],time()+3600);
				setcookie('matkhau',$_POST['password'],time()+3600);
				$ho=$_POST["user"];
				$ten=$_POST["name"];
				$email=$_POST["email"];
				$sdt=$_POST["SDT"];
				$gt=$_POST["gioitinh"];
				$matkhau=md5($_POST["password"]);	
				$kiemtrataikhoan="SELECT * FROM taikhoan WHERE  MaLoaiTK=1 AND (Email='$email' OR SDT='$sdt')";
				$tontai=$con->query($kiemtrataikhoan);
				
				if($tontai->num_rows >= 1){
					$errors[]="The <strong> tai khoan hoac mat khau da ton tai </strong> .";	
				}
				if(empty($errors)){
				$sql="INSERT INTO taikhoan VALUES(NULL,'$ho','$ten','$email','$matkhau','$sdt','$gt',1)";
				$con->query($sql);	
				if(headers_sent()){
					die('<script type="text/javascript">window.location.href="'."dangnhap.php".'"</script>'); 
				}else{
					header("location:index.php");
					die();
					ob_enf_fluch();
				} 
		}
}
if(isset($_POST['back'])){
	header("location:index.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="dinhdangdangky.css" type="text/css" rel="stylesheet"/>
<style>
body{
		background-image:url(go.jpg);
}
.dangki{
	font-size:17px;
	font-weight:bold;
	border-radius:10px;
	border:blue solid 2px;
	background-color:lightgreen;
	height:30px;
	width:100px;
	margin-left:140px;
	margin-right:20px;
}
.dangki{
	cursor:pointer;	
}
.lamlai{
	font-size:17px;
	font-weight:bold;
	border-radius:10px;
	border:blue solid 2px;
	background-color:lightgreen;
	height:30px;
	width:100px;
	cursor:pointer;	
}
body{
	position:relative;
	background-image:url(go.jpg);
	background-repeat:no-repeat;
	background-size: 1400px 1200px;
	
}
#bang{
	border: blue solid 5px;
	border-radius: 0px 0px 50px 50px; 
	background-color:lightblue;
	position:inherit;
	margin-left:410px;
	width:510px;
	height:500px;
	margin-top:1px;
	
}
form{
	padding::0px auto;
	
}
table{
	border-collapse: collapse;
}
div.footer{
	margin-top:0px;
	width:500px;
	height:200px;
	margin:0px auto;
}
div.footer ul li{
	font-size:20px;
	list-style:none;
	padding-left: 10px;
	color:red;
}
#bang table tr th,td{
	width:200px;
	height:50px;	
}
#formdk{
	
	margin:0px auto;
	padding-top:10px
	height:100px;
	text-align:center;
	width:520px;
	margin-top:30px;
	background-color:red;
	color:#fff;
	font-size:25px;
	font-weight:bold;
}
#trove{
	color:yellow;
	font-size:18px;
	background-color:#09C;
	border-radius:50px;
	position:absolute;
	height:30px;
	width:120px;

}

#trove:hover{
		background-color:#FFF;
		cursor:pointer;
		
}
</style>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="formdangki">
<input id="trove" type="submit" value="Đăng Nhập" name="back"/> 
<p id="formdk"> Form Đăng Kí</p>
<script type="text/jscript">
function  kiemtradangki(){
	var remk=/^[\w][^_/\+-]+$/;
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
	var ok=true;
	var f=document.formdangki;
	if(f.user.value== ""){
		document.getElementById("errordangnhap").innerHTML="<br/> bạn chưa nhập tài khoản";
		errordangnhap.style.color="red";
		ok=false;
	}
	if(f.name.value== ""){
		document.getElementById("errorten").innerHTML="<br/> bạn chưa nhập tên";
		errorten.style.color="red";
		ok=false;
	}
	if(f.DiaChi.value== ""){
		document.getElementById("errordiachi").innerHTML="<br/> bạn chưa nhập Đia Chỉ";
		errordiachi.style.color="red";
		ok=false;
	}
	if(f.password.value== ""){
		document.getElementById("errormatkhau").innerHTML="<br/> bạn chưa nhập Mật Khẩu";
		errormatkhau.style.color="red";
		ok=false;
	}
	if(f.xacnhan.value== ""){
		document.getElementById("errorgolaimatkhau").innerHTML="<br/> bạn chưa gõ mã xác nhận";
		errorgolaimatkhau.style.color="red";
		ok=false;
	}
	if(f.gioitinh.value== ""){
		document.getElementById("errogioitinh").innerHTML="<br/> bạn chưa chọn giới tính";
		errogioitinh.style.color="red";
		ok=false;
	}
	if(f.SDT.value== ""){
		document.getElementById("errorsdt").innerHTML="<br/> bạn chưa nhập số điện thoại";
		errorsdt.style.color="red";
		ok=false;
	}
	if(f.SDT.value!=""){
		if(f.SDT.value.length < 10 || f.password.value.length > 12){
			document.getElementById("errorsdt").innerHTML="<br/> SĐT Không Hợp Lệ";
			errorsdt.style.color="red";
			ok=false;
		}
	}
	if(f.email.value== ""){
		document.getElementById("erroremail").innerHTML="<br/> bạn chưa Email";
		erroremail.style.color="red";
		ok=false;
	}
	if(f.email.value!=""){
		if(!filter.test(f.email.value)){
			document.getElementById("erroremail").innerHTML="<br/> Email Chưa Hợp Lệ";
			erroremail.style.color="red";
			ok=false;
		}
	}
	if(f.password.value!=""){
		if(f.password.value.length < 6 || f.password.value.length > 15){
			document.getElementById("errormatkhau").innerHTML="<br/> Mật Khẩu Phải Dài Từ 6->15";
			errormatkhau.style.color="red";
			ok=false;
		}
		if(!remk.test(f.password.value)){
			document.getElementById("errormatkhau").innerHTML="<br/> Mật Khẩu Không Đươc Chưa khớp";
			errormatkhau.style.color="red";
			ok=false;
		}
	}
	if(f.xacnhan.value!= f.password.value){
		document.getElementById("errorgolaimatkhau").innerHTML="<br/> mật khẩu chưa khớp ";
		errorgolaimatkhau.style.color="red";
		ok=false;
	}
	return ok;
		
}
function lamlai(){
	return true;
}
</script>

<div id="bang">


	<table>
		
    	<tr>
        	<th>  Họ</th>
            <td> <input type="text"  name="user"/> <span id="errordangnhap" > </span></td>
			<tr>
			<th>  Tên </th>
			 <td> <input type="text"  name="name" /> <span id="errorten" > </span></td>
			 </tr>
        </tr>
		<tr>
        	<th>  Email</th>
            <td> <input type="text"  name="email"/> <span id="erroremail" > </span></td>
			<tr>
        <tr>
        	<th>  Mật Khẩu</th>
            <td> <input type="password"  name="password"/><span id="errormatkhau" > </span></td>
        </tr>
        <tr>
        	<th>  Gõ lại Mật Khẩu</th>
            <td> <input type="password" name="xacnhan" /><span id="errorgolaimatkhau" > </span></td>
        </tr>
		<tr>
        	<th>  SĐT</th>
            <td> <input type="number"  name="SDT"/> <span id="errorsdt" > </span></td>
			</tr>
		<tr>
        	<th>  Địa Chỉ</th>
            <td> <input type="text"  name="DiaChi"/> <span id="errordiachi" > </span></td>
			</tr>
        <tr>
        <tr>
        	<th> Giới Tính</th>
            <td> <input type="radio"  name="gioitinh" value="Nam"/> Nam<input type="radio" name="gioitinh" value="Nu"/>Nữ<input type="radio"name="gioitinh" value="Khac"/>Khác<span id="errogioitinh" > </span></td>
        </tr>
		
        <span id="erronghenghiep" > </span>
        </td>
        </tr>
        <tr> 
        <td ><input type="submit" name="dangky" value="đăng ký" class="dangki" onclick="return kiemtradangki()"/></td>
        <td ><input type="submit" name="lamlai" value="Làm Lại" class="lamlai" onclick="return lamlai()"/></td>
        </tr>
    </table>
  </form>
 </div>
 <div class="footer">
  <?php if(!empty($errors)){
                echo "<ul>";
                foreach($errors as $error){
                    echo "<li> $error </li>";	
                }
                echo "<ul/>";
            }
        ?>
</div>
</body>
</html>


