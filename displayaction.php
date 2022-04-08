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
<form method="post">
	<label>Choose a Filter Method</label>
	<select name="filter">
		<option></option>
		<option value="filterbydoj">Date of Joining</option>
		<option value="filterbydesignation">Designation</option>
	</select>
	<button type="submit" name="submitfilter">SUBMIT</button>
</form><br>
<?php 
	if (isset($_POST['submitfilter'])) {
		if($_POST['filter']=='filterbydoj'){ 
	 ?>		<p>Select the Date to Search</p>
			<form>
				<input type="date" name="emp_doj">
				<button name="submitdate">SEARCH</button></a>
			</form>
<?php }
		elseif ($_POST['filter']=='filterbydesignation') {
			 ?>
			<h4>Enter the Designation to search</h4>
			<form>
			<select name="designation">
				<option></option>
				<option>CEO</option>
				<option>Manager</option>
				<option>HR Manager</option>
				<option>Consultant</option>
				<option>Trainer</option>
				<option>Trainee</option>
			</select>
			<button name="submitdesignation">FILTER</button>
		</form>
<?php		}
		} 
		if (isset($_GET['submitdate'])) {
					$emp_doj=$_GET['emp_doj'];
					header("Location: dojfilter.php?&doj=".$emp_doj);
		}
		if (isset($_GET['submitdesignation'])) {
					$emp_designation=$_GET['designation'];
					header("Location: designationfilter.php?&designation=".$emp_designation);
		}
	?>
<form method="post">
	<label>Choose a Sorting Method</label>
	<select name="sort">
		<option></option>
		<option value="sortiddesc">Sort by ID in descending</option>
		<option value="sortnameasc">Sort by Name in ascending</option>
		<option value="sortnamedesc">Sort by Name in descending</option>
		<option value="sortstatusasc">Sort by Status in ascending</option>
		<option value="sortstatusdesc">Sort by Status in descending</option>
	</select>
	<button type="submit" name="submitsort">SUBMIT</button>
</form><br>
<?php 
	if (isset($_POST['submitsort'])) {
		if($_POST['sort']=='sortiddesc'){
			header("Location: sortingiddesc.php");
		}
		elseif ($_POST['sort']=='sortnameasc') {
			header("Location: sortingnameasc.php");
		}
		elseif ($_POST['sort']=='sortnamedesc') {
			header("Location: sortingnamedesc.php");
		}
		elseif ($_POST['sort']=='sortstatusasc') {
			header("Location: sortingstatusasc.php");
		}
		elseif ($_POST['sort']=='sortstatusdesc') {
			header("Location: sortingstatusdesc.php");
		}
	}
 ?>
 <a href="create.php"><button>Add a new Employee</button></a><br>
 <br>
<?php 
	function display($result){ ?>	
		<table><tr><th>Employee ID</th><th>Employee Name</th><th>Designation</th><th>E-Mail ID</th><th>Date of Joining</th><th>Mobile Number</th><th>Employee Status</th><th>Action</th></tr>
				<?php while($data=mysqli_fetch_assoc($result)){
					echo "<tr><td> ".$data['employee_id']."</td><td> ".$data['employee_name']."</td><td>".$data['employee_designation']."</td><td>".$data['employee_mail_id']."</td><td>".$data['employee_doj']."</td><td>".$data['employee_phone']."</td><td>".$data['employee_status']."</td>" ;
			?>	<td><a href="edit.php?id=<?php echo $data["employee_id"]; ?>"><button>EDIT</button></a>
				<a href="delete.php?id=<?php echo $data["employee_id"]; ?>"><button>DELETE</button></a></td></tr>	
			<?php
				} 
			echo "</table>";
	}
?>