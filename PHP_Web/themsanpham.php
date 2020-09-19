<?php
if(!isset($_COOKIE['dangnhap']) &&  !isset($_COOKIE['matkhau'])){
		header("location:index.php");
	}
if(isset($_POST['luulai'])){
	$errors=array();
	$required=array('tensanpham','chitiec','gia','anhsanpham');
	foreach($required as $filedname){
		if(empty($_POST[$filedname])){
				$errors[]="<strong> [$filedname] </strong> chua duoc dien.";	
		}
	}
	if(empty($errors)){
				include("connect.php");
				$tensanpham=$_POST["tensanpham"];
				$chitiec=$_POST["chitiec"];
				$anh=$_FILES['anhsanpham']['name'];
				$gia=$_POST["gia"];
				$loaisp=$_POST["loaisanpham"];
				$duongdan=$_POST["anhsanpham"];
				$sql="INSERT INTO sanpham(tensanpham,giasanpham,hinhanhsanpham,motasanpham,idsanpham) VALUES('$tensanpham','$gia','$duongdan','$chitiec','$loaisp')";
				$con->query($sql);
				header('location: danhsachpsanpham.php');
				$con->close();
				}
	
}
			if(isset($_POST['lamlai'])){
				header('location: themsanpham.php');
			}

	if(isset($_POST['back'])){
		header("location:trangchu.php");
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="dinhdangthemsanpham.css" type="text/css" rel="stylesheet"/>
<style>
body{
	background-image:url(avatar/backgound.png);
	background-repeat:no-repeat;
	background-size: 1400px 1200px;
}

.luulai,.lamlai{
	cursor:pointer;
}
div.tieude{
	padding:0px;
	width:500px;
	height:60px;
	text-align:center;
	margin-left:420px;
}
h3{
	margin:0px;
	padding:0px;
	color:#F00;
	font-size:25px;
}
h5{
	margin:0px;
	padding:0px;
	font-size:20px;
}
div.themsampham{
	border:2px solid #000;
	background-color:#999;
	width:500px;
	height:555px;
	margin-left:430px;
}
form{
	border:5px solid #FFF;
	background-color:#999;
	padding-left:40px;	
	padding-top:50px;
}
table td,th{
	padding:20px;
}
div.loi{
	width:500px;
	height:20px;
	text-align:center;
	margin-left:350px;
}
div.loi ul li{
	list-style:none;
	color:#F00;
	font-size:20px;	
}


#trove{
	margin-top:-100px;
	margin-left:-480px;
	background-color:#09C;
	border-radius:50px;
	position:absolute;
	height:40px;
	width:100px;
	font-size:15px;
	font-weight:bold;

}
#trove:hover{
		background-color:#FFF;
		cursor:pointer;
		color:yellow;
		
}

</style>
</head>

<body>
<div class="tieude" >
	<h3> Thêm sản phẩm mới</h3>
    <h5> vui lòng điền đầy đủ thông tin để thêm sản phẩm</h5>
  </div>
<div class="themsampham">
	
<form action="" method="post" enctype="multipart/form-data">
<input id="trove" type="submit" value="Trang Chính" name="back" > 
	<table>
    	<tr>
        <th> Tên sản phẩm</th>
        <td> <input type="text" name="tensanpham" /> </td>
        </tr>
        <tr>
        <th> Chi tiếc sản phẩm</th>
        <td> <textarea rows="10" cols="30" name="chitiec">  </textarea></td>
        </tr>
        <tr>
        <th> Gía sản phẩm</th>
        <td> <input type="number"  name="gia"/> </td>
        </tr>
        <tr>
        <th> Đường dẫn hình ảnh</th>
        <td> <input type="text" name="anhsanpham" /> </td>
        </tr>
        <tr>
        <th> Loại Sản Phẩm </th> 
        <td> 
        <select name="loaisanpham">
            	<option value="1">Điện Thoại </option>
                <option value="2"> Laptop </option> 
            </select>
        </td>
        </tr>
    </table>
    <div class="footer"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="luulai" value="lưu lại sản phẩm" style="height:30px;" class="luulai"/>&nbsp;&nbsp;<input type="submit" name="lamlai" value="làm lại"  style="height:30px;" class="lamlai"/></div>
</form>
</div>
<div class="loi"> 
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