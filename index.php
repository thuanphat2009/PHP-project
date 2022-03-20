<?php 
	include 'include/header.php';
	include 'include/slider.php';
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
												$product_featured = $product->getproduct_featured();
												if($product_featured){
													while($result = $product_featured->fetch_assoc()){		
											?>
											<li class="span3">
												<div class="thumbnail">
													<i class="tag"></i>
													<a href="product_details.php?proid=<?php echo $result['productId'] ?> ">
													<img style="height:140px;width:140px;object-fit:cover;"
														src="admin/uploads/<?php echo $result['image'] ?>" alt="">
													</a>
													<div class="caption">
														<h5><?php echo $result['productName'] ?></h5>
														<h4><a class="btn" href="product_details.php">Xem</a> <span
																class="pull-right"><?php echo $result['price']." "."VND" ?></span></h4>
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
							$product_new = $product->getproduct_new();
							if($product_new){
							while($result = $product_new->fetch_assoc()){		
						?>
						<li class="span3">
							<div class="thumbnail">
								<a href="product_details.php?proid=<?php echo $result['productId'] ?>">
								<img style="height:250px;width:250px;object-fit:cover;" src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
								<div class="caption">
									<h5><?php echo $result['productName'] ?></h5>
									<p>
										 <!-- echo $fm->textShorten($result['product_desc'],5)  -->
										 <?php echo $result['product_desc'] ?>
									</p>

									<h4 style="text-align:center"><a class="btn" href="product_details.php"> <i
												class="icon-zoom-in"></i></a> <a class="btn" href="#">Thêm vào <i
												class="icon-shopping-cart"></i></a> <a class="btn btn-primary"
											href="#"><?php echo $result['price']." "."VND" ?></a></h4>
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