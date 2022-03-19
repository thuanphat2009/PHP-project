
<?php
include '../classes/brand.php';
include '../lib/session.php';
Session::checkSession();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="./assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>
		Now UI Dashboard by Creative Tim
	</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<!-- CSS Files -->
	<link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="./assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="./assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
	<?php
	$brand = new brand();
	if (!isset($_GET['brandid']) || $_GET['brandid'] == NULL) {
		echo "<script>window.location ='brandlist.php'</script>";
	} else {
		$id = $_GET['brandid'];
	}
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$brandName = $_POST['brandName'];
		$updateBrand = $brand->update_brand($brandName, $id);
	}
	?>
	<div class="wrapper ">
		<?php
		include '../admin/include/sidebar.php'
		?>
		<div class="main-panel" id="main-panel">
			<!-- Navbar -->
			<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
				<div class="container-fluid">
					<div class="navbar-wrapper">
						<div class="navbar-toggle">
							<button type="button" class="navbar-toggler">
								<span class="navbar-toggler-bar bar1"></span>
								<span class="navbar-toggler-bar bar2"></span>
								<span class="navbar-toggler-bar bar3"></span>
							</button>
						</div>

					</div>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-bar navbar-kebab"></span>
						<span class="navbar-toggler-bar navbar-kebab"></span>
						<span class="navbar-toggler-bar navbar-kebab"></span>
					</button>
					<div class="collapse navbar-collapse justify-content-end" id="navigation">
						<ul class="navbar-nav">
							<?php
							include '../admin/include/logout.php';
							?>
							<li class="nav-item">
								<a class="nav-link" href="#pablo">
									<i class="now-ui-icons users_single-02"></i>
									<p>
										<span class="d-lg-none d-md-block">Account</span>
									</p>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<!-- End Navbar -->
			<div class="panel-header panel-header-sm">
			</div>
			<div class="content">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="container">
								<div class="col-lg-12 p-5 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12 edit_information">
									<form action="" method="POST">
										<h3 class="text-center">Sửa Thương Hiệu</h3>
										<?php
										if (isset($updateBrand)) {
											echo $updateBrand;
										}
										?>
										<?php
										$get_brand_name = $brand->getbrandbyId($id);
										if ($get_brand_name) {
											while ($result = $get_brand_name->fetch_assoc()) {
										?>


												<div class="row">
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<div class="form-group">
															<label class="profile_details_text">Tên Thương Hiệu:</label>
															<input name="brandName" class="form-control" value="<?php echo $result['brandName'] ?>">

														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 submit">
														<div class="form-group">
															<input type="submit" name="submitBtn" class="btn btn-success" value="Sửa">
														</div>
													</div>
												</div>
												<a href="./brandlist.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Về Danh sách Thương Hiệu</a>
									</form>
							<?php
											}
										}
							?>
								</div>
							</div>	
						</div>
					</div>

				</div>
			</div>
			<footer class="footer">
				<div class=" container-fluid ">
					<nav>
						<ul>
							<li>
								<a href="https://www.creative-tim.com">
									Creative Tim
								</a>
							</li>
							<li>
								<a href="http://presentation.creative-tim.com">
									About Us
								</a>
							</li>
							<li>
								<a href="http://blog.creative-tim.com">
									Blog
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright" id="copyright">
						&copy; <script>
							document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
						</script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
					</div>
				</div>
			</footer>
		</div>
	</div>
	<!--   Core JS Files   -->
	<script src="./assets/js/core/jsbybanhcuon.js"></script>
	<script src="./assets/js/core/jquery.min.js"></script>
	<script src="./assets/js/core/popper.min.js"></script>
	<script src="./assets/js/core/bootstrap.min.js"></script>
	<script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
	<!--  Google Maps Plugin    -->
	<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
	<!-- Chart JS -->
	<script src="./assets/js/plugins/chartjs.min.js"></script>
	<!--  Notifications Plugin    -->
	<script src="./assets/js/plugins/bootstrap-notify.js"></script>
	<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
	<script src="./assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
	<script src="./assets/demo/demo.js"></script>
</body>

</html>