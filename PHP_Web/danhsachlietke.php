<?php
	include("connect.php");
	if(isset($_GET['ten'])){
		$t=$_GET['ten'];
		$delete="avatar/delete1.png";
		{$sql="SELECT * FROM sanpham WHERE tensanpham like '%$t%'";
				$select=$con->query($sql);
				while($row=$select->fetch_assoc()){	
				echo "<ul>";
				echo "<li id='delete1'><a href=xoa.php?id=".$row['id']."> <img id='anhx'src=".$delete."> </a></li>";
				echo "<li><a href=sua.php?s=".$row['id']."><img src=".$row['hinhanhsanpham']."></a></li>";
				echo "<li style='color:red;'>".$row['tensanpham']."</li>";
				echo "<li style='color:#03F;'> ".$row['giasanpham']."(VND)"."</li>";
				echo "</ul>";
					}
					
				}
		if($t==null){echo "";}
		
	}
?>