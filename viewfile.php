<style type="text/css">
	.method{
		display: table-row;
		justify-content: space-evenly;
	}
</style>
<?php 
	require 'dbconnect.php';
	$id=$_GET['id'];
	$sql="SELECT * FROM employee_documents WHERE employee_id=$id";
	$result=mysqli_query($conn,$sql);
	$rowCount=mysqli_num_rows($result);
	if($rowCount>0){
		while ($data=mysqli_fetch_assoc($result)) {
			?>
			<div class="method">
			<?php echo $data['document_name']; ?>
			<br><br>
			<a href="Uploads/<?php echo $data['document_name']; ?>" target="_blank"><button>VIEW</button></a>
			</div>
<?php		}
	}
	else{
		echo "No Records Found";
	}
 ?>