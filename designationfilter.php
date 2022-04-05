<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Search by Designation</title>
	</head>
	<body>
		<style type="text/css">
			table,th,td{
				border: 1px solid black;
			}
			td{
				text-align: center;
			}
		</style>
		<h4>Enter the Designation to search</h4>
		<form method="post">
		<select name="designation">
			<option></option>
			<option>CEO</option>
			<option>Manager</option>
			<option>HR Manager</option>
			<option>Consultant</option>
			<option>Trainer</option>
			<option>Trainee</option>
		</select>
		<button name="submit">FILTER</button>
	</form>
		<br>
		<?php 
			require 'dbconnect.php';
			if(isset($_POST['submit'])){
				$emp_designation=$_POST['designation'];
				$sql="SELECT * FROM employee_details WHERE employee_designation='$_POST[designation]'";
				$result=mysqli_query($conn,$sql);
				$rowCount=mysqli_num_rows($result);
				if ($rowCount>0) {
					echo "<table><tr><th>Employee ID</th><th>Employee Name</th><th>Designation</th><th>E-Mail ID</th><th>Date of Joining</th><th>Mobile Number</th><th>Employee Status</th></tr>";
					while ($data=mysqli_fetch_assoc($result)) {
						echo "<tr><td> ".$data['employee_id']."</td><td> ".$data['employee_name']."</td><td>".$data['employee_designation']."</td><td>".$data['employee_mail_id']."</td><td>".$data['employee_doj']."</td><td>".$data['employee_phone']."</td><td>".$data['employee_status']."</td></tr>";
					}
					echo '</table>';	
				}
				
				else{
					echo "No data found";
				}
			}
			mysqli_close($conn);
		?>
	</body>
	</html>	
