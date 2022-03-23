<?php
include_once 'include/header.php';
?>
<?php 
  $product = new product();
  //vị trí hiện tại của trang
  $page = isset($_GET['page']) ?  $_GET['page'] : 1;

  // số sản phẩm trên 1 trang 
  $pro =6	;
  //công thức tính vị trí sản phẩm băt sđầu muốn lấy
  $startPro = $page * $pro - $pro;

  //show sp
  $result_page = $product->show_productuser_pagein($startPro,$pro);
  //lấy tất cả sp từ db
  $rows = $product->show_productuser_all();

  //đếm số lượng sp
  $rowCount = count($rows);
  //tổng só trang
  $total = ceil($rowCount / $pro);
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
					<li class="active">Sản phẩm</li>
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
                      if(!empty($result_page)): foreach($result_page as $val):
                    ?>
								<div class="row">
									<a href="product_details.php?proid=<?php echo $val['productId'] ?>&&cateid=<?php echo $val['cateId'] ?>">
										<div class="span2">
											<img class="radius products-item" src="admin/uploads/<?php echo $val['image'] ?>" alt="" />
										</div>
									</a>

									<div class="span4">


										<h5><?php echo $val['productName'] ?></h5>
										<p>
											<?php echo $val['product_desc'] ?>
										</p>

										<br class="clr" />
									</div>
									<div class="span3 alignR">
										<form method="post" action="./classes/themgiohang.php?proid=<?php echo $val['productId'] ?>" class="form-horizontal qtyFrm">
											<h3> <?php echo $fm->format_currency($val['price']) . " " . "VND" ?></h3>

											
											<input value=" Thêm vào giỏ" type="submit" name="themgiohang" class="btn btn-large btn-primary"/>
											<a href="product_details.php?proid=<?php echo $val['productId'] ?>&&cateid=<?php echo $val['cateId'] ?>" class="btn btn-large"><i class="icon-zoom-in"></i></a>

										</form>
									</div>
								</div>
								<hr class="soft" />
								<?php
                      				endforeach;
                      				endif
                   				 ?>
					</div>

					<div class="tab-pane  active" id="blockView">
						<ul class="thumbnails">
						<?php 
                     		 if(!empty($result_page)): foreach($result_page as $val):
                    	?>
									<li class="span3">
										<div class="thumbnail">
											<a href="product_details.php?proid=<?php echo $val['productId'] ?>&&cateid=<?php echo $val['cateId'] ?>"><img class="radius products-item" src="admin/uploads/<?php echo $val['image'] ?>" alt="" /></a>
											<div class="caption">
												<h5><?php echo $val['productName'] ?></h5>
												<p>
													<?php echo $val['product_desc'] ?>
												</p>
												<form method="post" action="./classes/themgiohang.php?proid=<?php echo $val['productId'] ?>" class="form-horizontal qtyFrm">
												<h4 style="text-align:center">
													<a class="btn" href="product_details.php?proid=<?php echo $val['productId'] ?>&&cateid=<?php echo $val['cateId'] ?>"> <i class="icon-zoom-in"></i></a>
													<input value=" Thêm vào giỏ " type="submit" name="themgiohang" class="btn btn-large btn-primary"/>
													<a class="btn btn-primary" href="#"><?php echo $fm->format_currency($val['price']) . " " . "VND" ?></a>
												</h4>
												</form>
											</div>
										</div>
									</li>
									<?php
										endforeach;
										endif
                    
                    				?>
						</ul>
						<hr class="soft" />
					</div>
				</div>

				<div class="pagination">
					<ul>
						<?php if($page>1): ?>
							<li><a href="products.php?page=<?= $page -1  ?>">&lsaquo;</a></li>
						<?php endif; ?>

						<?php for($i =1 ; $i<= $total;$i++): ?>
                        <?php if($page == $i){ ?>
						
						<li><a class="" href="products.php?page=<? $i ?>"><?php $i ?></a></li>

                        <?php }else{ ?>
                        
							<li><a class="" href="products.php?page=<?= $i ?>"><?= $i ?></a></li>

                    	<?php } endfor; ?>

						
						<?php if($page!= $total): ?>
							<li><a href="products.php?page=<?= $page +1  ?>">&rsaquo;</a></li>
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