<?php 
	include("connect.php");

	$DepartmentID=$_GET['DepartmentID'];
	$delete="DELETE FROM department_data
			WHERE DepartmentID='$DepartmentID'";
	$result=mysqli_query($connect,$delete);
	if ($result) {
		echo "<script>window.location='Department.php'</script>";
	}

 ?>