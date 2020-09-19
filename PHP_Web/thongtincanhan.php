<?php
ob_start();

if(isset($_POST['dangxuat'])){
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
if(isset($_COOKIE['dangnhap']) &&  isset($_COOKIE['matkhau'])){
			$matkhau=md5($_COOKIE['matkhau']);
			include("ketnoi.php");
			$result="SELECT * FROM thanhvien WHERE matkhau='$matkhau'";
			$select=mysqli_query($con, $result);
			$row=$select->fetch_array();
			
}else{
	header("location:index.php");
		
}
 ?>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <style>
div.dinhdang{
		
	background-color:#d3d3d3;
		border:2px dotted #FF0000;
		margin-top:50px;
		margin-left:300px;	
		width:600px;
		height:400px;
}
div.hinhanh{
	
	margin-left:20px;
	width:300px;
	height:400px;
	float:left;
		
}
ul li{
	font-size:20px;
	margin-bottom:20px;
	list-style:none;
	margin-left:0px;	
}
div.dinhdang h3{
	
	text-align:center;
	color:#F00;
	border-bottom:2px dotted #FF0000;
}
body{
		position:relative;
		background-image:url(avatar/go.jpg);
		background-repeat:no-repeat;
		background-size:1500px 700px;
	}
	#dangxuat{
	cursor:pointer;
	margin:12px;
	background-color:#a9a9a9;
	height:45px;
	color:#FFF;
	box-shadow: 3px 1px 8px 8px #FFF;
	}
	#dangxuat{
		position:absolute;
		margin-top:50px;
		cursor:pointer;
		margin-left:80px;
	}
	div.sanpham{
		
		float:left;
		margin-left:-340px;
		
	}
	
div.sanpham ul li a{
	font-size:35px;
	font-weight:bold;
	color:#003;
	text-decoration:none;	
}
	div.sanpham a:hover{
	color:#F00;
}
	
 </style>
 </head>
 <body>
 <div class="hinhanh">
    	<img width="250px" height="300px" src="<?php echo $row['hinhanh'] ?>">
    </div>
 <div class="dinhdang">
	<h3> Chào bạn <?php echo $row['tendangnhap'] ?></h3> 	
    
    <div class="acb"> 
    	<ul>
        	<li> Nickname :<?php echo $row['tendangnhap'] ?> </li>
            <li> Giới Tính : <?php echo $row['gioitinh'] ?></li>
            <li> Nghề Nghiệp : <?php echo $row['nghenghiep'] ?></li>
            <li> Sở Thích : <?php echo $row['sothich'] ?></li>
        </ul>
    </div>
    
     <form method="post" action="">
            <div class="adangxuat"> <a href="" ></a><input type="submit" name="dangxuat" value="đăng xuất" id="dangxuat"></div>
     	 </form> 
     
 </div>
 <div class="sanpham">
            <ul>
            	<li>
                <a href="themsanpham.php" > Thêm danh sách sản phẩm </a>
                </li>
                <li> <a href="danhsachpsanpham.php" > Danh sách sản phẩm </a></li>
                <li> <a href="buoi4_bai4.php" > Buổi 4 bài 4 </a> </li>
            </ul>
      </div>
 </body>
 </html>
 
 <!-- <form method="post" action="">
            <div class="adangxuat"> <a href="" ></a><input type="submit" name="dangxuat" value="đăng xuất" id="dangxuat"></div>
            </form>