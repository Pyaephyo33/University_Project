<?php 
include("connect.php");
if (isset($_POST['setdate'])) 
		{
			$closuretitle=$_POST['closuretitle'];
			$firstclosuredate=$_POST['firstclosuredate'];
			$finalclosuredate=$_POST['finalclosuredate'];
			

			$add="INSERT INTO closure_data (ClosureTitle, FirstClosureDate, FinalClosureDate)
					VALUES ('$closuretitle','$firstclosuredate','$finalclosuredate')";
			$recordadd=mysqli_query($connect,$add);
			if ($recordadd) 
			{

				echo "<script>window.alert('date added.')</script>";
			}
			else
			{
				echo "<script>window.alert('Failed to add date!')</script>";
			}
		}
 ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from educhamp.themetrades.com/demo/admin/basic-calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:11:35 GMT -->
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
		.t{
			font-size: 14px;
			font-family: "Times New Roman";
			border: 1px inset;
			padding-left: 10px;
			width: 150px;
			height: 30px;
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
				<h4 class="breadcrumb-title">Closure Date</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Closure Date</li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Closure Date</h4>
						</div>
						<div class="widget-inner">
							<form class="edit-profile m-b30" action="" method="POST">
								<div class="">
									<div class="form-group row">
										<div class="col-sm-10  ml-auto">
											<h3>Set Closure Date</h3>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label" for="closuredate">Title</label>
										<div class="col-sm-7">
											<input class="t" type="text" name="closuretitle">
										</div><!--type="date" is not supported in Internet Explorer 11 or prior Safari 14.1-->
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label" for="closuredate">First Closure Date</label>
										<div class="col-sm-7">
											<input class="t" type="date" id="closuredate" name="firstclosuredate" value="<?php echo date('Y-m-d'); ?>">
										</div><!--type="date" is not supported in Internet Explorer 11 or prior Safari 14.1-->
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label" for="closuredate">Final Closure Date</label>
										<div class="col-sm-7">
											<input class="t" type="date" id="closuredate" name="finalclosuredate" min="<?php echo date('Y-m-d'); ?>">
										</div><!--type="date" is not supported in Internet Explorer 11 or prior Safari 14.1-->
									</div>
									<div class="row">
									<div class="col-sm-2">
									</div>
									<div class="col-sm-7">
										<input type="submit" class="btn"name="setdate" value="Set">
									</div>
								</div>
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
<script src='vendors/calendar/moment.min.js'></script>
<script src='vendors/calendar/fullcalendar.js'></script>
<script src='vendors/switcher/switcher.js'></script>
<script>

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      defaultDate: '2022-03-12',
      navLinks: true, // can click day/week names to navigate views

      weekNumbers: true,
      weekNumbersWithinDays: true,
      weekNumberCalculation: 'ISO',

      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
        {
          title: 'First Deadline',
          start: '2022-04-18'
        },
        {
        	title: 'Final Deadline',
        	start: '2022-04-30'
        }
      ]
    });

  });

</script>
</body>

<!-- Mirrored from educhamp.themetrades.com/demo/admin/basic-calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:11:35 GMT -->
</html>