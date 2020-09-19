<?php
	$con =new mysqli("localhost","root","","on");
	mysqli_query($con,"SET NAMES 'utf8'");
  $today = date('Y-m-d');
  $week = strtotime(date("Y-m-d", strtotime($today)) . " +3 day");
  $week = strftime("%Y-%m-%d", $week);

  
	$sql="INSERT INTO ngaya(id,ngaydk) VALUES(null,'$week')";
	echo $sql;
	if($con->query($sql)){
		echo "succ";
	}else{
		echo "error";
	}
	

	?>