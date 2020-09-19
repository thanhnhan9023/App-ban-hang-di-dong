<?php
$errors="";
	if(isset($_POST['sub'])){
		$xnhan=md5($_POST['pass']);
		
		$query="SELECT * FROM taikhoan WHERE SDT='0943597722' AND MatKhau='$xnhan' LIMIT 1";
		include("connect.php");
		$result=$con->query($query);
		$row=$result->fetch_array();
		if(mysqli_num_rows($result)==1){
				header('location: dangkitrenweb.php');
			}else {
		$errors="Mã Xác Nhận Không Hợp Lệ";	
		}
	}
?>
<html>
</html>
<style>
body{
	background-color:lightblue;
	
}
p{
	font-size:20px;
	font-weight:bold;
}
form{
	border-radius:50px;
	background-color:yellow;
	width:400px;
	height:120px;
	margin:0px auto;
	text-align:center;
}
#sub{
	font-weight:bold;
	background-color:lightblue;
	color:blue;
	height:20px;
	width:100px;
}
</style>
<head>
</head>

<body>
<form action="" method="POST">
<p>Mã Xác Nhận<br></p>
<input type="password" name="pass"> <br>
<p><input type="submit" name="sub" value="Xác Nhận" id="sub"> </p>
<span style="color:red"> <?php  echo "$errors" ?></span>
</form>
</body>