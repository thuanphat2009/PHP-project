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

?>
<?php 
	if (!isset($_GET['cateid']) || $_GET['cateid'] == NULL) {
		echo "<script>window.location ='index.php'</script>";
	  } else {
		$id_cate = $_GET['cateid'];
	  }
?>
<?php 
	$customer_id = Session::get('customer_id');
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist']))  {
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
				<div class="row">
          	<form method="post" action="./classes/themgiohang.php?proid=<?php echo $result_details['productId'] ?>" class="form-horizontal qtyFrm">
					<div id="gallery" class="span3">
					<?php 
						$get_product_details = $product->get_details($id);
						if($get_product_details){
							while($result_details = $get_product_details->fetch_assoc()){
						
					?>
						<a href="admin/uploads/<?php echo $result_details['image'] ?>" title="">
							<img style="height:250px;width:250px;object-fit:cover;border-radius:15px;" src="admin/uploads/<?php echo $result_details['image'] ?>" style="width:100%" alt="" />
						</a>
						<div id="differentview" class="moreOptopm carousel slide">
							<!-- <div class="carousel-inner">
								<div class="item active">
									<a href="themes/images/products/large/f1.jpg"> <img style="width:29%" src="themes/images/products/large/f1.jpg" alt="" /></a>
									<a href="themes/images/products/large/f2.jpg"> <img style="width:29%" src="themes/images/products/large/f2.jpg" alt="" /></a>
									<a href="themes/images/products/large/f3.jpg"> <img style="width:29%" src="themes/images/products/large/f3.jpg" alt="" /></a>
								</div>
								<div class="item">
									<a href="themes/images/products/large/f3.jpg"> <img style="width:29%" src="themes/images/products/large/f3.jpg" alt="" /></a>
									<a href="themes/images/products/large/f1.jpg"> <img style="width:29%" src="themes/images/products/large/f1.jpg" alt="" /></a>
									<a href="themes/images/products/large/f2.jpg"> <img style="width:29%" src="themes/images/products/large/f2.jpg" alt="" /></a>
								</div>
							</div> -->
							<!--  
			  <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a> 
			  -->
						</div>

						<div class="btn-toolbar">
							<div class="btn-group">
								<span class="btn"><i class="icon-envelope"></i></span>
								<span class="btn"><i class="icon-print"></i></span>
								<span class="btn"><i class="icon-zoom-in"></i></span>
								<span class="btn">
									<i class="icon-star"></i>
								</span>
								
								<span class="btn"><i class=" icon-thumbs-up"></i></span>
								<span class="btn"><i class="icon-thumbs-down"></i></span>
							</div>
						</div>
					</div>
				
					<div class="span6">
				
						<h3><?php echo $result_details['productName'] ?> </h3>
						<!-- <small>- (14MP, 18x Optical Zoom) 3-inch LCD</small> -->
						<hr class="soft" />
						<form class="form-horizontal qtyFrm">
							<div class="control-group">
										<label class="control-label"><span><?php echo $result_details['price'] . " " . "VND" ?></span></label>
										<div class="controls">
	
											<input name="themgiohang" value="Thêm vào giỏ" type="submit" class="btn btn-large btn-primary pull-right">

										</div>
									</div>
						</form>
						<form action="" method="POST">
									<input type="hidden" name="productid" value="<?php echo $result_details['productId'] ?>">

									<?php 
										$login_check = Session::get('customer_login');
										if($login_check){
											echo '<input type="submit" name="wishlist" value="Thêm yêu thích" class="btn btn-large btn-warning pull-right">
											';
										}else{
											echo '';
										}
									?>
									<?php 
										if(isset($insertWishlist)){
											echo $insertWishlist;
										}
									?>
								</form>

						<hr class="soft" />
						<h4><?php echo $result_details['tonkho'] ?> sản phẩm tồn kho</h4>
						<hr class="soft clr" />
						<!-- <p>
							<?php echo $result_details['product_desc'] ?>

						</p> -->
						
					</div>
          </form>
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
							
								<?php 
									}
								}
								?>
							</div>
							<div class="tab-pane fade" id="profile">
								<div id="myTab" class="pull-right">
									<a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
									<a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
								</div>
								<br class="clr" />
								<hr class="soft" />
								

										<div class="tab-content">
											<div class="tab-pane" id="listView">
												<div class="row">
													<div class="span2">
														<img src="themes/images/products/4.jpg" alt="" />
													</div>
													<div class="span4">

														<hr class="soft" />
														<h5>Tên sản phẩm</h5>
														<p>
															Mô tả.
														</p>
														<a class="btn btn-small pull-right" href="product_details.php">Xem chi tiết</a>
														<br class="clr" />
													</div>
													<div class="span3 alignR">
														<form class="form-horizontal qtyFrm">
															<h3> $222.00</h3>

															<div class="btn-group">
																<a href="product_details.php" class="btn btn-large btn-primary"> Thêm vào <i class=" icon-shopping-cart"></i></a>
																<a href="product_details.php" class="btn btn-large"><i class="icon-zoom-in"></i></a>
															</div>
														</form>
													</div>
												</div>
												<hr class="soft" />
												<div class="row">
													<div class="span2">
														<img src="themes/images/products/5.jpg" alt="" />
													</div>
													<div class="span4">

														<hr class="soft" />
														<h5>Tên sản phẩm</h5>
														<p>
															Mô tả.
														</p>
														<a class="btn btn-small pull-right" href="product_details.php">Xem chi tiết</a>
														<br class="clr" />
													</div>
													<div class="span3 alignR">
														<form class="form-horizontal qtyFrm">
															<h3> $222.00</h3>

															<div class="btn-group">
																<a href="product_details.php" class="btn btn-large btn-primary"> Thêm vào <i class=" icon-shopping-cart"></i></a>
																<a href="product_details.php" class="btn btn-large"><i class="icon-zoom-in"></i></a>
															</div>
														</form>
													</div>
												</div>
												<hr class="soft" />
												<div class="row">
													<div class="span2">
														<img src="themes/images/products/6.jpg" alt="" />
													</div>
													<div class="span4">

														<hr class="soft" />
														<h5>Tên sản phẩm</h5>
														<p>
															Mô tả.
														</p>
														<a class="btn btn-small pull-right" href="product_details.php">Xem chi tiết</a>
														<br class="clr" />
													</div>
													<div class="span3 alignR">
														<form class="form-horizontal qtyFrm">
															<h3> $222.00</h3>

															<div class="btn-group">
																<a href="product_details.php" class="btn btn-large btn-primary"> Thêm vào <i class=" icon-shopping-cart"></i></a>
																<a href="product_details.php" class="btn btn-large"><i class="icon-zoom-in"></i></a>
															</div>
														</form>
													</div>
												</div>
												<hr class="soft" />
												<div class="row">
													<div class="span2">
														<img src="themes/images/products/7.jpg" alt="" />
													</div>
													<div class="span4">

														<hr class="soft" />
														<h5>Tên sản phẩm</h5>
														<p>
															Mô tả.
														</p>
														<a class="btn btn-small pull-right" href="product_details.php">Xem chi tiết</a>
														<br class="clr" />
													</div>
													<div class="span3 alignR">
														<form class="form-horizontal qtyFrm">
															<h3> $222.00</h3>

															<div class="btn-group">
																<a href="product_details.php" class="btn btn-large btn-primary"> Thêm vào <i class=" icon-shopping-cart"></i></a>
																<a href="product_details.php" class="btn btn-large"><i class="icon-zoom-in"></i></a>
															</div>
														</form>
													</div>
												</div>

												<hr class="soft" />
												<div class="row">
													<div class="span2">
														<img src="themes/images/products/8.jpg" alt="" />
													</div>
													<div class="span4">

														<hr class="soft" />
														<h5>Tên sản phẩm</h5>
														<p>
															Mô tả.
														</p>
														<a class="btn btn-small pull-right" href="product_details.php">Xem chi tiết</a>
														<br class="clr" />
													</div>
													<div class="span3 alignR">
														<form class="form-horizontal qtyFrm">
															<h3> $222.00</h3>

															<div class="btn-group">
																<a href="product_details.php" class="btn btn-large btn-primary"> Thêm vào <i class=" icon-shopping-cart"></i></a>
																<a href="product_details.php" class="btn btn-large"><i class="icon-zoom-in"></i></a>
															</div>
														</form>
													</div>
												</div>
												<hr class="soft" />
												<div class="row">
													<div class="span2">
														<img src="themes/images/products/9.jpg" alt="" />
													</div>
													<div class="span4">

														<hr class="soft" />
														<h5>Tên sản phẩm</h5>

									</div>
									<div class="tab-pane active" id="blockView">
										<ul class="thumbnails">
										<?php 
											$get_product_relative = $product->get_product_relative($id,$id_cate);
											if($get_product_relative){
												while($result_relative = $get_product_relative->fetch_assoc()){
						
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
				
										<br class="clr">

														<h4 style="text-align:center"><a class="btn" href="product_details.php?proid=<?php echo $result_relative['productId'] ?>&&cateid=<?php echo $result_relative['cateId'] ?>"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Thêm vào <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#"><?php echo $fm->format_currency($result_relative['price']) . " " . "VND" ?></a>
														</h4>
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