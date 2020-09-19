<html>
<head>
<link rel="stylesheet" href="dinhdangdangnhap.css" type="text/css" />
<style>
body{
	background-image:url(go.jpg);
	background-repeat:no-repeat;
	background-size: 1400px 1200px;
}
div.noidung{
	padding:0px;
	text-align:center;
	border:5px solid #039;
	width:400px;
	height:280px;
	margin-top:120px;	
	margin-left:500px;
	background-color:#0CC;
}

div table tr th,td{
	font-weight:bold;
	font-size:23px;
}
div h3{
	padding:0px;
	border-bottom:10px solid #000;
	font-size:30px;
	padding:0px;
	width:394px;
	display:block;
	background-color:#03F;
	color:#003;
}
.dangnhap,#dangky{
	font-weight:bold;
	width:80px;
	height:30px;
	margin-left:50px;
	margin-top:10px;	
}
#dangky{
	margin:0px;
	padding:0px;	
}
#loi{
	text-align:center;
	width:300px;
	margin-left:500px;	
}
ul li{
	color:#F00;
	font-size:20px;
	list-style:none;	
}
#dangky,.dangnhap{
	cursor:pointer;	
}

</style>

</head>

<body>
 <script type="text/javascript">
function KiemTraDangNhap(){
	var f=document.formdangnhap;
	if(f.submit.value != ""){
		if(document.formdangnhap.dangnhap.value== ""){
			alert("Bạn chưa nhập tài khoản");
			document.formdangnhap.focus();
			return false;
		}
		if(document.formdangnhap.matkhau.value==""){
			alert("Bạn chưa nhập Mật Khâu");
			return false;
		}
		if(document.formdangnhap.dangnhap.value!="" && document.formdangnhap.matkhau.value!=""){
			<?php
					if(isset($_POST['submit'])){
					$errors=array();
					setcookie('dangnhap',$_POST['dangnhap'],time()+3600);
					setcookie('matkhau',$_POST['matkhau'],time()+3600);
					include("ketnoi.php");
					$dangnhap=mysqli_real_escape_string($con,$_POST['dangnhap']);
					$matkhau=mysqli_real_escape_string($con,$_POST['matkhau']);	
					$matkhau=md5($matkhau);
					$query="SELECT * FROM thanhvien WHERE tendangnhap='$dangnhap' AND matkhau='$matkhau' LIMIT 1";
					$result=$con->query($query);
					if(mysqli_num_rows($result) == 1){
						header('location: thongtincanhan.php');
					}else {
						$errors[]="The account or password do not match those on file";	
						}
					}
			?>
			
			return true;
		}
	}
		return true;
}
function chuyendangki(){
	<?php
	if(isset($_POST['dangky'])){
	header('location: dangkitrenweb.php');
		}
	?>
}
</script>

<div class="noidung">
	<form action="" method="post" enctype="multipart/form-data" name="formdangnhap">
	<table>	
    	<tr>
        	<th colspan="2"><h3> Login</h3> </th>
        </tr>
    	<tr>
    	<td>Tên Đăng Nhập  </td>
           <td><input type="text" name="dangnhap" /></td>
           </tr>
         <tr>
          <td><br/>Mật Khẩu </td>
         <td> <br/><input type="password" name="matkhau" /></td>
         </tr>
         <tr>
         <td> <input type="submit" name="submit" value="đăng nhập" class="dangnhap" onClick="return KiemTraDangNhap()"/></td>
        <td> <input type="submit" name="dangky" value="đăng ký" id="dangky" onClick="return chuyendangki()"/> </td> 
         </tr>
    </table>
    </form>
  </div>
 <div id="loi">
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
