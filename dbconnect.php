<?php 
	$dbHost='localhost';
	$dbUser='root';
	$dbpassword='';
	$dbName='internal_training';

	$conn=mysqli_connect($dbHost,$dbUser,$dbpassword,$dbName);

	if(!$conn){
		echo "Not Connected";
	}
 ?>