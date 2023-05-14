<?php 
include("testnoti.php");
$select="SELECT * from message WHERE status=1"; 
if (isset($_GET['id'])) {
	$main_id=$_GET['id'];
	$sql_upate=mysqli_query($connect,"UPDATE message SET status=1 WHERE id='$main_id'");
}

 ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from educhamp.themetrades.com/demo/admin/add-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:09:05 GMT -->
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

	<style type="text/css">
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
			width: 300px;
			height: 40px;
		}
	</style>
	
</head>
<body class="ttr-opened-sidebar ttr-pinned-sidebar">
	
	<!-- header start -->
	<header class="ttr-header">
		<div class="ttr-header-wrapper">
			<!--sidebar menu toggler start -->
			<div class="ttr-toggle-sidebar ttr-material-button">
				<i class="ti-close ttr-open-icon"></i>
				<i class="ti-menu ttr-close-icon"></i>
			</div>
			<!--sidebar menu toggler end -->
			<!--logo start -->
			<div class="ttr-logo-box">
				<div>
					<a href="AdminHome.php" class="ttr-logo">
						<img class="ttr-logo-mobile" alt="" src="images/logo-mobile.png" width="30" height="30">
						<img class="ttr-logo-desktop" alt="" src="images/logo-white.png" width="160" height="27">
					</a>
				</div>
			</div>
			<!--logo end -->
			<!-- header left menu end -->
			<div class="ttr-header-right ttr-with-seperator">
				<!-- header right menu start -->
				<ul class="ttr-header-navigation">
					<!--<li>
						<a href="#" class="ttr-material-button ttr-search-toggle"><i class="fa fa-search"></i></a>
					</li>-->
					<li>
						<?php 
$sql_get=mysqli_query($connect,"SELECT * FROM message WHERE status=0");
$count = mysqli_num_rows($sql_get);
						 ?>
						<a href="#" class="ttr-material-button ttr-submenu-toggle"><i class="fa fa-bell"></i>&nbsp&nbsp<span class="badge badge-light" id="count"><?php echo $count; ?></span></a>
						<div class="ttr-header-submenu noti-menu">
							<div class="ttr-notify-header">
								<span class="ttr-notify-text-top"><?php echo $count; ?> New</span>
								<span class="ttr-notify-text">User Notifications</span>
							</div>
							<div class="noti-box-list">
								<ul>
									<li>
										<span class="notification-icon dashbg-gray">
											<i class="fa fa-check"></i>
										</span>
										<span class="notification-text">
											<?php 
$sql_get1=mysqli_query($connect,"SELECT * FROM message WHERE status=0");
if (mysqli_num_rows($sql_get1)>0) {
	while ($result=mysqli_fetch_assoc($sql_get1)) {
		echo '<a href="readmessage.php?id='.$result['id'].'">'.$result['message'].'</a>';
	}
}
else{
	echo "No message";
}
$count = mysqli_num_rows($sql_get1);
											 ?>
											<span>Sneha Jogi</span> sent you a message.
										</span>
									</li>
									<li>
										<span class="notification-icon dashbg-yellow">
											<i class="fa fa-shopping-cart"></i>
										</span>
										<span class="notification-text">
											<a href="#">Your order is placed</a> sent you a message.
										</span>
									</li>
									
								</ul>
							</div>
						</div>
					</li>
					
				</ul>
				<!-- header right menu end -->
			</div>
		</div>
	</header>
	<br><br><br><br><br><br><br>
	<div class="container">
		<table class="table table-hover table-striped table-vcenter text-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Start Date</th>
                                            <th colspan="1">Due Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php 
                                    	while ($row = mysqli_fetch_object($sql_get)) { ?>
                                        <tr>
                                            <td><?php echo $row->id;?></td>
                                            <td><?php echo $row->name;?></td>
                                            <td><?php echo $row->message;?></td>
                                        </tr>
                                        <?php } ?>
                                        
                                    </tbody>
                                </table></div>
	</div>
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

<!-- Mirrored from educhamp.themetrades.com/demo/admin/add-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:09:05 GMT -->
</html>