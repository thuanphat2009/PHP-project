<?php
require_once './lib/database.php';
require_once './helper/format.php';
require_once './lib/session.php';
Session::init();

spl_autoload_register(function ($className) {
	include_once "classes/" . $className . ".php";
});
$db = new Database();
$fm = new Format();
$ct = new cart();
$br = new brand();
$cate = new category();
$product = new product();
$comment = new comment();
$cs = new customer();
if (isset($_SESSION['cart'])) {
	$i = 0;
	foreach ($_SESSION['cart'] as $cart_item) {
		$i++;
	}
}
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
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
	<link rel="stylesheet" href="themes/css/custom.css">
	<style>
		.be-comment-block {
			margin-bottom: 50px !important;
			border: 1px solid #edeff2;
			border-radius: 2px;
			padding: 50px 70px;
			border: 1px solid #ffffff;
		}

		.comments-title {
			font-size: 16px;
			color: #262626;
			font-family: 'Conv_helveticaneuecyr-bold';
		}

		.be-img-comment {
			width: 60px;
			height: 60px;
			float: left;
			margin-bottom: 15px;
		}

		.be-ava-comment {
			width: 60px;
			height: 60px;
			border-radius: 50%;
		}


		.be-comment-content span {
			display: inline-block;
			width: 49%;
		}

		.be-comment-name {
			font-size: 13px;
			font-family: 'Conv_helveticaneuecyr-bold';
		}

		.be-comment-content a {
			color: #383b43;
		}

		.be-comment-content span {
			display: inline-block;
			width: 49%;
			margin-bottom: 15px;
		}

		.be-comment-time {
			text-align: right;
		}

		.be-comment-time {
			font-size: 11px;
			color: #b4b7c1;
		}

		.be-comment-text {
			font-size: 13px;
			line-height: 18px;
			color: #7a8192;
			display: block;
			background: #f6f6f7;
			border: 1px solid #edeff2;
			padding: 15px 20px 20px 20px;
		}

		.form-group.fl_icon .icon {
			position: absolute;
			top: 1px;
			left: 16px;
			width: 48px;
			height: 48px;
			background: #f6f6f7;
			color: #b5b8c2;
			text-align: center;
			line-height: 50px;
			-webkit-border-top-left-radius: 2px;
			-webkit-border-bottom-left-radius: 2px;
			-moz-border-radius-topleft: 2px;
			-moz-border-radius-bottomleft: 2px;
			border-top-left-radius: 2px;
			border-bottom-left-radius: 2px;
		}

		.form-group .form-input {
			font-size: 13px;
			line-height: 30px;
			font-weight: 400;
			color: #b4b7c1;
			width: 100%;
			margin:20px 20px 0;
			height: 50px;
			padding-left: 20px;
			padding-right: 20px;
			border: 1px solid #edeff2;
			border-radius: 3px;
		}

		.form-group.fl_icon .form-input {
			padding-left: 70px;
		}

		.form-group textarea.form-input {
			height: 150px;
		}
	</style>
</head>

<body>
	<div id="header">
		<div class="container">
			<div id="welcomeLine" class="row">
				<?php
				$login_check = Session::get('customer_name');
				if ($login_check) {
					echo '<div class="span6">Chào mừng <strong> ' . Session::get('customer_name') . '</strong></div>';
				}
				?>


				<div class="span12">
					<div class="pull-right">
						<?php
						if (isset($_SESSION['cart'])) {
						?>
							<a href="product_summary.php"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> <?php echo $i ?> sản phẩm trong giỏ hàng </span> </a>
						<?php
						} else {
						?>
							<a href="product_summary.php"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> 0 sản phẩm trong giỏ hàng </span> </a>
						<?php } ?>
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
					<form class="form-inline navbar-search" method="POST" action="timkiem.php">
						<input placeholder="Tìm kiếm sản phẩm" name="tukhoa" class="srchTxt" type="text" />
						<select style="width:100px;" name=option class="srchTxt">
							<option value="all">Tất cả</option>
							<?php
							$getall_brand = $br->add_brand();
							if ($getall_brand) {
								while ($result_allbrand = $getall_brand->fetch_assoc()) {

							?>
									<option value="<?php echo $result_allbrand['brandId'] ?>"><?php echo $result_allbrand['brandName'] ?> </option>
							<?php
								}
							}
							?>
						</select>
						<input value="Tìm kiếm" type="submit" name="timkiem" id="submitButton" class="btn btn-primary" />
					</form>
					<ul id="topMenu" class="nav pull-right">
						<li class=""><a href="products.php">Sản Phẩm</a></li>
						<li class=""><a href="special_offer.php">Đặc biệt</a></li>
						<li class=""><a href="contact.php">Liên hệ</a></li>

						<?php
						$login_check = Session::get('customer_login');
						if ($login_check == false) {
							echo '';
						} else {
							echo '<li class=""><a href="wishlist.php">Yêu thích</a></li>';
						}
						?>
						<?php
						$login_check = Session::get('customer_login');
						if ($login_check == false) {
							echo '';
						} else {
							echo '<li class=""><a href="profile.php">Thông tin người dùng</a></li>';
						}
						?>

						<?php
						if (isset($_GET['customer_id'])) {
							Session::destroy();
						}
						?>
						<?php
						$login_check = Session::get('customer_login');
						if ($login_check == false) {
							echo '<li class="">
								<a href="./login.php" role="button"  style="padding-right:0"><span
										class="btn btn-large btn-success">Đăng nhập</span></a>
								
							</li>
							<li class="">
								<a href="./register.php" role="button"  style="padding-right:0"><span
										class="btn btn-large btn-success">Đăng kí</span></a>
								
							</li>';
						} else {
							echo '<li class="">
								<a href="?customer_id=' . Session::get('customer_id') . '" role="button"  style="padding-right:0"><span
										class="btn btn-large btn-danger">Đăng xuất</span></a>
								
							</li>';
						}
						?>


					</ul>
				</div>
			</div>
		</div>
	</div>