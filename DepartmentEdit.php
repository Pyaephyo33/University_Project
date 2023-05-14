<?php
	include("connect.php");
	$DepartmentID=$_GET['DepartmentID'];
	$select="SELECT * FROM department_data
			WHERE DepartmentID='$DepartmentID'";
	$result=mysqli_query($connect,$select);
	$callvalue=mysqli_fetch_assoc($result);

	if (isset($_POST['edit'])) {
		$departmentname=$_POST['departmentname'];
		$phone=$_POST['phone'];
		
		$update="UPDATE department_data
				SET DepartmentName='$departmentname',
				Depart_phone='$phone'
				WHERE DepartmentID='$DepartmentID'";
		$recordupdate=mysqli_query($connect,$update);
		if ($recordupdate) {
			echo "<script>window.alert(' edited.')</script>";
			echo "<script>window.location.assign('Department.php')</script>";
		}
		else
		{
			echo "<script>window.alert('Failed to edit !')</script>";
		}
	}
	if (isset($_POST['back'])) {
		header("location:Department.php");
	}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from educhamp.themetrades.com/demo/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:08:15 GMT -->
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
		.wc-title .btn{
			float: right;
		}
		.k{
			font-weight: 450;
			font-size: 20px;
		}
		.widget-inner-a{
			width: 100%;
			height: 100%;
			margin-top: 5px;
		}
		.widget-inner-a .table thead tr th{
			text-align: center;
		}
		.widget-inner-a .table{
			text-align: center;
		}
		.modal-body .t{
			font-size: 14px;
			font-family: "Times New Roman";
			border: 1px inset;
			padding-left: 10px;
			width: 80%;
			height: 40px;
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
				<h4 class="breadcrumb-title">Edit Department</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Edit Department</li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<span class="k">Edit Departments</span>
								<!--<a href="#" class="btn" data-toggle="modal" data-target="#exampleModal">Add Department</a>-->
						</div>

						<div class="modal fade review-bx-reply" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">New category</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<input class="t" type="text" placeholder="Category Name"><br><br>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn mr-auto">Add</button>
									</div>
								</div>
							</div>
						</div>

						<div class="widget-inner">

							<form class="edit-profile m-b30" action="" method="POST">
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Dept. Name</label>
										<div class="col-sm-7">
											<input class="form-control" type="text" name="departmentname" value="<?= $callvalue['DepartmentName'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Phone</label>
										<div class="col-sm-7">
											<input class="form-control" type="text" name="phone"value="<?= $callvalue['Depart_phone'] ?>">
										</div>
									</div>
									<div class="row">
									<div class="col-sm-2">
									</div>
									<div class="col-sm-7">
										<input type="submit" class="btn" name="edit" value="Edit">
										<input type="submit" class="btn-secondry" name="back" value="Back">
									</div>
								</div>
							</form>

						</div>
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
      defaultDate: '2019-03-12',
      navLinks: true, // can click day/week names to navigate views

      weekNumbers: true,
      weekNumbersWithinDays: true,
      weekNumberCalculation: 'ISO',

      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
        {
          title: 'All Day Event',
          start: '2019-03-01'
        },
        {
          title: 'Long Event',
          start: '2019-03-07',
          end: '2019-03-10'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2019-03-09T16:00:00'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2019-03-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2019-03-11',
          end: '2019-03-13'
        },
        {
          title: 'Meeting',
          start: '2019-03-12T10:30:00',
          end: '2019-03-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2019-03-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2019-03-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2019-03-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2019-03-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2019-03-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2019-03-28'
        }
      ]
    });

  });

</script>
</body>

<!-- Mirrored from educhamp.themetrades.com/demo/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:09:05 GMT -->
</html>