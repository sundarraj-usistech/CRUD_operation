<?php 
	require 'dbconnect.php'; 
	require 'displayaction.php';
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
    echo'<a href="view.php?page='.$i.'&pages='.$perPageDisplay.'"><button>'.$i.'</button></a>';
	}
mysqli_close($conn);

 ?>