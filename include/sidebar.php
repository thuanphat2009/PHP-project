<div id="sidebar" class="span3">
	<div class="well well-small">
		<a id="myCart" href="product_summary.php">
			<img src="themes/images/ico-cart.png" alt="cart">
			<?php
			if (isset($_SESSION['cart'])) {
				$tongtien = 0;
				foreach ($_SESSION['cart'] as $cart_item) {
					$thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
					$tongcong = $thanhtien - (($cart_item['giamgia'] * $thanhtien) / 100);
					$tongtien += $tongcong;
				}
			?>
				<?php echo $i; ?> sản phẩm
				<span class="badge badge-warning pull-right"> <?php echo  number_format($tongtien,0,',','.').' '.'VND'; ?></span>
			<?php } else { ?>
				0 sản phẩm
			<?php } ?>
		</a>
	</div>
	<ul id="sideManu" class="nav nav-tabs nav-stacked">
		<li class="subMenu open"><a> Danh Mục </a>
			<ul>

				<?php
				$getall_category = $cate->add_category();
				if ($getall_category) {
					while ($result_allcate = $getall_category->fetch_assoc()) {

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
				if ($getall_brand) {
					while ($result_allbrand = $getall_brand->fetch_assoc()) {

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
	<?php
	$get_product_rand = $product->get_product_rand(2);
	if ($get_product_rand) {
		while ($result_rand = $get_product_rand->fetch_assoc()) {

	?>

			<div class="thumbnail">
				<a href="product_details.php?proid=<?php echo $result_rand['productId'] ?>&&cateid=<?php echo $result_rand['cateId'] ?>">
					<img class="radius slidebar" src="admin/uploads/<?php echo $result_rand['image'] ?>" />
				</a>
				<div class="caption">
					<h5><?php echo $result_rand['productName'] ?></h5>
					<form method="post" action="./classes/themgiohang.php?proid=<?php echo $result_rand['productId'] ?>" class="form-horizontal qtyFrm">
						<h4 style="text-align:center">
							<a class="btn btn-warning" href="product_details.php?proid=<?php echo $result_rand['productId'] ?>&&cateid=<?php echo $result_rand['cateId'] ?>"><i class="icon-zoom-in"></i></a>
							<input value=" Thêm vào giỏ" type="submit" name="themgiohang" class="btn btn-primary" />
							<div class="text-success" href="#"><?php echo  $fm->format_currency($result_rand['price']) . " " . "VND" ?></div>
						</h4>
					</form>
				</div>
			</div><br />
	<?php
		}
	}
	?>
	<div class="thumbnail">
		<img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
		<div class="caption">
			<h5>Phương thức thanh toán</h5>
		</div>
	</div>
</div>