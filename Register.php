<?php 
	include("connect.php");

	if (isset($_POST['register'])) 
	{
		$fullname=$_POST['fullname'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$role=$_POST['role'];
		$department=$_POST['department'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];
		
		

		$add="INSERT INTO users_data (Fullname, User_email, User_password, RoleID, DepartmentID, PhoneNo, Address)
				VALUES ('$fullname', '$email', '$password', '$role', '$department', '$phone', '$address')";
		$recordadd=mysqli_query($connect,$add);
		if ($recordadd) {

			echo "<script>window.alert('Successfully Register.')</script>";
			echo "<script>window.location='Register.php'</script>";
		}
		else
		{
			echo "<script>window.alert('Failed to register acount.')</script>";
		}
	}
	$select="SELECT * FROM roles_data";
	$result=mysqli_query($connect,$select);
	$select1="SELECT * FROM department_data";
	$result1=mysqli_query($connect,$select1);

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from educhamp.themetrades.com/demo/admin/teacher-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:11:35 GMT -->
<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	
	<!-- DESCRIPTION -->
	<meta name="description" content="EduChamp : Education HTML Template" />
	
	<!-- OG -->
	<meta property="og:title" content="EduChamp : Education HTML Template" />
	<meta property="og:description" content="EduChamp : Education HTML Template" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="../error-404.html" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
	
	<!-- PAGE TITLE HERE ============================================= -->
	<title>EduChamp : Education HTML Template </title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	
	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="css/assets.css">
	<link rel="stylesheet" type="text/css" href="vendors/calendar/fullcalendar.css">
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="css/typography.css">
	
	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="css/shortcodes/shortcodes.css">
	
	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
	<link class="skin" rel="stylesheet" type="text/css" href="css/color/color-1.css">

	<style>
		.d{
			margin-left: 14px;
		}
	</style>
	
</head>
<body class="ttr-opened-sidebar ttr-pinned-sidebar">
	
	<!-- header start -->
	<?php 
		include("Header.php");
	 ?>
	<!-- header end -->


	<!-- Left sidebar menu start -->
	<?php 
		include("Sidebar.php");
	 ?>
	<!-- Left sidebar menu end -->

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Register</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Register</li>
				</ul>
			</div>	
			<div class="row">
				
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Register</h4>
						</div>

						<div class="widget-inner">
							<form class="edit-profile m-b30" action="" method="POST">
								
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Full Name</label>
										<div class="col-sm-7">
											<input type="text" class="form-control" name="fullname"  placeholder="Nyan Linn Winn">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Email</label>
										<div class="col-sm-7">
											<input type="Email" class="form-control" name="email" placeholder="www.email@gmail.com">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Password</label>
										<div class="col-sm-7">
											<input type="password" class="form-control" name="password">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label" for="roles">Role</label>
										<div class="d">	
										<select name="role" class="form-control" required>
				<?php while ($row = mysqli_fetch_array($result)):;?>
				<option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
				<?php endwhile; ?>
			</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label" for="roles">Department</label>
										<div class="d">	
										<select name="department" class="form-control" required>
				<?php while ($row1 = mysqli_fetch_array($result1)):;?>
				<option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
				<?php endwhile; ?>
			</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Phone No.</label>
										<div class="col-sm-7">
											<input type="number" class="form-control" name="phone" placeholder="+959-782452626">
										</div>
									</div>
<div class="form-group row">
										<label class="col-sm-2 col-form-label">Address</label>
										<div class="col-sm-7">
											<input type="text" class="form-control" name="address" placeholder="5-S2-20 Dummy City, UK">
										</div>
									</div>
									
								<div class="row">
									<div class="col-sm-2">
									</div>
									<div class="col-sm-7">
										<input type="submit" class="btn mr-auto" name="register" value="Register">
										<input type="reset" class="btn-secondry" name="cancel" value="Cancel">
									</div>
								</div>	
							</form>
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
			</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>

<!-- External JavaScripts -->
<script src="js/jquery.min.js"></script>
<script src="vendors/bootstrap/js/popper.min.js"></script>
<script src="vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="vendors/magnific-popup/magnific-popup.js"></script>
<script src="vendors/counter/waypoints-min.js"></script>
<script src="vendors/counter/counterup.min.js"></script>
<script src="vendors/imagesloaded/imagesloaded.js"></script>
<script src="vendors/masonry/masonry.js"></script>
<script src="vendors/masonry/filter.js"></script>
<script src="vendors/owl-carousel/owl.carousel.js"></script>
<script src='vendors/scroll/scrollbar.min.js'></script>
<script src="js/functions.js"></script>
<script src="vendors/chart/chart.min.js"></script>
<script src="js/admin.js"></script>
<script src='vendors/switcher/switcher.js'></script>
<script>
	
// Pricing add
	function newMenuItem() {
		var newElem = $('tr.list-item').first().clone();
		newElem.find('input').val('');
		newElem.appendTo('table#item-add');
	}
	if ($("table#item-add").is('*')) {
		$('.add-item').on('click', function (e) {
			e.preventDefault();
			newMenuItem();
		});
		$(document).on("click", "#item-add .delete", function (e) {
			e.preventDefault();
			$(this).parent().parent().parent().parent().remove();
		});
	}
</script>
</body>

</html>