<?php
	include("connect.php");
	$from=$_GET['from'];
	$from=substr($_GET['from'],0,10);
	$to=substr($_GET['from'],11,strlen($_GET['from']));
	$sql="SELECT d.id,t.ho,t.ten,d.NgayThanhToan,d.TONGTIEN
			FROM donhang d,taikhoan t
			WHERE d.idkhachhang=t.MaTaiKhoan and d.NgayThanhToan >='$from' and  d.NgayThanhToan < '$to'";
		
		//echo $sql;
		$select=$con->query($sql);
?>



<html>
<head>
</head>
<body>
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
</body>
</html>
