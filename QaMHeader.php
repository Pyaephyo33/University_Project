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
					<a href="QaMHome.php" class="ttr-logo">
						<img class="ttr-logo-mobile" alt="" src="images/logo-mobile.png" width="30" height="30">
						<!--<img class="ttr-logo-desktop" alt="" src="images/logo-white.png" width="160" height="27">-->
					</a>
				</div>
			</div>
			<div class="ttr-header-menu">
				<!-- header left menu start -->
				<ul class="ttr-header-navigation">
					<li>
						<a href="QaMHome.php" class="ttr-material-button ttr-submenu-toggle">University</a>
					</li>
				</ul>
				<!-- header left menu end -->
			</div>
			<!--logo end -->
			<!-- header left menu end -->
			<div class="ttr-header-right ttr-with-seperator">
				<!-- header right menu start -->
				<ul class="ttr-header-navigation">
					
					</li>
					<li>
						<a href="#" class="ttr-material-button ttr-submenu-toggle"><span class=""><?php echo $_SESSION["User_email"] ?></span></a>
						<div class="ttr-header-submenu">
							<ul>

								<li><a href="QaMProfile.php">My profile</a></li>
								<li><a href="Logout.php">Logout</a></li>
							</ul>
						</div>
					</li>
					
				</ul>
				<!-- header right menu end -->
			</div>
			<!--header search panel start -->
			<div class="ttr-search-bar">
				<form class="ttr-search-form" action="" method="POST">
					<div class="ttr-search-input-wrapper">
						<input type="text" name="qq" placeholder="search something..." class="ttr-search-input">
						<button type="submit" name="search" class="ttr-search-submit"><i class="ti-arrow-right"></i></button>
					</div>
					<span class="ttr-search-close ttr-search-toggle">
						<i class="ti-close"></i>
					</span>
				</form>
			</div>
			<!--header search panel end -->
		</div>
	</header>