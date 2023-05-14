<?php 
	include("connect.php");

	$CategoryID=$_GET['CategoryID'];
	$delete="DELETE FROM categories_data
			WHERE CategoryID='$CategoryID'";
	$result=mysqli_query($connect,$delete);
	if ($result) {
		echo "<script>window.location='Categories.php'</script>";
	}




 ?>