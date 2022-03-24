<?php
include 'include/header.php';
require_once './classes/product.php';
require_once './lib/session.php';
Session::init();
?>
<?php
$id = intval($_GET['proid']);
$product = new product();
$getproductbyID = $product->getproductbyId($id);

if ($getproductbyID == null) {
	$message = "Không có sản phẩm này";
}
if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
	echo "<script>window.location ='index.php'</script>";
} else {
	$id = $_GET['proid'];
}
if (!isset($_GET['cateid']) || $_GET['cateid'] == NULL) {
	echo "<script>window.location ='index.php'</script>";
} else {
	$id_cate = $_GET['cateid'];
}
$customer_id = Session::get('customer_id');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])) {
	$productid = $_POST['productid'];
	$insertWishlist = $product->insert_wishlist($productid, $customer_id);
}
?>
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
		<div class="row">
			<!-- Sidebar ================================================== -->
			<?php
			include 'include/sidebar.php'
			?>
			<!-- Sidebar end=============================================== -->
			<div class="span9">
				<ul class="breadcrumb">
					<li><a href="index.php">Trang chủ</a> <span class="divider">/</span></li>
					<li><a href="products.php">Sản phẩm</a> <span class="divider">/</span></li>
					<li class="active">Chi tiết sản phẩm</li>
				</ul>
				<?php
				if (isset($message)) {
					echo "<h2>$message</h2>";
				}

				?>
				<?php
				$get_product_details = $product->get_details($id);
				if ($get_product_details) {
					while ($result_details = $get_product_details->fetch_assoc()) {

				?>
						<div class="row">


							<div id="gallery" class="span3">

								<a href="admin/uploads/<?php echo $result_details['image'] ?>" title="">
									<img style="height:250px;width:250px;object-fit:cover;" src="admin/uploads/<?php echo $result_details['image'] ?>" style="width:100%" alt="" />
								</a>

								<div class="btn-toolbar">
									<div class="btn-group">
										<span class="btn"><i class="icon-envelope"></i></span>
										<span class="btn"><i class="icon-print"></i></span>
										<span class="btn"><i class="icon-zoom-in"></i></span>
										<span class="btn"><i class="icon-star"></i></span>
										<span class="btn"><i class=" icon-thumbs-up"></i></span>
										<span class="btn"><i class="icon-thumbs-down"></i></span>
									</div>
								</div>
							</div>

							<div class="span6">
								<h3><?php echo $result_details['productName'] ?> </h3>
								<hr class="soft" />
								<h4><?php echo $result_details['tonkho'] ?> sản phẩm tồn kho</h4>
								<hr class="soft clr" />

								<div class="control-group">
									<label class="control-label"><span><?php echo $fm->format_currency($result_details['price']) . " " . "VND" ?></span></label>

									<div class="controls">
										<form method="post" action="./classes/themgiohang.php?proid=<?php echo $result_details['productId'] ?>" class="form-horizontal qtyFrm">
											<input name="themgiohang" value="Thêm vào giỏ" type="submit" class="btn btn-large btn-primary pull-right">
										</form>
										<form action="" method="POST">
											<input type="hidden" name="productid" value="<?php echo $result_details['productId'] ?>">

											<?php
											$login_check = Session::get('customer_login');
											if ($login_check) {
												echo '<input style="margin-right:4px;" type="submit" name="wishlist" value="Thêm yêu thích" class="btn btn-large btn-warning pull-right">
											';
											} else {
												echo '';
											}
											?>
											<?php
											if (isset($insertWishlist)) {
												echo $insertWishlist;
											}
											?>
										</form>
									</div>
								</div>
								<hr class="soft" />
								<?php echo $result_details['product_desc'] ?>
							</div>


							<div class="span9">
								<ul id="productDetail" class="nav nav-tabs">
									<li class="active"><a href="#home" data-toggle="tab">Chi tiết sản phẩm</a></li>
									<li><a href="#profile" data-toggle="tab">Sản phẩm tương tự</a></li>
								</ul>
								<div id="myTabContent" class="tab-content">
									<div class="tab-pane fade active in" id="home">
										<h4>Thông tin sản phẩm</h4>
										<table class="table table-bordered">
											<tbody>
												<tr class="techSpecRow">
													<th colspan="2">Chi tiết</th>
												</tr>
												<tr class="techSpecRow">
													<td class="techSpecTD1">Nhà sản xuất: </td>
													<td class="techSpecTD2"><?php echo $result_details['brandName'] ?></td>
												</tr>
												<tr class="techSpecRow">
													<td class="techSpecTD1">Mô tả:</td>
													<td class="techSpecTD2"><?php echo $result_details['product_desc'] ?></td>
												</tr>
												<tr class="techSpecRow">
													<td class="techSpecTD1">Phân loại:</td>
													<td class="techSpecTD2"> <?php echo $result_details['cateName'] ?></td>
												</tr>
											</tbody>
										</table>


									</div>
									<div class="tab-pane fade" id="profile">
										<div id="myTab" class="pull-right">
										
											<a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
										</div>
										<br class="clr" />
										<hr class="soft" />

										<div class="tab-content">
											
											<div class="tab-pane active" id="blockView">
												<ul class="thumbnails">
													<?php
													$get_product_relative = $product->get_product_relative($id, $id_cate);
													if ($get_product_relative) {
														while ($result_relative = $get_product_relative->fetch_assoc()) {

													?>
															<li class="span3">
																<div class="thumbnail">
																	<a href="product_details.php?proid=<?php echo $result_relative['productId'] ?>&&cateid=<?php echo $result_relative['cateId'] ?>">
																		<img style="height:160px;width:160px;object-fit:cover;border-radius:15px;" src="admin/uploads/<?php echo $result_relative['image'] ?>" alt="" /></a>
																	<div class="caption">
																		<h5><?php echo $result_relative['productName'] ?> </h5>
																		<p>
																			<?php echo $result_relative['product_desc'] ?>
																		</p>
																		<form method="post" action="./classes/themgiohang.php?proid=<?php echo $result_relative['productId'] ?>" class="form-horizontal qtyFrm">
																		<h4 style="text-align:center">
																		
																			<a class="btn" href="product_details.php?proid=<?php echo $result_relative['productId'] ?>&&cateid=<?php echo $result_relative['cateId'] ?>">
																				<i class="icon-zoom-in"></i>
																			</a> 
																			<input value=" Thêm vào giỏ" type="submit" name="themgiohang" class="btn btn-primary" />
																			<a class="btn btn-primary" href="#"> <?php echo $fm->format_currency($result_relative['price']) . " " . "VND" ?>
																			</a>
																		</h4>
																		</form>
																	</div>
																</div>
															</li>
													<?php
														}
													}
													?>
												</ul>
												<hr class="soft" />
											</div>
										</div>
										<br class="clr">
									</div>
								</div>
							</div>

						</div>
				<?php
					}
				}
				?>
			</div>
		</div>
	</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php
include 'include/footer.php'
?>