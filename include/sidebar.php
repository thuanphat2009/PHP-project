<div id="sidebar" class="span3">
					<div class="well well-small"><a id="myCart" href="product_summary.php"><img
								src="themes/images/ico-cart.png" alt="cart">3 sản phẩm <span
								class="badge badge-warning pull-right">$155.00</span></a></div>
					<ul id="sideManu" class="nav nav-tabs nav-stacked">
						<li class="subMenu open"><a> Danh Mục </a>
							<ul>
								
								<?php 
									$getall_category = $cate->add_category();
										if($getall_category){
											while($result_allcate = $getall_category->fetch_assoc()){

								?>
								<li><a href="productbycategory.php?cateid=<?php echo $result_allcate['cateId'] ?>"><i class="icon-chevron-right"></i><?php echo $result_allcate['cateName'] ?></a></li>
								
								<?php 
											}
										}
								?>
							</ul>
						</li>
						<li class="subMenu"><a> Thương Hiệu </a>
							<ul style="display:none">
							<?php 
									$getall_brand = $br->add_brand();
										if($getall_brand){
											while($result_allbrand = $getall_brand->fetch_assoc()){

								?>
								<li>
									<a href="productbybrand.php?brandid=<?php echo $result_allbrand['brandId'] ?>"><i class="icon-chevron-right"></i> <?php echo $result_allbrand['brandName'] ?></a>
								</li>
								<?php 
											}
										}
								?>
							</ul>
						</li>
					</ul>
					<br />
					<div class="thumbnail">
						<img src="themes/images/products/panasonic.jpg" alt="Bootshop panasonoc New camera" />
						<div class="caption">
							<h5>Panasonic</h5>
							<h4 style="text-align:center"><a class="btn" href="product_details.php"> <i
										class="icon-zoom-in"></i></a> <a class="btn" href="#"> Thêm vào <i
										class="icon-shopping-cart"></i></a> <a class="btn btn-primary"
									href="#">$222.00</a></h4>
						</div>
					</div><br />
					<div class="thumbnail">
						<img src="themes/images/products/kindle.png" title="Bootshop New Kindel" alt="Bootshop Kindel">
						<div class="caption">
							<h5>Kindle</h5>
							<h4 style="text-align:center"><a class="btn" href="product_details.php"> <i
										class="icon-zoom-in"></i></a> <a class="btn" href="#">Thêm vào <i
										class="icon-shopping-cart"></i></a> <a class="btn btn-primary"
									href="#">$222.00</a></h4>
						</div>
					</div><br />
					<div class="thumbnail">
						<img src="themes/images/payment_methods.png" title="Bootshop Payment Methods"
							alt="Payments Methods">
						<div class="caption">
							<h5>Phương thức thanh toán</h5>
						</div>
					</div>
				</div>