<?php 
	require 'dbconnect.php';
	require 'displayaction.php';
	$employee_doj=$_GET['doj'];
	$sql="SELECT * FROM employee_details WHERE employee_doj= '$employee_doj'";
	$result=mysqli_query($conn,$sql);
	$rowCount=mysqli_num_rows($result);
	if ($rowCount>0) {
			display($result);
	}
	else {
		echo " No data found";
	}
	mysqli_close($conn);
?>

