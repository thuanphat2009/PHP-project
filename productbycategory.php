<?php
include 'include/header.php';
?>
<?php
if (!isset($_GET['cateid']) || $_GET['cateid'] == NULL) {
	echo "<script>window.location ='index.php'</script>";
} else {
	$id = $_GET['cateid'];
}

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $cateName = $_POST['cateName'];
//     $updateCate = $cate->update_category($cateName, $id);
// }
?>
<?php
$cate = new category();
//vị trí hiện tại của trang
$page = isset($_GET['page']) ?  $_GET['page'] : 1;

// số sản phẩm trên 1 trang 
$pro = 2;
//công thức tính vị trí sản phẩm băt sđầu muốn lấy
$startPro = $page * $pro - $pro;

//show sp
$result_page = $cate->show_productbycate_pagein($startPro, $pro, $id);
//lấy tất cả sp từ db
$rows = $cate->show_productbycate_all($id);
// //đếm số lượng sp
// $rowCount = count($rows);
// //tổng só trang
$total = ceil($rows['0']['count_product_cate'] / $pro);
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
					<li>Sản phẩm</li> <span class="divider">/</span>
					<li>Danh mục</li> <span class="divider">/</span>
					<?php
					$name_cate = $cate->get_name_by_cate($id);
					if ($name_cate) {
						while ($result_name = $name_cate->fetch_assoc()) {

					?>
							<li class="active"><?php echo $result_name['cateName'] ?></li>
					<?php
						}
					}
					?>
				</ul>

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
					<a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
					<a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
				</div>
				<br class="clr" />
				<div class="tab-content">
					<div class="tab-pane" id="listView">
						<?php

						if ($result_page) {
							while ($result = $result_page->fetch_assoc()) {

						?>
								<div class="row">
									<a href="product_details.php?proid=<?php echo $result['productId'] ?>&&cateid=<?php echo $result['cateId'] ?>">
										<div class="span2">
											<img style="height:160px;width:160px;object-fit:cover;border-radius:15px;" src="admin/uploads/<?php echo $result['image'] ?>" alt="" />
										</div>
									</a>

									<div class="span4">


										<h5><?php echo $result['productName'] ?></h5>
										<p>
											<?php echo $result['product_desc'] ?>
										</p>

										<br class="clr" />
									</div>
									<div class="span3 alignR">
										<form class="form-horizontal qtyFrm">
											<h3><?php echo $fm->format_currency($result['price']) . " " . "VND" ?></h3>


											<a href="product_details.php" class="btn btn-large btn-primary"> Thêm vào <i class=" icon-shopping-cart"></i></a>
											<a href="product_details.php?proid=<?php echo $result['productId'] ?>&&cateid=<?php echo $result['cateId'] ?>" class="btn btn-large"><i class="icon-zoom-in"></i></a>

										</form>
									</div>

								</div>

								<hr class="soft" />
						<?php
							}
						} else {
							echo  ' Không có danh mục này';
						}
						?>
					</div>

					<div class="tab-pane  active" id="blockView">
						<ul class="thumbnails">
							<?php
							$product_block = $cate->show_productbycate_pagein($startPro, $pro, $id);
							if ($product_block) {
								while ($result = $product_block->fetch_assoc()) {

							?>
									<li class="span3">
										<div class="thumbnail">
											<a href="product_details.php?proid=<?php echo $result['productId'] ?>&&cateid=<?php echo $result['cateId'] ?>"><img style="height:240px;width:240px;object-fit:cover;border-radius:15px;" src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
											<div class="caption">
												<h5><?php echo $result['productName'] ?></h5>
												<p>
													<?php echo $result['product_desc'] ?>
												</p>
												<h4 style="text-align:center"><a class="btn" href="product_details.php?proid=<?php echo $result['productId'] ?>&&cateid=<?php echo $result['cateId'] ?>"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Thêm vào <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#"><?php echo $fm->format_currency($result['price']) . " " . "VND" ?></a></h4>
											</div>
										</div>
									</li>
							<?php
								}
							} else {
								echo  ' Không có danh mục này';
							}
							?>
						</ul>
						<hr class="soft" />
					</div>
				</div>

				<div class="pagination">
					<ul>
						<?php if ($page > 1) : ?>
							<li><a href="productbycategory.php?cateid=<?= $id ?>&&page=<?= $page - 1  ?>">&lsaquo;</a></li>
						<?php endif; ?>

						<?php for ($i = 1; $i <= $total; $i++) : ?>
							<?php if ($page == $i) { ?>

								<li><a class="" href="productbycategory.php?cateid=<?= $id ?>&&page=<?= $i ?>"><?php $i ?></a></li>

							<?php } else { ?>

								<li><a class="" href="productbycategory.php?cateid=<?= $id ?>&&page=<?= $i ?>"><?= $i ?></a></li>

						<?php }
						endfor; ?>


						<?php if ($page != $total) : ?>
							<li><a href="productbycategory.php?cateid=<?= $id ?>&&page=<?= $page + 1 ?>">&rsaquo;</a></li>
						<?php endif; ?>
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