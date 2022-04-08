<?php
		require 'dbconnect.php';
		require 'displayaction.php';
		$sql="SELECT *FROM employee_details ORDER BY employee_status DESC";
		$result=mysqli_query($conn,$sql);
		if ($result==true) {
			display($result);	
		}	
		else{
			header("Location: view.php?error=sorting error");
		}	
		mysqli_close($conn);
?>