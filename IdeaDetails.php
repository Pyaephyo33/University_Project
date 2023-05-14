<?php 
include("connect.php");
	if (isset($_GET['IdeaID'])) {
	$IdeaID=$_GET['IdeaID'];
	$UserID=$_SESSION['UserID'];
	$updateview=mysqli_query($connect,"UPDATE idea_data SET View=View+1 WHERE IdeaID='$IdeaID'");
	$select="SELECT idea_data.IdeaID, idea_data.Annoymous, users_data.FullName, idea_data.Idea_title, idea_data.Idea_description, categories_data.CategoryName, idea_data.IdeaFile FROM idea_data 
                        INNER JOIN users_data ON idea_data.UserID=users_data.UserID
                        INNER JOIN categories_data ON idea_data.CategoryID=categories_data.CategoryID 
        WHERE IdeaID='$IdeaID'";
        $result=mysqli_query($connect,$select);
		$callvalue=mysqli_fetch_assoc($result);
	
	$select1="SELECT feedback_data.Annoymous, users_data.FullName, feedback_data.Feedback FROM feedback_data
	INNER JOIN users_data ON feedback_data.UserID=users_data.UserID WHERE IdeaID='$IdeaID'";
	$result1=mysqli_query($connect,$select1);

	$count=mysqli_query($connect,"SELECT Rating COUNT FROM rating_data WHERE IdeaID='$IdeaID' AND Rating='like'");
	$likecount=mysqli_num_rows($count);
	$count1=mysqli_query($connect,"SELECT Rating COUNT FROM rating_data WHERE IdeaID='$IdeaID' AND Rating='dislike'");
	$dislikecount=mysqli_num_rows($count1);
	$checkuser=mysqli_query($connect,"SELECT UserID COUNT FROM rating_data WHERE UserID='$UserID'");
	$rowuser=mysqli_num_rows($checkuser);

	if (isset($_POST['like'])) {
		$likereact=$_POST['likereact'];
		$liked=mysqli_query($connect,"INSERT INTO rating_data (UserID, Rating, IdeaID) VALUES ('$UserID','$likereact','$IdeaID')");
		if ($liked) {
				header("Refresh:0;");
			}
	}
	if (isset($_POST['dislike'])) {
		$dislikereact=$_POST['dislikereact'];
		$disliked=mysqli_query($connect,"INSERT INTO rating_data (UserID, Rating, IdeaID) VALUES ('$UserID','$dislikereact','$IdeaID')");
		if ($disliked) {
				header("Refresh:0;");
			}
	}
}


 ?>
 <!DOCTYPE html>
<html lang="en">

<!-- Mirrored from educhamp.themetrades.com/demo/admin/review.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:11:35 GMT -->
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
			padding-bottom: 7px;
		}

		.k{
			font-weight: 450;
			font-size: 20px;
		}
		.modal-body .t{
			font-size: 14px;
			font-family: "Times New Roman";
			border: 1px inset;
			padding-left: 10px;
			width: 250px;
			height: 30px;

		}
		.form-control-a{
			border: 1px inset;
			width: 400px;
		}
		.dislike{
			margin-left: 40px;
			display: inline-block;
  			cursor: pointer;
  			margin: 10px;
		}
		.bb{
			margin-left: 20px;
		}
		.like{
			display: inline-block;
  			cursor: pointer;
  			margin: 10px;
		}
		.dislike:hover,
		.like:hover {
  			color: cyan;
  			transition: all .2s ease-in-out;
 			transform: scale(1.1);
		}
		.active {
  			color: cyan;
		}
		.span{
			background-color: ghostwhite;
			color: ghostwhite;
			font-size: 10px;
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
				<h4 class="breadcrumb-title">Comment</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Comment</li>
				</ul>
			</div>
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<!--<div class="wc-title">
							<span class="k">Comments</span>
						</div>-->
							<form class="edit-profile m-b30" action="" method="POST">
								<div class="form-group row">
									<label class="col-sm-2 col-form-label" hidden><?= $callvalue['IdeaID'] ?></label>
									
								</div>
								<div class="form-group row">
									<h4><?php if ($callvalue['Annoymous'] =='0') {
 												echo $callvalue['FullName'];
	 												}else{
	 											echo "Annoymous";
	 												} ?></h4>
									
									</div>
								<div class="form-group row">
									<h5><?= $callvalue['Idea_title'] ?></h5>
									
								</div>
								<div class="form-group row">
									<h5><?= $callvalue['Idea_description'] ?></h5>
									</div>
								<div class="form-group row">
									<h5>[<?= $callvalue['CategoryName'] ?>]</h5>
								</div>
								<div class="form-group row">
										
										<div class="col-sm-7">
											<a href="#"><?= $callvalue['IdeaFile'] ?><i class="fa fa-file-text-o"></i></a>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-sm-7">
											<input type="text" name="likereact" value="like" hidden>
											<input type="text" name="dislikereact" value="dislike" hidden>
											<button class="btn btn-default" type="submit" onclick="return confirm('One reaction can only give reaction once to any idea. Confirm Liked?')" name="like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?php echo $likecount; ?></button>
											<button class="btn btn-default" type="submit" onclick="return confirm('One reaction can only give reaction once to any idea. Confirm Disliked?')" name="dislike"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> <?php echo $dislikecount; ?></button>
 											<a class="btn" href="Comment.php?IdeaID=<?php echo $IdeaID;?>">Comment</a>
										</div>
									</div>
									<div class="form-group row">

										<div class="col-sm-7">
											<a href="CommentNewOld.php?IdeaID=<?php echo $IdeaID;?>" class="btn">New-Old Feedback</a>
	 		
										</div>
									</div>
							</form>
							
							<HR style="height:10px; border-width:0; color: whitesmoke; background-color: whitesmoke;">

							<div class="wc-title">
								<div class="widget-inner">
									<?php while ($row = mysqli_fetch_object($result1)) { ?>
								<table class="table table-hover table-striped table-vcenter text-nowrap mb-0">
									<tr>
										<div class="card-courses-list-bx">
										<ul class="card-courses-view">
											<li class="card-courses-user">
												<div class="card-courses-user-info">
													<h4><?php if ($row->Annoymous == '0') {
                                                echo $row->FullName;

                                            }
                                            else
                                            {
                                                echo "Annoymous";
                                            }?></h4>
												</div>
											</li>
										</ul>
									</div>
									
										<div class="col-md-12">
											<?php echo $row->Feedback;?>	
										</div>
										</tr>

										<HR style="height:15px; border-width:0; color: whitesmoke; background-color: whitesmoke;">
<?php } ?>
										
									</table>
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
	$('.like, .dislike').on('click', function() {
    event.preventDefault();
    $('.active').removeClass('active');
    $(this).addClass('active');
});
</script>
</body>

<!-- Mirrored from educhamp.themetrades.com/demo/admin/review.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:11:35 GMT -->
</html>