<?php 
	require_once './lib/database.php';
	require_once './helper/format.php';
	require_once './lib/session.php';
    Session::init(); 

	spl_autoload_register(function($className){
		include_once "classes/".$className.".php";
	});
	$db = new Database();
	$fm = new Format();
	$ct = new cart();
	$us = new user();
	$br = new brand();
	$cate = new category();
	$product = new product();
	$cs = new customer();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Bootshop online Shopping cart</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<!--Less styles -->
	<!-- Other Less css file //different less files has different color scheam
	<link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
	-->
	<!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
	<script src="themes/js/less.js" type="text/javascript"></script> -->

	<!-- Bootstrap style -->
	<link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen" />
	<link href="themes/css/base.css" rel="stylesheet" media="screen" />
	<!-- Bootstrap style responsive -->
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
	<!-- Google-code-prettify -->
	<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet" />
	<!-- fav and touch icons -->
	<link rel="shortcut icon" href="themes/images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144"
		href="themes/images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114"
		href="themes/images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
	<link rel="stylesheet" href="themes/css/custom.css">
</head>

<body>
	<div id="header">
		<div class="container">
			<div id="welcomeLine" class="row">
				<?php 
					$login_check = Session::get('customer_name');
					if($login_check){
						echo '<div class="span6">Chào mừng <strong> '.Session::get('customer_name').'</strong></div>';
					}
				?>
				

				<div class="span6">
					<div class="pull-right">
						<a href="product_summary.php"><span class="btn btn-mini btn-primary"><i
									class="icon-shopping-cart icon-white"></i> 3 sản phẩm trong giỏ hàng </span> </a>
					</div>
				</div>
			</div>
			<!-- Navbar ================================================== -->
			<div id="logoArea" class="navbar">
				<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<div class="navbar-inner">
					<a class="brand" href="index.php"><img src="themes/images/logo.png" alt="Bootsshop" /></a>
					<form class="form-inline navbar-search" method="post" action="products.php">
						<input id="srchFld" class="srchTxt" type="text" />
						<select class="srchTxt">
							<option>Tất cả</option>
							<option>Áo </option>
							<option>Quần </option>
						</select>
						<button type="submit" id="submitButton" class="btn btn-primary">Tìm kiếm</button>
					</form>
					<ul id="topMenu" class="nav pull-right">
						<li class=""><a href="products.php">Sản Phẩm</a></li>
						<li class=""><a href="special_offer.php">Đặc biệt</a></li>
						<li class=""><a href="normal.php">Đặt hàng</a></li>
						<li class=""><a href="contact.php">Liên hệ</a></li>
						
						<?php 
							$login_check = Session::get('customer_login');
							if($login_check==false){
								echo '';
							}else{
								echo '<li class=""><a href="wishlist.php">Yêu thích</a></li>';
							}
						?>
						<?php 
							$login_check = Session::get('customer_login');
							if($login_check==false){
								echo '';
							}else{
								echo '<li class=""><a href="profile.php">Thông tin người dùng</a></li>';
							}
						?>
						
						<?php 
							if(isset($_GET['customer_id'])){
								Session::destroy();
							}
						?>
						<?php 
							$login_check = Session::get('customer_login');
							if($login_check==false){
								echo '<li class="">
								<a href="./login.php" role="button"  style="padding-right:0"><span
										class="btn btn-large btn-success">Đăng nhập</span></a>
								
							</li>
							<li class="">
								<a href="./register.php" role="button"  style="padding-right:0"><span
										class="btn btn-large btn-success">Đăng kí</span></a>
								
							</li>';
							}else{
								echo '<li class="">
								<a href="?customer_id='.Session::get('customer_id').'" role="button"  style="padding-right:0"><span
										class="btn btn-large btn-danger">Đăng xuất</span></a>
								
							</li>';
							}
						?>

						
					</ul>
				</div>
			</div>
		</div>
	</div>