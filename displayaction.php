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
	.method{
		display: flex;
		justify-content: space-between;
	}
</style>
<div class="method">
	<a href="create.php"><button>Add a new Employee</button></a>
	<form method="post">
		<label>Choose a Filter Method</label>
		<select name="filter">
			<option></option>
			<option value="filterbydoj">Date of Joining</option>
			<option value="filterbydesignation">Designation</option>
		</select>
		<button type="submit" name="submitfilter">SUBMIT</button>
	</form>
</div>
<br>
<div align="right">
<?php 
	if (isset($_POST['submitfilter'])) {
		if($_POST['filter']=='filterbydoj'){ 
	 ?>		
	 <?php 
			$sql="SELECT DISTINCT employee_doj FROM employee_details";
			$result=mysqli_query($conn,$sql);
			if ($result) {
	?>
	<form>
		<label>Select the Date to Search</label>
		<select name="doj">
		<?php 
			while ($row=mysqli_fetch_assoc($result)) {
		?>
			<option><?php echo $row['employee_doj']; ?></option>
	<?php		
			}
		
		echo "</select>";
		}
	?>		<button name="submitdate">SUBMIT</button>
		</form>
<?php }
		elseif ($_POST['filter']=='filterbydesignation') { 
	?>
			
	<?php		
			$sql="SELECT DISTINCT employee_designation FROM employee_details";
			$result=mysqli_query($conn,$sql);
			if ($result) {
		?><form>
			<label>Select the Designation to Search</label>
			<select name="designation">
			<?php 
				while ($row=mysqli_fetch_assoc($result)) {
			?>
				<option><?php echo $row['employee_designation']; ?></option>
		<?php		
				}
			echo "</select>";
			}
		?>		<button name="submitdesignation">SUBMIT</button>
			</form>	
<?php		}
		}
	echo "</div>";
		if (isset($_GET['submitdate'])) {
					$emp_doj=$_GET['doj'];
					header("Location: dojfilter.php?&doj=".$emp_doj);
		}
		if (isset($_GET['submitdesignation'])) {
					$emp_designation=$_GET['designation'];
					header("Location: designationfilter.php?&designation=".$emp_designation);
		}
	?>
	<br>
<div class="method">	
	<form method="post">
		<label>Choose a Sorting Method</label>
		<select name="sort">
			<option></option>
			<option value="sortidasc">Sort by ID in ascending</option>
			<option value="sortiddesc">Sort by ID in descending</option>
			<option value="sortnameasc">Sort by Name in ascending</option>
			<option value="sortnamedesc">Sort by Name in descending</option>
			<option value="sortstatusasc">Sort by Status in ascending</option>
			<option value="sortstatusdesc">Sort by Status in descending</option>
		</select>
		<button type="submit" name="submitsort">SUBMIT</button>
	</form>
<?php 
	if (isset($_POST['submitsort'])) {
		if ($_POST['sort']=='sortidasc'){
			header("Location: sortingidasc.php");
		}
		elseif($_POST['sort']=='sortiddesc'){
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
 <form>
		<label>Number of Rows to display</label>
		<input type="number" name="pagestodisplay">
		<button name="submitpageselection">SELECT</button>
</form>
</div>
<?php 
	if (isset($_GET['submitpageselection'])) {
		$pageDisplay=$_GET['pagestodisplay'];
		header("Location: displayaction.php?pages=".$pageDisplay);
	}
 ?>
<br>
<?php 
	require 'dbconnect.php'; 
	if (isset($_GET['pages'])) {
		$perPageDisplay=$_GET['pages'];
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
	if($rowCount1>0){
		display($result1);
	} 
	else{
		echo "No data found";
	}
	for ($i=1; $i<=$totalPages; $i++) {
    echo'<a href="displayaction.php?page='.$i.'&pages='.$perPageDisplay.'"><button>'.$i.'</button></a>';
	}
mysqli_close($conn);

 ?>
<?php 
	function display($result){ ?>	
		<table width="50%" align="center"><tr><th>Employee ID</th><th>Employee Name</th><th>Action</th><th>Documents</th></tr>
				<?php while($data=mysqli_fetch_assoc($result)){
					echo "<tr><td> ".$data['employee_id']."</td><td> ".$data['employee_name']."</td>" ;
			?>	<td><div class="method"><a href="view.php?id=<?php echo $data["employee_id"]; ?>"><button>VIEW</button></a><a href="edit.php?id=<?php echo $data["employee_id"]; ?>"><button>EDIT</button></a>
				<a href="delete.php?id=<?php echo $data["employee_id"]; ?>"><button>DELETE</button></a></div></td><td><a href="viewfile.php?id=<?php echo $data["employee_id"]; ?>"><button>VIEW</button></a><a href="uploadfile.php?id=<?php echo $data["employee_id"]; ?>"><button>UPLOAD</button></a>
				</td></tr>	
			<?php
				} 
			echo "</table><br>";
	}
?>