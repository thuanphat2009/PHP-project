<?php
include_once 'include/header.php';
include_once 'include/slider.php';
require_once './helper/format.php';
$fm = new Format();
?>
<div id="mainBody">
	<div class="container">
		<div class="row">
			<!-- Sidebar ================================================== -->
			<?php
			include 'include/sidebar.php'
			?>
			<!-- Sidebar end=============================================== -->
			<div class="span9">
				<div class="well well-small">
					<h4>Sản phẩm nổi bật <small class="pull-right">200+ sản phẩm</small></h4>
					<div class="row-fluid">
						<div id="featured" class="carousel slide">
							<div class="carousel-inner">
								<div class="item active">
									<ul class="thumbnails">
										<?php
										$product_featured = $product->getproduct_featured_first();
										if ($product_featured) {
											while ($result = $product_featured->fetch_assoc()) {
										?>
												<li class="span3">
													<div class="thumbnail">
														<i class="tag"></i>
														<a href="product_details.php?proid=<?php echo $result['productId'] ?>&&cateid=<?php echo $result['cateId'] ?> ">
															<img class="radius slider" src="admin/uploads/<?php echo $result['image'] ?>" alt="">
														</a>
														<div class="caption ">
															<h5><?php echo $result['productName'] ?></h5>
															<h4 class="text-center flex-column">
																<span class="pull-right text-warning"><?php echo $fm->format_currency($result['price']) . " " . "VND" ?>
																</span>
																<a class="btn btn-success" href="product_details.php?proid=<?php echo $result['productId'] ?>&&cateid=<?php echo $result['cateId'] ?>">Xem</a>
															</h4>
														</div>
													</div>
												</li>
										<?php
											}
										}
										?>
									</ul>
								</div>
								<div class="item ">
									<ul class="thumbnails">
										<?php
										$product_featured_last = $product->getproduct_featured_last();
										if ($product_featured_last) {
											while ($result_last = $product_featured_last->fetch_assoc()) {
										?>
												<li class="span3">
													<div class="thumbnail">
														<i class="tag"></i>
														<a href="product_details.php?proid=<?php echo $result_last['productId'] ?>&&cateid=<?php echo $result_last['cateId'] ?>"><img class="radius slider" src="admin/uploads/<?php echo $result_last['image'] ?>" alt=""></a>
														<div class="caption">
															<h5><?php echo $result_last['productName'] ?></h5>
															<h4 class="text-center flex-column">
															<span class="pull-right text-warning"><?php echo $fm->format_currency($result_last['price']) . " " . "VND" ?></span>
																<a class="btn btn-success" href="product_details.html">Xem</a>
															</h4>
														</div>
													</div>
												</li>
										<?php
											}
										}
										?>
									</ul>
								</div>
							</div>
							<a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
							<a class="right carousel-control" href="#featured" data-slide="next">›</a>
						</div>
					</div>
				</div>
				<h4>Sản phẩm mới nhất </h4>
				<ul class="thumbnails">
					<?php
					$product_new = $product->get_product_new(6);
					if ($product_new) {
						while ($result_new = $product_new->fetch_assoc()) {
					?>
							<li class="span3">
								<div class="thumbnail">
									<a href="product_details.php?proid=<?php echo $result_new['productId'] ?>&&cateid=<?php echo $result_new['cateId'] ?>">
										<img class="radius product-new" src="admin/uploads/<?php echo $result_new['image'] ?>" alt="" /></a>
									<div class="caption">
										<h5><?php echo $result_new['productName'] ?></h5>
										<p>
											<!-- echo $fm->textShorten($result['product_desc'],5)  -->
											<?php echo $fm->textShorten($result_new['product_desc'],80)  ?>
										</p>
										<form method="post" action="./classes/themgiohang.php?proid=<?php echo $result_new['productId'] ?>" class="form-horizontal qtyFrm">
										<h4 style="text-align:center">
											<a class="btn btn-warning" href="product_details.php?proid=<?php echo $result_new['productId'] ?>&&cateid=<?php echo $result_new['cateId'] ?> ">
												<i class=" icon-zoom-in"></i>
											</a>
											<input value=" Thêm vào giỏ" type="submit" name="themgiohang" class="btn btn-primary" />
											<div class="text-error" href="#">
												<?php echo $fm->format_currency($result_new['price']) . " " . "VND" ?>
											</div>
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

			</div>

		</div>
	</div>
</div>
<!-- Footer ================================================================== -->
<?php
include 'include/footer.php'
?>