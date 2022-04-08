<style type="text/css">
	table,th,td{
		border: 1px solid black;
	}
	td{
		text-align: center;

	}
</style>
<?php 
	require'dbconnect.php';  
	$perPageDisplay=5;
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
?>      
<?php
	$sql="SELECT * FROM employee_details LIMIT $startFrom,$perPageDisplay";
	$result=mysqli_query($conn,$sql);
	$rowCount=mysqli_num_rows($result);
	if($rowCount>0){
		echo "<table><tr><th>Employee ID</th><th>Employee Name</th><th>Designation</th><th>E-Mail ID</th><th>Date of Joining</th><th>Mobile Number</th><th>Employee Status</th></tr>";
		while($data=mysqli_fetch_assoc($result)){
			echo "<tr><td> ".$data['employee_id']."</td><td> ".$data['employee_name']."</td><td>".$data['employee_designation']."</td><td>".$data['employee_mail_id']."</td><td>".$data['employee_doj']."</td><td>".$data['employee_phone']."</td><td>".$data['employee_status']."</td></tr>" ;
		}
		echo "</table>";
		echo '<br>';
	}
	for ($i=1; $i<=$totalPages; $i++) {
	    echo'<a href="pagination-5.php?page='.$i.'"><button>'.$i.'</button></a>';
    }
 ?>
