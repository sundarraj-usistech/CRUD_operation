<?php 
		require 'dbconnect.php';
		$id=$_GET['id'];
		$sql="SELECT * FROM employee_details WHERE employee_id= $id";
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($result);
		$emp_name=$row['employee_name'];
		$sql="DELETE FROM employee_details WHERE employee_id= $id";
		$result=mysqli_query($conn,$sql);
			if($result==true){
				header("Location: view.php?deleted employee ".$emp_name." Successfully");
			}
			else if($result==false){
				header("Location: view.php?error=deleting Unsuccessfull..!");
			}	
 ?>