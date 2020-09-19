<?php
	ob_start();
if(isset($_POST['dangky'])){
	$errors=array();
	$img=$_FILES['avatar']['name'];
	$required=array('user','password','xacnhan','gioitinh','nghe');
	foreach($required as $filedname){
		if(empty($_POST[$filedname])){
				$errors[]="<strong> [$filedname] </strong> chua duoc dien.";	
		}
	}
	if($_POST['password'] !=$_POST['xacnhan'])
	{
		$errors[]="password va xac nhan khong hop le";	
	}
	if(empty($img)){
		$errors[]="The <strong> ban chua chon hinh </strong> .";	
	}
	
				include("ketnoi.php");
				setcookie('dangnhap',$_POST['user'],time()+3600);
				setcookie('matkhau',$_POST['password'],time()+3600);
				$ten=$_POST["user"];
				$matkhau=md5($_POST["password"]);
				$anh=$_FILES['avatar']['name'];
				$gtinh=$_POST["gioitinh"];
				$nghenghiep=$_POST["nghe"];
				$thich="";
				foreach($_POST['sothich'] as $sothich){
					$thich.=$sothich." ";	
				}
				//echo $ten.$matkhau.$anh.$gtinh.$nghenghiep.$thich;
				$duongdan="avatar/".$_FILES['avatar']['name'];
				move_uploaded_file($_FILES['avatar']['tmp_name'],$duongdan);
				//$connect=mysqli_connect("localhost","root","");
				//mysqli_select_db($connect,"ltw");
				$kiemtrataikhoan="SELECT * FROM thanhvien WHERE tendangnhap='$ten' OR matkhau='$matkhau'";
				$tontai=$con->query($kiemtrataikhoan);	
				if($tontai->num_rows >= 1){
					$errors[]="The <strong> tai khoan hoac mat khau da ton tai </strong> .";	
				}
				if(empty($errors)){
				$sql="INSERT INTO thanhvien(tendangnhap,matkhau,hinhanh,gioitinh,nghenghiep,sothich) 	      		VALUES('$ten','$matkhau','$duongdan','$gtinh','$nghenghiep','$thich')";
				$con->query($sql);	
				if(headers_sent()){
					die('<script type="text/javascript">window.location.href="'."dangnhap.php".'"</script>'); 
				}else{
					header("location:dangnhap.php");
					die();
					ob_enf_fluch();
				}
		}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="dinhdangdangky.css" type="text/css" rel="stylesheet"/>
<style>
.dangki{
	margin-left:160px;
	margin-right:20px;
}
.dangki{
	cursor:pointer;	
}
.lamlai{
	cursor:pointer;	
}
</style>
</head>

<body>
<script type="text/jscript">
function  kiemtradangki(){
	var retk=/^\D[a-z][\w]+$/;
	var remk=/^[\w][^_/\+-]+$/;
	var ok=true;
	var f=document.formdangki;
	if(f.user.value== ""){
		document.getElementById("errordangnhap").innerHTML="<br/> bạn chưa nhập tài khoản";
		errordangnhap.style.color="red";
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
	if(f.avatar.value== ""){
		document.getElementById("erroranhdaidien").innerHTML="<br/> bạn chưa chọn ảnh";
		erroranhdaidien.style.color="red";
		ok=false;
	}
	if(f.gioitinh.value== ""){
		document.getElementById("errogioitinh").innerHTML="<br/> bạn chưa chọn giới tính";
		errogioitinh.style.color="red";
		ok=false;
	}
	if(f.nghe.value== ""){
		document.getElementById("erronghenghiep").innerHTML="<br/> bạn chưa nhập tài khoản";
		erronghenghiep.style.color="red";
		ok=false;
	}
	if(document.getElementById("stan").checked != true  && document.getElementById("stdl").checked != true && document.getElementById("sttt").checked != true && document.getElementById("stttg").checked != true){
		document.getElementById("errosothich").innerHTML="<br/> bạn chưa chọn sở thú";
		errosothich.style.color="red";
		ok=false;
	}
	if(f.user.value!=""){
		if(f.user.value.length < 6 || f.user.value.length > 15){
			document.getElementById("errordangnhap").innerHTML="<br/> Tài Khoản Phải Dài Từ 6->15";
			errordangnhap.style.color="red";
			ok=false;
		}
		if(!retk.test(f.user.value)){
			document.getElementById("errordangnhap").innerHTML="<br/> Tài Khoản chưa khớp";
			errordangnhap.style.color="red";
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
function IsExisited(str){
	var xhttp;
	
	if(window.XMLHttpRequest){
		xhttp = new XMLHttpRequest();
	}else{
		xhttp= new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhttp.onreadystatechange = function() {
		 if (this.readyState == 4 && this.status == 200) {
			document.getElementById("errordangnhap").innerHTML=this.responseText;
			errordangnhap.style.color="red";
		}	
	};
	xhttp.open("GET","IsExisited.php?u="+str,true);
	xhttp.send();
		
}
</script>
<div id="bang">
<form action="" method="post" enctype="multipart/form-data" name="formdangki">
	<table>
    	<tr>
        	<th>  Tên Đăng Nhập</th>
            <td> <input type="text"  name="user" onchange="IsExisited(this.value)"/> <span id="errordangnhap" > </span></td>
        </tr>
        <tr>
        	<th>  Mật Khẩu</th>
            <td> <input type="password"  name="password"/><span id="errormatkhau" > </span></td>
        </tr>
        <tr>
        	<th>  Gõ lại Mật Khẩu</th>
            <td> <input type="password" name="xacnhan" /><span id="errorgolaimatkhau" > </span></td>
        </tr>
        <tr>
        <th>  Hình Đại Điện</th>
            <td>  <input type="file" name="avatar" /><span id="erroranhdaidien" > </span></td>
        </tr>
        <tr>
        	<th> Giới Tính</th>
            <td> <input type="radio"  name="gioitinh" value="Nam"/> Nam<input type="radio" name="gioitinh" value="Nu"/>Nữ<input type="radio"name="gioitinh" value="Khac"/>Khác<span id="errogioitinh" > </span></td>
        </tr>
        <tr>
        <th> Nghề Nghiệp</th>
        <td>
         	<select name="nghe">
            	<option value="Học sinh"> Học Sinh </option>
                <option value="Sinh Viên"> Sinh Viên </option>
                <option value="Giáo Viên"> Giáo Viên </option>
                <option value="Khác"> Kha </option>
            </select>
        <span id="erronghenghiep" > </span>
        </td>
        </tr>
         <tr>
        	<th>  Sở Thích</th>
            <td>  <input type="checkbox"  name="sothich[]" value="Thể Thao" id="sttt"/> thể thao <input type="checkbox" name="sothich[]" value="Du Lịch" id="stdl"/> Du lịch <input type="checkbox" name="sothich[]" value="Âm Nhạc" id="stan"/> Âm Nhạc <input type="checkbox" name="sothich[]" value="Thời Trang" id="stttg"/> Thời trang<span id="errosothich" > </span></td>
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


