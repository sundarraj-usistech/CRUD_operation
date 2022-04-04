<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<style type="text/css">
	table,th, td{
		border: 1px solid black;
	}
	td{
		text-align: center;
	}
</style>
<form>
		<label>Number of Rows to display</label>
		<input type="number" name="pagestodisplay">
		<button>SELECT</button>
</form>
	<br>
	<?php
		require 'dbconnect.php'; 
		if (isset($_GET['pagestodisplay'])) {
			$perPageDisplay=$_GET['pagestodisplay'];
		}
		else{
			$perPageDisplay=5;
		}
		if (isset($_GET['page'])) {
			$currentPage=$_GET['page'];	
		}
		else{
			$currentPage=1;
		} 
		$startFrom=($currentPage-1)*$perPageDisplay;
		$sql="SELECT * FROM employee_details";
		$result=mysqli_query($conn,$sql);
		$rowCount=mysqli_num_rows($result);
		$totalPages=ceil($rowCount/$perPageDisplay);
		$sql1="SELECT * FROM employee_details LIMIT $startFrom,$perPageDisplay";
		$result1=mysqli_query($conn,$sql1);
		$rowCount1=mysqli_num_rows($result1);
		if($rowCount>0){ 
			echo "<table><tr><th>Employee ID</th><th>Employee Name</th><th>Designation</th><th>E-Mail ID</th><th>Date of Joining</th><th>Mobile Number</th><th>Employee Status</th></tr>";
			while($data=mysqli_fetch_assoc($result1)){
				echo "<tr><td> ".$data['employee_id']."</td><td> ".$data['employee_name']."</td><td>".$data['employee_designation']."</td><td>".$data['employee_mail_id']."</td><td>".$data['employee_doj']."</td><td>".$data['employee_phone']."</td><td>".$data['employee_status']."</td>" ;
			}
			echo "</table>";
			echo "<br>";
		}
		for ($i=1; $i<=$totalPages; $i++) {
	    echo'<a href="paginationselection.php?page='.$i.'&pagestodisplay='.$perPageDisplay.'"><button>'.$i.'</button></a>';
    	}
	mysqli_close($conn);
	?>	
</body>
</html>
