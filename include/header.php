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
	$cate = new category();
	$product = new product();
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
</head>

<body>
	<div id="header">
		<div class="container">
			<div id="welcomeLine" class="row">
				<div class="span6">Chào mừng <strong> Phát</strong></div>
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
						<li class=""><a href="special_offer.php">Đặc biệt</a></li>
						<li class=""><a href="normal.php">Đặt hàng</a></li>
						<li class=""><a href="contact.php">Liên hệ</a></li>
						<li class="">
							<a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span
									class="btn btn-large btn-success">Đăng nhập</span></a>
							<div id="login" class="modal hide fade in" tabindex="-1" role="dialog"
								aria-labelledby="login" aria-hidden="false">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"
										aria-hidden="true">×</button>
									<h3>Đăng nhập</h3>
								</div>
								<div class="modal-body">
									<form class="form-horizontal loginFrm">
										<div class="control-group">
											<input type="text" id="inputEmail" placeholder="Email">
										</div>
										<div class="control-group">
											<input type="password" id="inputPassword" placeholder="Mật khẩu">
										</div>
										<div class="control-group">
											<label class="checkbox">
												<input type="checkbox"> Ghi nhớ
											</label>
										</div>
									</form>
									<button type="submit" class="btn btn-success">Đăng nhập</button>
									<button class="btn" data-dismiss="modal" aria-hidden="true">Đóng</button>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>