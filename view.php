<?php 
	require 'dbconnect.php';
	require 'displayaction.php';
	$sql="SELECT * FROM employee_details";
	$result=mysqli_query($conn,$sql);
	$rowCount=mysqli_num_rows($result);
	if ($rowCount>0) {
		display($result);
	}
	else{
		echo "No data found";
	}
	mysqli_close($conn);
 ?>