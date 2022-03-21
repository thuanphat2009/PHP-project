<?php 
	include 'include/header.php';
?>	
<?php 
    if(isset($_GET['proid'])){
        $customer_id = Session::get('customer_id');
         $proid = $_GET['proid'];
         $delwlist = $product->del_wlist($proid,$customer_id);
                       
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
						<li class="active"> WishList</li>
					</ul>
					<h3> Giỏ hàng [ <small> 3 sản phẩm </small>]<a href="products.php"
							class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Trở lại trang sản phẩm </a></h3>
					<hr class="soft" />
					

					<table class="table table-bordered">
						<thead>
							<tr>
								<th style="width:240px;">Tên Sản Phẩm</th>
								<th style="width:240px;">Ảnh</th>
								<th style="width:180px;">Giá</th>
								<th>Tùy Chọn</th>
							</tr>
						</thead>
						<tbody>
                            <?php 
                                $customer_id = Session::get('customer_id');
                                $get_wishlist = $product->get_wlist($customer_id);
                                if($get_wishlist){
                                    while($result = $get_wishlist->fetch_assoc()){    
                            ?>
							<tr>
								<td style="text-align: center;vertical-align: middle;"> <?php echo $result['productName'] ?></td>
								<td style="text-align: center;">
                                    <img style="height:160px;width:160px;object-fit:cover;border-radius:15px;" src="admin/uploads/<?php echo $result['image'] ?>" alt="" />
                                </td>
								<td style="text-align: center;vertical-align: middle;"><?php echo $fm->format_currency($result['price']) . " " . "VND" ?></td>
								<td style="text-align: center;vertical-align: middle;">
                                    <a href="product_details.php?proid=<?php echo $result['productId'] ?>&&cateid=<?php echo $result['cateId'] ?>">Xem</a> ||
                                    <a href="?proid=<?php echo $result['productId'] ?>">Xóa</a>  
                                </td>
			
							</tr>

                            <?php 
                                    }
                                }
                            ?>
							
						</tbody>
					</table>


					<!-- <table class="table table-bordered">
						<tbody>
							<tr>
								<td>
									<form class="form-horizontal">
										<div class="control-group">
											<label class="control-label"><strong> VOUCHERS CODE: </strong> </label>
											<div class="controls">
												<input type="text" class="input-medium" placeholder="CODE">
												<button type="submit" class="btn"> ADD </button>
											</div>
										</div>
									</form>
								</td>
							</tr>

						</tbody>
					</table> -->

					
					<!-- <a href="login.php" class="btn btn-large pull-right">Thanh toán <i class="icon-arrow-right"></i></a> -->

				</div>
			</div>
		</div>
	</div>
	<!-- MainBody End ============================= -->
	<!-- Footer ================================================================== -->
	<?php
	include 'include/footer.php'
?>