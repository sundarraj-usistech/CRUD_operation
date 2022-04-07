<?php 
	require 'dbconnect.php';
	$id=$_GET['id'];
	$sql="SELECT * FROM employee_details WHERE employee_id= $id";
	$result=mysqli_query($conn,$sql);
	$rowCount=mysqli_num_rows($result);
	if ($rowCount>0) { ?>
		<?php while ($row=mysqli_fetch_assoc($result)) { ?>
				<form method="post">
					<table>
						<tr><td><label>Employee ID</label></td>
						<td><input type="text" name="id" value="<?php echo $row['employee_id']; ?>"></td></tr><br>
						<tr><td><label>Employee Name</label></td>
						<td><input type="text" name="name" value="<?php echo $row['employee_name']; ?>"></td></tr><br>
						<tr><td><label>Employee Designation</label></td>
						<td><input type="text" name="designation" value="<?php echo $row['employee_designation']; ?>"></td></tr><br>
						<tr><td><label>Employee Mail ID</label></td>
						<td><input type="text" name="email" value="<?php echo $row['employee_mail_id']; ?>"></td></tr><br>
						<tr><td><label>Employee Date of Joining</label></td>
						<td><input type="text" name="doj" value="<?php echo $row['employee_doj']; ?>"></td></tr><br>
						<tr><td><label>Employee Mobile Number</label></td>
						<td><input type="text" name="mobile" value="<?php echo $row['employee_phone']; ?>"></td></tr><br>
						<tr><td><label>Employee Status</label></td>
						<td><input type="text" name="status" value="<?php echo $row['employee_status']; ?>"></td></tr><br>
					</table>
					<br>
					<button type="submit" name="submit">EDIT</button>
				</form>
		<?php }
		if (isset($_POST['submit'])) {
			$emp_id=$_POST['id'];
			$emp_name=$_POST['name'];
			$emp_designation=$_POST['designation'];
			$emp_mail_id=$_POST['email'];
			$emp_doj=$_POST['doj'];
			$emp_mobile=$_POST['mobile'];
			$emp_status=$_POST['status'];

			$sql1="UPDATE employee_details SET employee_name = '$emp_name', employee_designation = '$emp_designation', employee_mail_id='$emp_mail_id',employee_phone = '$emp_mobile', employee_status ='$emp_status' WHERE employee_id = $id";
			$result1=mysqli_query($conn,$sql1);
				if($result1==true){
					header("Location: view.php?updated employee ".$emp_name." Successfully");		
				}	
				else if($result1==false){
				header("Location: view.php?error=updating Unsuccessfull..!");
			}
		}
}
else{
	echo "<br> No Data Available..!";
}		
 ?>