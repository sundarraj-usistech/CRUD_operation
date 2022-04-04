<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add a new Employee</title>
</head>
<body>
	<form action="create.php" method="post">
		<h4>Enter the Details Here</h4>
		<table>
			<tr><td><label>Employee Name</label></td>
			<td><input type="text" name="name"><td></tr>
			<tr><td><label>Designation</label></td>
			<td><input type="text" name="designation"></td></tr>
			<tr><td><label>E-Mail ID</label></td>
			<td><input type="email" name="mail_id"></td></tr>
			<tr><td><label>Date of Joining</label></td>
			<td><input type="date" name="doj"></td></tr>
			<tr><td><label>Mobile Number</label></td>
			<td><input type="tel" name="phone"></td></tr>
			<tr><td><label>Employee Status</label></td>
			<td><input type="text" name="status"></td></tr>
		</table><br>
		<button type="submit" name="submit">SUBMIT</button>
	</form>
	<?php 
	if (isset($_POST['submit'])) {
		require 'dbconnect.php';
		$emp_name=$_POST['name'];
		$emp_designation=$_POST['designation'];
		$emp_mail_id=$_POST['mail_id'];
		$emp_doj=$_POST['doj'];
		$emp_phone=$_POST['phone'];
		$emp_status=$_POST['status'];

		if (empty($emp_name)||empty($emp_designation)||empty($emp_mail_id)||empty($emp_doj)||empty($emp_phone)||empty($emp_status)) {
			header("Location: create.php?error=emptyfields");
		}
		else{
			$sql="INSERT INTO employee_details (employee_name, employee_designation, employee_mail_id, employee_doj, employee_phone, employee_status) VALUES ('$_POST[name]','$_POST[designation]','$_POST[mail_id]','$_POST[doj]','$_POST[phone]','$_POST[status]')";
			$result=mysqli_query($conn,$sql);
			if (!filter_var($_POST['mail_id'],FILTER_VALIDATE_EMAIL)===false) {
				echo '<br>';
				echo ("Successfully Added..!");
			}		
		}
		mysqli_close($conn);
	}	
 ?>
</body>
</html>
