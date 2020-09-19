<?php
	include("ketnoi.php");
	if(isset($_GET['ten1'])){
		$t=$_GET['ten1'];
		$sql="SELECT * FROM sanpham WHERE idsp=$t";
		$select=$con->query($sql);
		$row=$select->fetch_assoc();
		echo "<table>"; 
        echo "<tr>";
        	echo "<th> STT</th>";
            echo "<th> Tên Sản Phẩm </th>";
            echo "<th> Gía Sản Phẩm</th>";
            echo "<th colspan='3'> Lựa Chọn </th>";
       		 echo "</tr>";
			$i=1;
			$delete="avatar/delete.png";
			$edit="avatar/edit.png";
            	echo "<tr>";
				echo "<td> ".$i."</td>";
				echo "<td onmouseenter='hienhinh(".$row['idsp'].")' onmouseleave='xoa()'>  ".$row['tensp']."</td>";
				echo "<td> ".$row['giasp']."(VND)"."</td>";
				echo "<form action='' method='get' enctype='multipart/form-data' name='formdchitiec'>";
				echo "<td> <a href='' onClick='return chitieccuasanpham(".$row['idsp'].")'>"." Xem chi tiếc sản phẩm"."</a></td>";
				echo "</form>";
				echo "<td><a href=xoa.php?id=".$row['idsp']."> <img src=".$delete."> </a></td>";
				echo "<td><a href=sua.php?s=".$row['idsp']."> <img src=".$edit."> </a></td>";
				echo "</tr>";
				$i=$i+1;
	}

?>