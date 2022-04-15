<?php 
	require 'dbconnect.php';
	$id=$_GET['id'];
	$sql="SELECT * FROM employee_details WHERE employee_id=$id";
	$result=mysqli_query($conn,$sql);
	$rowCount=mysqli_num_rows($result);
	if ($rowCount>0) { ?>
		<?php while ($row=mysqli_fetch_assoc($result)) { ?>
				<form method="post">
				<?php echo "<h4> Details of  ".$row['employee_name']; ?></h4>
					<table>
						<tr><td><label>Employee ID</label></td>
						<td></td>
						<td><strong><?php echo $row['employee_id']; ?></strong></td></tr>
						<tr><td><label>Employee Name</label></td>
							<td></td>
						<td><strong><?php echo $row['employee_name']; ?></strong></td></tr>
						<tr><td><label>Employee Designation</label></td>
							<td></td>
						<td><strong><?php echo $row['employee_designation']; ?></strong></td></tr>
						<tr><td><label>Employee Mail ID</label></td>
							<td></td>
						<td><strong><?php echo $row['employee_mail_id']; ?></strong></td></tr>
						<tr><td><label>Employee Date of Joining</label></td>
							<td></td>
						<td><strong><?php echo $row['employee_doj']; ?></strong></td></tr>
						<tr><td><label>Employee Mobile Number</label></td>
							<td></td>
						<td><strong><?php echo $row['employee_phone']; ?></strong></td></tr>
						<tr><td><label>Employee Status</label></td>
							<td></td>
						<td><strong><?php echo $row['employee_status']; ?></strong></td></tr>
					</table>
					<br>
					<button><a href="displayaction.php">BACK</a></button>
				</form>
		<?php	}
	}
	else{
		echo "<br> No Data Available..!";
	}
mysqli_close($conn);

?>