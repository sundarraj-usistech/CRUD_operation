<?php 
	require 'dbconnect.php';
	$id=$_GET['id'];
	$sql="SELECT * FROM employee_details WHERE employee_id=$id";
	$result=mysqli_query($conn,$sql);
	while ($data=mysqli_fetch_assoc($result)) { ?>
		<form method="post">
		 	<table>
				<tr><td><label>Employee ID</label></td>
				<td><input type="text" name="id" value="<?php echo $data['employee_id'];?>"readonly></td></tr>
				<tr><td><label>Employee Name</label></td>
				<td><input type="text" name="name" value="<?php echo $data['employee_name'];?>"readonly></td></tr>
			</table><br>
				<form method="post">
					<label><strong>Choose a File Type to Upload</strong></label>
					<select name="filetype">
						<option></option>
						<option value="document">DOCUMENT</option>
						<option value="image">IMAGE</option>
					</select>
					<button name="submit">SUBMIT</button>
				</form>
		</form>
<?php 	}
		if (isset($_POST['submit'])) {
			if ($_POST['filetype']=='document') { ?>
				<form method="post" enctype="multipart/form-data">
					<label>Choose a Document</label><br>
					<input type="file" name="uploadfile"><br><br>
					<button name="uploaddoc">UPLOAD</button>
				</form>
	<?php	}
			elseif ($_POST['filetype']=='image') { ?>
				<form method="post" enctype="multipart/form-data">	
					<label>Choose an Image</label><br>
					<input type="file" name="uploadimage"><br><br>
					<button name="uploadimg">UPLOAD</button>
				</form>
	<?php	}
		} 
		if (isset($_POST['uploaddoc'])) {
		$emp_id=$_GET['id'];
		$fileName=$_FILES['uploadfile']['name'];
		$filePath=$_FILES['uploadfile']['tmp_name'];
		$temp = explode(".", $fileName);
		$newFileName= round(microtime(true)) . '.' . end($temp);
		// print_r($newFileName);
		// exit();
		$folder="Employee Documents/Documents/".$newFileName;
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
		if (isset($_POST['uploadimg'])) {
		$emp_id=$_GET['id'];
		$imgName=$_FILES['uploadimage']['name'];
		$imgPath=$_FILES['uploadimage']['tmp_name'];
		$temp = explode(".", $imgName);
		$newImgName= round(microtime(true)) . '.' . end($temp);
		// print_r($newImgName);
		// exit();
		$folder="Employee Documents/Images/".$newImgName;
		$sql="INSERT INTO employee_documents (image_name, employee_id) VALUES ('$newImgName',$emp_id)";
		$result=mysqli_query($conn,$sql);
			if ($result) {
				if(move_uploaded_file($imgPath,$folder)){
					header("Location: displayaction.php?success=uploaded image");
				}
			}
			else{
					echo "Upload Failure";
			}
		}
?>