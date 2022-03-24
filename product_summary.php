<?php
include 'include/header.php';
require_once './lib/session.php';
Session::init();
if (isset($_SESSION['cart'])) {
	$i = 0;
	foreach ($_SESSION['cart'] as $cart_item) {
		$i++;
	}
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
					<li class="active"> Giỏ hàng</li>
				</ul>
				<?php
				if (isset($_SESSION['cart'])) {
				?>
					<h3> Giỏ hàng [ <small> <?php echo $i; ?> sản phẩm </small>]<a href="products.php" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Trở lại trang sản phẩm </a></h3>
				<?php
				} else {
				?>

					<h3> Giỏ hàng [ <small> 0 sản phẩm </small>]<a href="products.php" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Trở lại trang sản phẩm </a></h3>
				<?php
				}
				?>
				<hr class="soft" />


				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Sản phẩm</th>
							<th>Tên</th>
							<th>Số lượng</th>
							<th>Giá</th>
							<th>Tổng tiền sản phẩm</th>
							<th>Giảm giá</th>
							<th>Tổng cộng</th>
						</tr>
					</thead>
					<?php
					if (isset($_SESSION['cart'])) {
						$tongtien = 0;
					?>
						<tbody>
							<?php
							$i = 0;
							foreach ($_SESSION['cart'] as $cart_item) {
								$i++;
								$thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
								$tongcong = $thanhtien - (($cart_item['giamgia'] * $thanhtien) / 100);
								$tongtien += $tongcong;
							?>
								<tr>
									<td>
										<img width="60" src="admin/uploads/<?php echo $cart_item['hinh'] ?>" />
									</td>
									<td><?php echo $cart_item['tensanpham'] ?></td>
									<td>
										<div class="input-append">
											<input readonly class="span1" style="max-width:34px" value="<?php echo $cart_item['soluong'] ?>" id="appendedInputButtons" size="16" type="text">
											<a href="./classes/themgiohang.php?giamsl=<?php echo $cart_item['id'] ?>" class="btn" type="button">
												<i class="icon-minus"></i>
											</a>
											<a href="./classes/themgiohang.php?tangsl=<?php echo $cart_item['id'] ?>" class="btn" type="button">
												<i class="icon-plus"></i>
											</a>
											<a href="./classes/themgiohang.php?xoaspid=<?php echo $cart_item['id'] ?>" class="btn btn-danger" type="button">
												<i class="icon-remove icon-white"></i>
											</a>
										</div>
									</td>
									<td><?php echo number_format($cart_item['giasp'], 0, ',', '.') . ' ' . 'VND';  ?></td>
									<td><?php echo number_format($thanhtien, 0, ',', '.') . ' ' . 'VND'; ?></td>
									<td><?php echo $cart_item['giamgia'] ?> %</td>
									<td><?php echo number_format($tongcong, 0, ',', '.') . ' ' . 'VND'; ?></td>
								</tr>
							<?php
							}
							?>

							<tr>
								<td colspan="6" style="text-align:right"><strong>Tổng cộng = </strong>
								</td>
								<td class="label label-important" style="display:block"> <strong><?php echo number_format($tongtien, 0, ',', '.'); ?> VND </strong></td>
							</tr>
							<tr>
								<td colspan="12" style="text-align:right">
									<strong>
										<a onclick="return confirm ('Xác nhận xóa toàn bộ giỏ hàng?')" href="./classes/themgiohang.php?xoatatca">Xóa tất cả sản phẩm </a>

									</strong>
								</td>
							</tr>
						</tbody>
					<?php

					} else {
					?>
						<tbody>
							<h2>Giỏ hàng trống</h2>
						</tbody>
					<?php
					}
					?>
				</table>




				<?php
				$login_check = Session::get('customer_login');
				if ($login_check) {
				?>
					<a href="checkout.php" class="btn btn-large btn-success pull-right">Thanh toán <i class="icon-arrow-right"></i></a>
				<?php
				} else {
				?>
					<a href="login.php" class="btn btn-large btn-success pull-right">Thanh toán <i class="icon-arrow-right"></i></a>

				<?php } ?>
			</div>
		</div>
	</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php
include 'include/footer.php'
?>