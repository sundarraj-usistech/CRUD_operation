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
<?php
		require 'dbconnect.php';
		$sql="SELECT *FROM employee_details ORDER BY employee_name DESC";
		$result=mysqli_query($conn,$sql);
		$rowCount=mysqli_num_rows($result);
		if($rowCount>0){
	?>		
			<br>
			<table><tr><th>Employee ID</th><th>Employee Name</th><th>Designation</th><th>E-Mail ID</th><th>Date of Joining</th><th>Mobile Number</th><th>Employee Status</th></tr>
				<?php while($data=mysqli_fetch_assoc($result)){
					echo "<tr><td> ".$data['employee_id']."</td><td> ".$data['employee_name']."</td><td>".$data['employee_designation']."</td><td>".$data['employee_mail_id']."</td><td>".$data['employee_doj']."</td><td>".$data['employee_phone']."</td><td>".$data['employee_status']."</td>" ;
				}
				echo "</table>";
				}
				else{
					echo "No data found";
				}
				mysqli_close($conn);

			?>
</body>
</html>