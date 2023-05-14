<?php 
	include("connect.php");
	if ($_SERVER["REQUEST_METHOD"]=="POST") {
		$email=$_POST["email"];
		$password=$_POST["password"];

		$select="SELECT * FROM users_data
				WHERE 	User_email='$email' 
				AND User_password='$password'";
		$result=mysqli_query($connect,$select);
		$record=mysqli_num_rows($result);
		$row=mysqli_fetch_array($result);
		if($record > 0)
		{
		if($row["RoleID"]=="1")
			{	
				$_SESSION["UserID"]=$row['UserID'];
				$_SESSION["User_email"]=$email;
				header("location:Home.php");
			}
			elseif($row["RoleID"]=="2")
			{
				$_SESSION["UserID"]=$row['UserID'];
				$_SESSION["User_email"]=$email;
				header("location:QaMHome.php");
			}
			elseif($row["RoleID"]=="3")
			{
				$_SESSION["UserID"]=$row['UserID'];
				$_SESSION["User_email"]=$email;
				header("location:QaCHome.php");
			}
			elseif($row["RoleID"]=="4")
			{
				$_SESSION["UserID"]=$row['UserID'];
				$_SESSION["User_email"]=$email;
				header("location:StaffHome.php");
			}
		}
		else
		{
			$error="Login Unsuccessful! Please, Try Agin!";
		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>University</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">

	<link rel="stylesheet" type="text/css" href="csss/util.css">
	<link rel="stylesheet" type="text/css" href="csss/main.css">

	<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/Website.css">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" action="" method="POST">
					<span class="login100-form-title p-b-49">
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Email is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Type your Email">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Forgot password?
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								<a href="#">Login</a>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<script src="js/jquery-3.3.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>