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
					<li class="active">Đặc biệt</li>
				</ul>
				<h4> Các sản phẩm đang giảm giá<small class="pull-right"> 50+ sản phẩm </small></h4>
				<hr class="soft" />
				<form class="form-horizontal span6">
					<div class="control-group">
						<label class="control-label alignL">Sắp xếp theo </label>
						<select>
							<option>Tên sản phẩm A - Z</option>
							<option>Tên sản phẩm Z - A</option>
							<option>Giá thấp - cao</option>
							<option>Giá cao - thấp</option>
						</select>
					</div>
				</form>

				<div id="myTab" class="pull-right">
					<a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
				</div>
				<br class="clr" />
				<div class="tab-content">

					<div class="tab-pane  active" id="blockView">
						<ul class="thumbnails">
						<?php
							$get_special = $product->get_special();
							if ($get_special) {
								while ($result = $get_special->fetch_assoc()) {
						?>
						<li class="span3">
							<div class="thumbnail">
								<a href="product_details.php?proid=<?php echo $result['productId'] ?>&&cateid=<?php echo $result['cateId'] ?>"><img class="radius products-item" src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
								<div class="caption">
									<h5><?php echo $result['productName'] ?></h5>
										<p>
											GIẢM <?php echo $result['giamgia'] ?> %
										</p>
									<form method="post" action="./classes/themgiohang.php?proid=<?php echo $result['productId'] ?>" class="form-horizontal qtyFrm">
										<h4 style="text-align:center">
											<a class="btn" href="product_details.php?proid=<?php echo $result['productId'] ?>&&cateid=<?php echo $result['cateId'] ?>"> <i class="icon-zoom-in"></i></a>
											<div class="text-error" href="#"><?php echo $fm->format_currency($result['price']) . " " . "VND" ?></div>
											<input value=" Thêm vào giỏ " type="submit" name="themgiohang" class="btn btn-primary" />
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

				<div class="pagination">
					<ul>
						<li><a href="#">&lsaquo;</a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">...</a></li>
						<li><a href="#">&rsaquo;</a></li>
					</ul>
				</div>
				<br class="clr" />
			</div>
		</div>
	</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php
include 'include/footer.php'
?>