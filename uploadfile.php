<?php 
	require 'dbconnect.php';
	$id=$_GET['id'];
	$sql="SELECT * FROM employee_details WHERE employee_id=$id";
	$result=mysqli_query($conn,$sql);
	while ($data=mysqli_fetch_assoc($result)) {
		?>
		<form method="post" enctype="multipart/form-data">
			<table>
				<tr><td><label>Employee ID</label></td>
				<td><input type="text" name="id" value="<?php echo $data['employee_id'];?>"readonly></td></tr>
				<tr><td><label>Employee Name</label></td>
				<td><input type="text" name="name" value="<?php echo $data['employee_name'];?>"readonly></td></tr>
			</table><br>
			<input type="file" name="uploadfile"><br><br>
			<button name="upload">UPLOAD</button>
		</form>		
	<?php }
	if (isset($_POST['upload'])) {
		$emp_id=$_POST['id'];
		$fileName=$_FILES['uploadfile']['name'];
		$filePath=$_FILES['uploadfile']['tmp_name'];
		$temp = explode(".", $_FILES['uploadfile']['name']);
		$newFileName= round(microtime(true)) . '.' . end($temp);
		$folder="Uploads/".$newFileName;
		$sql="INSERT INTO employee_documents (document_name, employee_id) VALUES ('$newFileName',$emp_id)";
		$result=mysqli_query($conn,$sql);
		if ($result) {
			if(move_uploaded_file($filePath,$folder)){
				header("Location: displayaction.php?success=uploaded file");
			}
		}
		else{
				echo "Upload Failure";
		}
	}
 ?>
