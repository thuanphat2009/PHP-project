<?php
include 'include/header.php';
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
					<div id="gallery" class="span3">
						<a href="themes/images/products/large/f1.jpg" title="Fujifilm FinePix S2950 Digital Camera">
							<img src="themes/images/products/large/3.jpg" style="width:100%" alt="Fujifilm FinePix S2950 Digital Camera" />
						</a>
						<div id="differentview" class="moreOptopm carousel slide">
							<div class="carousel-inner">
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
							</div>
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
								<span class="btn"><i class="icon-star"></i></span>
								<span class="btn"><i class=" icon-thumbs-up"></i></span>
								<span class="btn"><i class="icon-thumbs-down"></i></span>
							</div>
						</div>
					</div>
					<div class="span6">
						<h3>Fujifilm FinePix S2950 Digital Camera </h3>
						<small>- (14MP, 18x Optical Zoom) 3-inch LCD</small>
						<hr class="soft" />
						<form class="form-horizontal qtyFrm">
							<div class="control-group">
								<label class="control-label"><span>$222.00</span></label>
								<div class="controls">
									<input style="width:80px;" type="number" class="span1" placeholder="Số lượng." />
									<button type="submit" class="btn btn-large btn-primary pull-right"> Thêm vào giỏ
										<i class=" icon-shopping-cart"></i></button>
								</div>
							</div>
						</form>

						<hr class="soft" />
						<h4>100 sản phẩm tồn kho</h4>
						<hr class="soft clr" />
						<p>
							Mô tả

						</p>

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
											<td class="techSpecTD2">Fujifilm</td>
										</tr>
										<tr class="techSpecRow">
											<td class="techSpecTD1">Mã máy:</td>
											<td class="techSpecTD2">FinePix S2950HD</td>
										</tr>
										<tr class="techSpecRow">
											<td class="techSpecTD1">Ngày sản xuất:</td>
											<td class="techSpecTD2"> 2011-01-28</td>
										</tr>
										<tr class="techSpecRow">
											<td class="techSpecTD1">Trọng lượng:</td>
											<td class="techSpecTD2"> 5.50" h x 5.50" w x 2.00" l, .75 pounds</td>
										</tr>
										<tr class="techSpecRow">
											<td class="techSpecTD1">Chiều dài:</td>
											<td class="techSpecTD2">3</td>
										</tr>
									</tbody>
								</table>


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
									</div>
									<div class="tab-pane active" id="blockView">
										<ul class="thumbnails">
											<li class="span3">
												<div class="thumbnail">
													<a href="product_details.php"><img src="themes/images/products/10.jpg" alt="" /></a>
													<div class="caption">
														<h5>Manicure &amp; Pedicure</h5>
														<p>
															Mô tả.
														</p>
														<h4 style="text-align:center"><a class="btn" href="product_details.php"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Thêm vào <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;222.00</a>
														</h4>
													</div>
												</div>
											</li>
											<li class="span3">
												<div class="thumbnail">
													<a href="product_details.php"><img src="themes/images/products/11.jpg" alt="" /></a>
													<div class="caption">
														<h5>Manicure &amp; Pedicure</h5>
														<p>
															Mô tả.
														</p>
														<h4 style="text-align:center"><a class="btn" href="product_details.php"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Thêm vào <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;222.00</a>
														</h4>
													</div>
												</div>
											</li>
											<li class="span3">
												<div class="thumbnail">
													<a href="product_details.php"><img src="themes/images/products/12.jpg" alt="" /></a>
													<div class="caption">
														<h5>Manicure &amp; Pedicure</h5>
														<p>
															Mô tả.
														</p>
														<h4 style="text-align:center"><a class="btn" href="product_details.php"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Thêm vào <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;222.00</a>
														</h4>
													</div>
												</div>
											</li>
											<li class="span3">
												<div class="thumbnail">
													<a href="product_details.php"><img src="themes/images/products/13.jpg" alt="" /></a>
													<div class="caption">
														<h5>Manicure &amp; Pedicure</h5>
														<p>
															Mô tả.
														</p>
														<h4 style="text-align:center"><a class="btn" href="product_details.php"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Thêm vào <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;222.00</a>
														</h4>
													</div>
												</div>
											</li>
											<li class="span3">
												<div class="thumbnail">
													<a href="product_details.php"><img src="themes/images/products/1.jpg" alt="" /></a>
													<div class="caption">
														<h5>Manicure &amp; Pedicure</h5>
														<p>
															Mô tả.
														</p>
														<h4 style="text-align:center"><a class="btn" href="product_details.php"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Thêm vào <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;222.00</a>
														</h4>
													</div>
												</div>
											</li>
											<li class="span3">
												<div class="thumbnail">
													<a href="product_details.php"><img src="themes/images/products/2.jpg" alt="" /></a>
													<div class="caption">
														<h5>Manicure &amp; Pedicure</h5>
														<p>
															Mô tả.
														</p>
														<h4 style="text-align:center"><a class="btn" href="product_details.php"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Thêm vào <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;222.00</a>
														</h4>
													</div>
												</div>
											</li>
										</ul>
										<hr class="soft" />
									</div>
								</div>
								<br class="clr">
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php
include 'include/footer.php'
?>