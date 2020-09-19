<?php
	include("connect.php");
	if(!isset($_COOKIE['dangnhap']) &&  !isset($_COOKIE['matkhau'])){
		header("location:index.php");
	}
	if(isset($_GET['s'])){
		$id=$_GET['s'];
		$result="SELECT * FROM sanpham WHERE id=$id";
		$select=$con->query($result);
		$row=$select->fetch_assoc();
	}
	if(isset($_POST['edit'])){
		$idsp=$row['id'];
		$tensanpham=$_POST["suatensanpam"];
		$chitiec=$_POST["suachitiecsanpham"];
		$gia=$_POST["giasanpham"];
		$anh=$_POST['anhsanphamt'];
		if($anh!=""){
			$duongdan=$_POST['anhsanphamt'];
		}else{
			$duongdan=$row['hinhanhsanpham'];
		}
		$sql="UPDATE sanpham SET tensanpham='$tensanpham',motasanpham='$chitiec',giasanpham='$gia',hinhanhsanpham='$duongdan' WHERE id='$idsp'";
		$con->query($sql);
		header('location: danhsachpsanpham.php');
		

	}
	if(isset($_POST['back'])){
		header("location:danhsachpsanpham.php");
	}
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
body{
	background-image:url(avatar/backgound.png);
	background-repeat:repeat;
	background-image:1800px 120px;	
}
.sua{
	cursor:pointer;
	border-radius:20px;
	padding:0px;
	background-color:#09C;
	color:#FFF;
	font-size:16px;
	font-weight:bold;
	width:80px;
	height:30px;
}
.back{
	cursor:pointer;
	border-radius:20px;
	padding:0px;
	background-color:#09C;
	color:#FFF;
	font-size:16px;
	font-weight:bold;
	width:80px;
	height:30px;
	margin-left:50px;	
}
#suatensanpam{	
	text-align:center;
	font-weight:bold;
	font-size:25px;
}
#giasanpham{	
	font-weight:bold;
	text-align:center;
	color:#00F;
	font-size:25px;
}
#noidung{
	text-align:center;
}
#anhsanphamt{
	width:320px;
}
#trove{
	background-color:#09C;
	border-radius:50px;
	position:absolute;
	height:30px;
	width:85px;

}
#trove:hover{
		color:yellow;
		background-color:#FFF;
		cursor:pointer;
		
}
</style>
</head>

<body>
<form action="" method="POST" enctype="multipart/form-data"> 
<input id="trove" type="submit" value="Đăng Xuất" name="back"/>
<div id="noidung">

       <h1><input style="color:red;" type="text"  id="suatensanpam" name="suatensanpam" value="<?php echo $row['tensanpham'] ?>"/>  </h1>
         <h2> <img width="150px" height="180px" src="<?php echo $row['hinhanhsanpham'] ?>"></h2>
		 <h2> <input type="text" id="anhsanphamt" name="anhsanphamt" /></h2>
        <h2><input type="text" name="giasanpham" id="giasanpham" value="<?php echo $row['giasanpham'] ?>"/>  </h2>

        <h6><textarea  style="font-family:'Times New Roman', Times, serif;font-size:15px;" rows="20" cols="100" name="suachitiecsanpham">   <?php echo $row['motasanpham'] ?> </textarea></h6>

        
	<div class="nut">
       <input type="submit" name="edit"  value="Sửa" class="sua"/> 
       <input type="submit" name="troilai"  value="Trở Lại" class="back"/> 
      </div> 
 </form>
</div>
</body>
</html>