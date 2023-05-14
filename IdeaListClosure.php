<?php 
include("connect.php");
$ClosureID=$_GET['ClosureID'];
$select="SELECT * FROM closure_data
WHERE ClosureID='$ClosureID'";
$select1="SELECT * FROM closure_data
			WHERE ClosureID='$ClosureID'";
$result1=mysqli_query($connect,$select1);
$callvalue=mysqli_fetch_assoc($result1);
$select2="SELECT * FROM categories_data";
$result2=mysqli_query($connect,$select2);

if (isset($_POST['add'])) 
	{
		$userid=$_POST['userid'];
		$closureid=$_POST['closureid'];
		$ideatitle=$_POST['ideatitle'];
        $annoymous = $_POST['annoymous'];
        if ($annoymous == "1") {
            $query = "INSERT INTO idea_data SET Annoymous ='1'";
        } else {
            $query = "INSERT INTO idea_data SET Annoymous ='0'";
        }
		$ideadescription=$_POST['ideadescription'];
		$category=$_POST['category'];
		$myfile=$_POST['myfile'];
		

		$add="INSERT INTO idea_data (UserID, ClosureID , Idea_title, Idea_description, CategoryID, IdeaFile, Annoymous)
				VALUES ('$userid', '$closureid', '$ideatitle', '$ideadescription', '$category', '$myfile','$annoymous')";
		$recordadd=mysqli_query($connect,$add);
		if ($recordadd) {

			echo "<script>window.alert('added.')</script>";
			echo "<script>window.location='ClosureListIdea.php'</script>";
		}
		else
		{
			echo "<script>window.alert('Failed to add.')</script>";
		}
	}
if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 5;
        $offset = ($pageno-1) * $no_of_records_per_page;
        $total_pages_sql = "SELECT COUNT(*) FROM idea_data";
        $result4 = mysqli_query($connect,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result4)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
$select3="SELECT idea_data.IdeaID, idea_data.Annoymous, users_data.FullName, idea_data.Idea_title, categories_data.CategoryName, idea_data.View FROM idea_data 
						INNER JOIN users_data ON idea_data.UserID=users_data.UserID
						INNER JOIN categories_data ON idea_data.CategoryID=categories_data.CategoryID 
		WHERE ClosureID='$ClosureID' ORDER BY IdeaID LIMIT $offset, $no_of_records_per_page";
		$result=mysqli_query($connect,$select3);
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
			width: 250px;
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
				<h4 class="breadcrumb-title">Idea</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Idea</li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
									<span class="k">Ideas</span>
									<a href="#" class="btn" data-toggle="modal" data-target="#exampleModal">New Idea</a>
							</div>

							
<div><br>
	&nbsp<a href="IdeaView.php?ClosureID=<?php echo $ClosureID;?>" class="btn">Most View</a>&nbsp&nbsp
	<a href="IdeaLatest.php?ClosureID=<?php echo $ClosureID;?>" class="btn">Latest Ideas</a>
</div><br>
						<div class="widget-inner-a">
							<table class="table table-hover table-striped table-vcenter text-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Author</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>View</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php while ($row1 = mysqli_fetch_object($result)) { ?>
                                        <tr>
                                            <td><?php echo $row1->IdeaID;?></td>
                                            <td><?php if ($row1->Annoymous == '0') {
                                            	echo $row1->FullName;

                                            }
                                            else
                                            {
                                            	echo "Annoymous";
                                            }?></td>
                                            <td><?php echo $row1->Idea_title;?></td>
                                            <td><?php echo $row1->CategoryName;?></td>
                                            <td><?php echo $row1->View;?></td>
                                            <td><?php echo '<a class="btn btn-icon btn-sm" href="Comment.php?IdeaID='. $row1->IdeaID.'"><i class="fa fa-comments-o"></i></a>';?></td>
                                        </tr>
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                                <ul class="pagination">
        <li><a href="IdeaList.php?ClosureID=<?php echo $ClosureID;?>&pageno=1">First</a></li>        
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
        	<a href="<?php if($pageno <= 1){ echo '#'; } else { echo 'IdeaList.php?ClosureID='.$ClosureID.'&pageno='.($pageno - 1);}?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo 'IdeaList.php?ClosureID='.$ClosureID.'&pageno='.($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="IdeaList.php?ClosureID=<?php echo $ClosureID;?>&pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
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
</body>

<!-- Mirrored from educhamp.themetrades.com/demo/admin/review.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:11:35 GMT -->
</html>